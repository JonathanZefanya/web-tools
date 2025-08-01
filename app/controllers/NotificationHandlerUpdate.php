<?php


namespace Altum\Controllers;

use Altum\Alerts;

defined('ZEFANYA') || die();

class NotificationHandlerUpdate extends Controller {

    public function index() {

        \Altum\Authentication::guard();

        /* Team checks */
        if(\Altum\Teams::is_delegated() && !\Altum\Teams::has_access('update.notification_handlers')) {
            Alerts::add_info(l('global.info_message.team_no_access'));
            redirect('notification-handlers');
        }

        $notification_handler_id = isset($this->params[0]) ? (int) $this->params[0] : null;

        if(!$notification_handler = db()->where('notification_handler_id', $notification_handler_id)->where('user_id', $this->user->user_id)->getOne('notification_handlers')) {
            redirect('notification-handlers');
        }
        $notification_handler->settings = json_decode($notification_handler->settings ?? '');

        if(!empty($_POST)) {
            $_POST['type'] = array_key_exists($_POST['type'], require APP_PATH . 'includes/notification_handlers.php') ? input_clean($_POST['type']) : null;
            $_POST['name'] = input_clean($_POST['name']);
            $_POST['is_enabled'] = (int) isset($_POST['is_enabled']);

            //ZEFANYA:DEMO if(DEMO) if($this->user->user_id == 1) Alerts::add_error('Please create an account on the demo to test out this function.');

            /* Check for any errors */
            $required_fields = ['type', 'name'];
            foreach($required_fields as $field) {
                if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
                    Alerts::add_field_error($field, l('global.error_message.empty_field'));
                }
            }

            if(!\Altum\Csrf::check()) {
                Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            }

            if(!Alerts::has_field_errors() && !Alerts::has_errors()) {
                $settings = [];
                switch($_POST['type']) {
                    case 'telegram':
                        $settings['telegram'] = input_clean($_POST['telegram'], 512);
                        $settings['telegram_chat_id'] = input_clean($_POST['telegram_chat_id'], 512);
                        break;

                    case 'whatsapp':
                        $settings['whatsapp'] = (int) input_clean($_POST['whatsapp'], 32);
                        break;

                    case 'twilio':
                    case 'twilio_call':
                        $settings[$_POST['type']] = input_clean($_POST[$_POST['type']], 32);
                        break;

                    case 'x':
                        $settings['x_consumer_key'] = input_clean($_POST['x_consumer_key'], 512);
                        $settings['x_consumer_secret'] = input_clean($_POST['x_consumer_secret'], 512);
                        $settings['x_access_token'] = input_clean($_POST['x_access_token'], 512);
                        $settings['x_access_token_secret'] = input_clean($_POST['x_access_token_secret'], 512);
                        break;

                    default:
                        $settings[$_POST['type']] = input_clean($_POST[$_POST['type']], 512);
                        break;
                }

                /* Test integration */
                if(isset($_POST['test']) && ($_SESSION['notification_handler_test_' . $_POST['type']] ?? 0) < 10) {

                    /* Send a test notification */
                    switch($_POST['type']) {
                        case 'email':

                            /* Prepare the email */
                            $email_template = get_email_template([], l('notification_handlers.test.subject'), [], l('notification_handlers.test.body'));

                            /* Send the email */
                            send_mail($settings['email'], $email_template->subject, $email_template->body, ['anti_phishing_code' => $this->user->anti_phishing_code, 'language' => $this->user->language]);

                            break;

                        case 'webhook';

                            try {
                                $response = \Unirest\Request::post(
                                    $settings['webhook'], [], \Unirest\Request\Body::form([
                                        'title' => l('notification_handlers.test_title'),
                                        'description' => l('notification_handlers.test_description'),
                                    ]
                                ));
                            } catch (\Exception $exception) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . e($exception->getMessage()));
                            }

                            break;

                        case 'slack';

                            try {
                                $response = \Unirest\Request::post(
                                    $settings['slack'],
                                    ['Accept' => 'application/json'],
                                    \Unirest\Request\Body::json([
                                        'text' => l('notification_handlers.test_description'),
                                        'username' => l('notification_handlers.test_title'),
                                        'icon_emoji' => ':white_check_mark:'
                                    ])
                                );
                            } catch (\Exception $exception) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . e($exception->getMessage()));
                            }

