<?php


namespace Altum\Controllers;

use Altum\Alerts;

defined('ZEFANYA') || die();

class SignatureCreate extends Controller {

    public function index() {
        if(!\Altum\Plugin::is_active('email-signatures') || !settings()->signatures->is_enabled) {
            redirect('not-found');
        }

        \Altum\Authentication::guard();

        /* Team checks */
        if(\Altum\Teams::is_delegated() && !\Altum\Teams::has_access('create.signatures')) {
            Alerts::add_info(l('global.info_message.team_no_access'));
            redirect('signatures');
        }

        /* Check for the plan limit */
        $total_rows = database()->query("SELECT COUNT(*) AS `total` FROM `signatures` WHERE `user_id` = {$this->user->user_id}")->fetch_object()->total ?? 0;

        if($this->user->plan_settings->signatures_limit != -1 && $total_rows >= $this->user->plan_settings->signatures_limit) {
            Alerts::add_info(l('global.info_message.plan_feature_limit'));
            redirect('signatures');
        }

        if(!empty($_POST)) {
            $_POST['name'] = input_clean($_POST['name']);

            //ZEFANYA:DEMO if(DEMO) if($this->user->user_id == 1) Alerts::add_error('Please create an account on the demo to test out this function.');

            /* Check for any errors */
            $required_fields = ['name'];
            foreach($required_fields as $field) {
                if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
                    Alerts::add_field_error($field, l('global.error_message.empty_field'));
                }
            }

            if(!\Altum\Csrf::check()) {
                Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            }

            if(!Alerts::has_field_errors() && !Alerts::has_errors()) {
                $signature_templates = require \Altum\Plugin::get('email-signatures')->path . 'includes/signature_templates.php';

                $settings = json_encode([
                    'direction' => 'ltr',
                    'sign_off' => l('signatures.sign_off.default'),
                    'image_url' => '',
                    'full_name' => '',
                    'job_title' => '',
                    'department' => '',
                    'company' => '',
                    'disclaimer' => '',
                    'font_family' => 'Arial',
                    'font_size' => 14,
                    'width' => 500,
                    'image_width' => 50,
                    'image_border_radius' => 0,
                    'socials_width' => 20,
                    'socials_padding' => 10,
                    'separator_size' => 1,
                    'theme_color' => '#000000',
                    'full_name_color' => '#000000',
                    'text_color' => '#000000',
                    'link_color' => '#000000',
                ]);

                /* Database query */
                $signature_id = db()->insert('signatures', [
                    'user_id' => $this->user->user_id,
                    'name' => $_POST['name'],
                    'template' => array_key_first($signature_templates),
                    'settings' => $settings,
                    'datetime' => get_date(),
                ]);

                /* Set a nice success message */
                Alerts::add_success(sprintf(l('global.success_message.create1'), '<strong>' . $_POST['name'] . '</strong>'));

                /* Clear the cache */
                cache()->deleteItem('signatures?user_id=' . $this->user->user_id);

                redirect('signature-update/' . $signature_id);
            }
        }

        $values = [
            'name' => $_POST['name'] ?? '',
        ];

        /* Prepare the view */
        $data = [
            'values' => $values
        ];

        $view = new \Altum\View(\Altum\Plugin::get('email-signatures')->path . 'views/signature-create/index', (array) $this, true);

        $this->add_view_content('content', $view->run($data));

    }

}
