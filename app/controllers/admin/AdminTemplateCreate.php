<?php


namespace Altum\Controllers;

use Altum\Alerts;

defined('ZEFANYA') || die();

class AdminTemplateCreate extends Controller {

    public function index() {

        if(!\Altum\Plugin::is_active('aix')) {
            redirect('not-found');
        }

        /* Get available templates categories */
        $templates_categories = (new \Altum\Models\TemplatesCategories())->get_templates_categories();

        if(!empty($_POST)) {
            /* Filter some the variables */
            $_POST['name'] = input_clean($_POST['name'], 64);
            $_POST['template_category_id'] = array_key_exists($_POST['template_category_id'], $templates_categories) ? (int) $_POST['template_category_id'] : null;
            $_POST['prompt'] = input_clean($_POST['prompt'], 5000);
            $_POST['icon'] = input_clean($_POST['icon'], 64);
            $_POST['order'] = (int) $_POST['order'] ?? 0;
            $_POST['is_enabled'] = (int) isset($_POST['is_enabled']);

            /* Inputs */
            $inputs = [];

            foreach($_POST['inputs'] as $input_key => $input) {
                $key = input_clean($input['key'], 64);
                $icon = input_clean($input['icon'], 64);
                $type = in_array($input['type'], ['input', 'textarea']) ? $input['type'] : 'input';

                $inputs[$key] = [
                    'icon' => $icon,
                    'type' => $type,
                    'translations' => [],
                ];

                foreach($input['translations'] as $language_name => $array) {
                    foreach($array as $array_key => $array_value) {
                        $inputs[$key]['translations'][$language_name][$array_key] = input_clean($array_value);
                    }

                    if(!array_key_exists($language_name, \Altum\Language::$active_languages)) {
                        unset($inputs[$key]['translations'][$language_name]);
                    }
                }
            }

            /* Translations */
            foreach($_POST['translations'] as $language_name => $array) {
                foreach($array as $key => $value) {
                    $_POST['translations'][$language_name][$key] = input_clean($value);
                }
                if(!array_key_exists($language_name, \Altum\Language::$active_languages)) {
                    unset($_POST['translations'][$language_name]);
                }
            }

            /* Prepare settings JSON */
            $settings = json_encode([
                'translations' => $_POST['translations'],
                'inputs' => $inputs,
            ]);

            //ZEFANYA:DEMO if(DEMO) Alerts::add_error('This command is blocked on the demo.');

            if(!\Altum\Csrf::check()) {
                Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            }

            if(!Alerts::has_field_errors() && !Alerts::has_errors()) {

                /* Database query */
                db()->insert('templates', [
                    'template_category_id' => $_POST['template_category_id'],
                    'name' => $_POST['name'],
                    'prompt' => $_POST['prompt'],
                    'settings' => $settings,
                    'icon' => $_POST['icon'],
                    'order' => $_POST['order'],
                    'is_enabled' => $_POST['is_enabled'],
                    'datetime' => get_date(),
                ]);

                /* Clear the cache */
                cache()->deleteItem('templates');

                /* Set a nice success message */
                Alerts::add_success(sprintf(l('global.success_message.create1'), '<strong>' . $_POST['name'] . '</strong>'));

                redirect('admin/templates');
            }
        }

        /* Main View */
        $data = [
            'templates_categories' => $templates_categories
        ];

        $view = new \Altum\View('admin/template-create/index', (array) $this);

        $this->add_view_content('content', $view->run($data));

    }

}