                            if($response->code != 200) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . '<strong>' . $response->code . ':</strong> ' .  e($response->raw_body));
                            }

                            break;

                        case 'discord';

                            try {
                                $response = \Unirest\Request::post(
                                    $settings['discord'],
                                    [
                                        'Accept' => 'application/json',
                                        'Content-Type' => 'application/json',
                                    ],
                                    \Unirest\Request\Body::json([
                                        'embeds' => [
                                            [
                                                'title' => l('notification_handlers.test_title'),
                                                'url' => url()
                                            ]
                                        ],
                                    ]),
                                );
                            } catch (\Exception $exception) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . e($exception->getMessage()));
                            }

                            if($response->code != 204) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . '<strong>' . $response->code . ':</strong> ' .  e($response->raw_body));
                            }

                            break;

                        case 'telegram';

                            try {
                                $response = \Unirest\Request::get(
                                    sprintf(
                                        'https://api.telegram.org/bot%s/sendMessage?chat_id=%s&text=%s',
                                        $settings['telegram'],
                                        $settings['telegram_chat_id'],
                                        l('notification_handlers.test_title')
                                    )
                                );
                            } catch (\Exception $exception) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . e($exception->getMessage()));
                            }

                            if($response->code != 200) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . '<strong>' . $response->code . ':</strong> ' .  e($response->raw_body));
                            }

                            break;

                        case 'microsoft_teams';

                            try {
                                $response = \Unirest\Request::post(
                                    $settings['microsoft_teams'],
                                    ['Content-Type' => 'application/json'],
                                    \Unirest\Request\Body::json([
                                        'text' => l('notification_handlers.test_title'),
                                    ])
                                );
                            } catch (\Exception $exception) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . e($exception->getMessage()));
                            }

                            if($response->code != 200) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . '<strong>' . $response->code . ':</strong> ' .  e($response->raw_body));
                            }

                            break;

                        case 'x':

                            $twitter = new \Abraham\TwitterOAuth\TwitterOAuth(
                                $settings['x_consumer_key'],
                                $settings['x_consumer_secret'],
                                $settings['x_access_token'],
                                $settings['x_access_token_secret']
                            );

                            $twitter->setApiVersion('2');

                            try {
                                $response = $twitter->post('tweets', ['text' => l('notification_handlers.test_title')]);
                            } catch (\Exception $exception) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . e($exception->getMessage()));
                            }

                            if(!isset($response->data) && !isset($response->data->id)) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . '<strong>' . print_r($response, true) . '</strong> ');
                            }

                            break;

                        case 'twilio';

                            try {
                                \Unirest\Request::auth(settings()->notification_handlers->twilio_sid, settings()->notification_handlers->twilio_token);

                                $response = \Unirest\Request::post(
                                    sprintf('https://api.twilio.com/2010-04-01/Accounts/%s/Messages.json', settings()->notification_handlers->twilio_sid),
                                    [],
                                    [
                                        'From' => settings()->notification_handlers->twilio_number,
                                        'To' => $settings['twilio'],
                                        'Body' => l('notification_handlers.test_title'),
                                    ]
                                );
                            } catch (\Exception $exception) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . e($exception->getMessage()));
                            }

                            \Unirest\Request::auth('', '');

                            if($response->code != 200) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . '<strong>' . $response->code . ':</strong> ' .  e($response->raw_body));
                            }

                            break;

                        case 'twilio_call';

                            try {
                                \Unirest\Request::auth(settings()->notification_handlers->twilio_sid, settings()->notification_handlers->twilio_token);

                                $response = \Unirest\Request::post(
                                    sprintf('https://api.twilio.com/2010-04-01/Accounts/%s/Calls.json', settings()->notification_handlers->twilio_sid),
                                    [],
                                    [
                                        'From' => settings()->notification_handlers->twilio_number,
                                        'To' => $settings['twilio_call'],
                                        'Url' => SITE_URL . 'twiml/notification_handlers.test_title',
                                    ]
                                );
                            } catch (\Exception $exception) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . e($exception->getMessage()));
                            }

                            if($response->code != 200) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . '<strong>' . $response->code . ':</strong> ' .  e($response->raw_body));
                            }

                            break;

                        case 'whatsapp';

                            try {
                                $response = \Unirest\Request::post(
                                    'https://graph.facebook.com/v18.0/' . settings()->notification_handlers->whatsapp_number_id . '/messages',
                                    [
                                        'Authorization' => 'Bearer ' . settings()->notification_handlers->whatsapp_access_token,
                                        'Content-Type' => 'application/json'
                                    ],
                                    \Unirest\Request\Body::json([
                                        'messaging_product' => 'whatsapp',
                                        'to' => $settings['whatsapp'],
                                        'type' => 'template',
                                        'template' => [
                                            'name' => 'test_notification_handler',
                                            'language' => [
                                                'code' => \Altum\Language::$default_code
                                            ],
                                            'components' => [[
                                                'type' => 'body',
                                                'parameters' => [
                                                    [
                                                        'type' => 'text',
                                                        'text' => l('notification_handlers.test_title')
                                                    ]
                                                ]
                                            ]]

                                        ]
                                    ])
                                );
                            } catch (\Exception $exception) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . e($exception->getMessage()));
                            }

                            if($response->code != 200) {
                                Alerts::add_error(l('notification_handlers.error_message_test') . '<br />' . '<strong>' . $response->code . ':</strong> ' .  e($response->raw_body));
                            }

                            break;

                        case 'push_subscriber_id':
                            $push_subscriber = db()->where('push_subscriber_id', $settings['push_subscriber_id'])->getOne('push_subscribers');
                            if(!$push_subscriber) {
                                db()->where('notification_handler_id', $notification_handler->notification_handler_id)->update('notification_handlers', ['is_enabled' => 0]);
                            };

                            /* Prepare the web push */
                            $push_notification = \Altum\Helpers\PushNotifications::send([
                                'title' => l('notification_handlers.test_title'),
                                'description' => l('notification_handlers.test_description'),
                                'url' => url(),
                            ], $push_subscriber);

                            /* Unsubscribe if push failed */
                            if(!$push_notification) {
                                db()->where('push_subscriber_id', $push_subscriber->push_subscriber_id)->delete('push_subscribers');
                                db()->where('notification_handler_id', $notification_handler->notification_handler_id)->update('notification_handlers', ['is_enabled' => 0]);
                                Alerts::add_error(l('notification_handlers.error_message_test'));
                            }

                            break;

                        case 'internal_notification':
                            if(settings()->internal_notifications->users_is_enabled) {

                                db()->insert('internal_notifications', [
                                    'user_id' => $this->user->user_id,
                                    'for_who' => 'user',
                                    'from_who' => 'admin',
                                    'title' => l('notification_handlers.test_title'),
                                    'description' => l('notification_handlers.test_description'),
                                    'url' => url(),
                                    'icon' => 'fas fa-check-circle',
                                    'datetime' => get_date(),
                                ]);

                                db()->where('user_id', $this->user->user_id)->update('users', [
                                    'has_pending_internal_notifications' => 1
                                ]);

                                /* Clear the cache */
                                cache()->deleteItem('user?user_id=' . $this->user->user_id);

                            }
                            break;

                    }

                    /* Increment */
                    $_SESSION['notification_handler_test_' . $_POST['type']] = ($_SESSION['notification_handler_test_' . $_POST['type']] ?? 0) + 1;

                    if(!Alerts::has_errors()) {
                        Alerts::add_success(l('notification_handlers.success_message_test'));
                    }

                    redirect('notification-handler-update/' . $notification_handler_id);

                } else {
                    $settings = json_encode($settings);

                    /* Database query */
                    db()->where('notification_handler_id', $notification_handler_id)->update('notification_handlers', [
                        'type' => $_POST['type'],
                        'name' => $_POST['name'],
                        'settings' => $settings,
                        'is_enabled' => $_POST['is_enabled'],
                        'last_datetime' => get_date(),
                    ]);

                    /* Set a nice success message */
                    Alerts::add_success(sprintf(l('global.success_message.update1'), '<strong>' . $_POST['name'] . '</strong>'));

                    /* Clear the cache */
                    cache()->deleteItem('notification_handlers?user_id=' . $this->user->user_id);
                }

                redirect('notification-handler-update/' . $notification_handler_id);
            }
        }

        /* Prepare the view */
        $data = [
            'notification_handler' => $notification_handler,
        ];

        $view = new \Altum\View('notification-handler-update/index', (array) $this);

        $this->add_view_content('content', $view->run($data));

    }

}
