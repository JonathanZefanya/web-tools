<?php


namespace Altum\Controllers;

use Altum\Alerts;
use Altum\Logger;
use Altum\Meta;
use Altum\Models\User;

defined('ZEFANYA') || die();

class ResetPassword extends Controller {

    public function index() {

        \Altum\Authentication::guard('guest');

        $md5email = (isset($this->params[0])) ? $this->params[0] : null;
        $lost_password_code = (isset($this->params[1])) ? $this->params[1] : null;
        $redirect = process_and_get_redirect_params() ?? 'dashboard';
        $welcome = isset($_GET['welcome']) ? '&welcome=' . $_GET['welcome'] : null;

        if(!$md5email || !$lost_password_code || mb_strlen($lost_password_code) < 1) redirect();

        /* Check if the lost password code is correct */
        $user = db()->where('lost_password_code', $lost_password_code)->getOne('users', ['user_id', 'email', 'name', 'password']);

        if(!$user) {
            redirect('not-found');
        }

        if(md5($user->email) != $md5email) {
            redirect('not-found');
        }

        /* Meta */
        Meta::set_robots('noindex');
        Meta::set_canonical_url(url('reset-password'));

        /* Disable OG Image */
        if(\Altum\Plugin::is_active('dynamic-og-images') && settings()->dynamic_og_images->is_enabled) {
            \Altum\Plugin\DynamicOgImages::$should_process = false;
        }

        if(!empty($_POST)) {

            //ZEFANYA:DEMO if(DEMO) Alerts::add_error('This command is blocked on the demo.');

            /* Check for any errors */
            if(mb_strlen($_POST['new_password']) < 6 || mb_strlen($_POST['new_password']) > 64) {
                Alerts::add_field_error('new_password', l('global.error_message.password_length'));
            }
            if($_POST['new_password'] !== $_POST['repeat_password']) {
                Alerts::add_field_error('repeat_password', l('global.error_message.passwords_not_matching'));
            }

            if(!Alerts::has_field_errors() && !Alerts::has_errors()) {
                /* Encrypt the new password */
                $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

                /* Update the password & empty the reset code from the database */
                db()->where('user_id', $user->user_id)->update('users', [
                    'password' => $new_password,
                    'twofa_secret' => null,
                    'lost_password_code' => null
                ]);

                Logger::users($user->user_id, 'reset_password.success');

                /* Set a nice success message */
                Alerts::add_success(l('reset_password.success_message'));

                /* Log the user in */
                $_SESSION['user_id'] = $user->user_id;
                $_SESSION['user_password_hash'] = md5($new_password);

                (new User())->login_aftermath_update($user->user_id);
                Alerts::add_info(sprintf(l('login.info_message.logged_in'), $user->name));

                /* Clear the cache */
                cache()->deleteItemsByTag('user_id=' . $user->user_id);

                redirect($redirect . $welcome);
            }
        }

        /* Prepare the view */
        $data = [];

        $view = new \Altum\View('reset-password/index', (array) $this);

        $this->add_view_content('content', $view->run($data));

    }

}
