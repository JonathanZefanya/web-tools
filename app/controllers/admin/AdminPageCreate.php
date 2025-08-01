<?php


namespace Altum\Controllers;

use Altum\Alerts;

defined('ZEFANYA') || die();

class AdminPageCreate extends Controller {

    public function index() {

        if(!empty($_POST)) {
            /* Filter some the variables */
            $_POST['title'] = input_clean($_POST['title'], 256);
            $_POST['description'] = input_clean($_POST['description'], 256);
            $_POST['icon'] = input_clean($_POST['icon']);
            $_POST['keywords'] = input_clean($_POST['keywords'], 256);
            $_POST['type'] = in_array($_POST['type'], ['internal', 'external']) ? input_clean($_POST['type']) : 'internal';
            $_POST['editor'] = in_array($_POST['editor'], ['wysiwyg', 'blocks', 'raw']) ? input_clean($_POST['editor']) : 'raw';
            $_POST['position'] = in_array($_POST['position'], ['hidden', 'top', 'bottom']) ? $_POST['position'] : 'top';
            $_POST['pages_category_id'] = empty($_POST['pages_category_id']) ? null : (int) $_POST['pages_category_id'];
            $_POST['language'] = !empty($_POST['language']) ? input_clean($_POST['language']) : null;
            $_POST['order'] = (int) $_POST['order'];
            $_POST['open_in_new_tab'] = (int) isset($_POST['open_in_new_tab']);
            $_POST['is_published'] = (int) isset($_POST['is_published']);
            $_POST['content'] = quilljs_to_bootstrap($_POST['content']);

            switch($_POST['type']) {
                case 'internal':
                    $_POST['url'] = input_clean(get_slug($_POST['url']), 256);
                    break;

                case 'external':
                    $_POST['url'] = input_clean($_POST['url'], 256);
                    break;
            }

            //ZEFANYA:DEMO if(DEMO) Alerts::add_error('This command is blocked on the demo.');

            /* Check for any errors */
            $required_fields = ['title', 'url'];
            foreach($required_fields as $field) {
                if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
                    Alerts::add_field_error($field, l('global.error_message.empty_field'));
                }
            }

            if(!\Altum\Csrf::check()) {
                Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            }

            if($_POST['type'] == 'internal' && db()->where('url', $_POST['url'])->where('language', $_POST['language'])->has('pages')) {
                Alerts::add_field_error('url', l('admin_resources.error_message.url_exists'));
            }

            /* If there are no errors, continue */
            if(!Alerts::has_field_errors() && !Alerts::has_errors()) {

                /* Database query */
                db()->insert('pages', [
                    'pages_category_id' => $_POST['pages_category_id'],
                    'url' => $_POST['url'],
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'icon' => $_POST['icon'],
                    'keywords' => $_POST['keywords'],
                    'editor' => $_POST['editor'],
                    'content' => $_POST['content'],
                    'type' => $_POST['type'],
                    'position' => $_POST['position'],
                    'language' => $_POST['language'],
                    'open_in_new_tab' => $_POST['open_in_new_tab'],
                    'order' => $_POST['order'],
                    'is_published' => $_POST['is_published'],
                    'datetime' => get_date(),
                    'last_datetime' => get_date(),
                ]);

                /* Clear the cache */
                cache()->deleteItem('pages_' . $_POST['position']);
                cache()->deleteItemsByTag('pages');

                /* Set a nice success message */
                Alerts::add_success(sprintf(l('global.success_message.create1'), '<strong>' . $_POST['title'] . '</strong>'));

                redirect('admin/pages');
            }

        }

        /* Get the pages categories available */
        $pages_categories = db()->get('pages_categories', null, ['pages_category_id', 'title']);

        /* Set default values */
        $values = [
            'pages_category_id' => $_POST['pages_category_id'] ?? '',
            'title' => $_POST['title'] ?? '',
            'url' => $_POST['url'] ?? '',
            'description' => $_POST['description'] ?? '',
            'keywords' => $_POST['keywords'] ?? '',
            'editor' => $_POST['editor'] ?? 'blocks',
            'content' => $_POST['content'] ?? '',
            'type' => $_POST['type'] ?? 'internal',
            'position' => $_POST['position'] ?? 'top',
            'language' => $_POST['language'] ?? '',
            'icon' => $_POST['icon'] ?? '',
            'order' => $_POST['order'] ?? 0,
            'open_in_new_tab' => $_POST['open_in_new_tab'] ?? 1,
            'is_published' => $_POST['is_published'] ?? 1,
        ];

        $data = [
            'values' => $values,
            'pages_categories' => $pages_categories
        ];

        /* Main View */
        $view = new \Altum\View('admin/page-create/index', (array) $this);

        $this->add_view_content('content', $view->run($data));
    }

}
