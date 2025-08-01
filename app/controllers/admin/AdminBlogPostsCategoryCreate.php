<?php


namespace Altum\Controllers;

use Altum\Alerts;

defined('ZEFANYA') || die();

class AdminBlogPostsCategoryCreate extends Controller {

    public function index() {

        if(!empty($_POST)) {
            /* Filter some the variables */
            $_POST['url'] = input_clean(get_slug($_POST['url']), 256);
            $_POST['title'] = input_clean($_POST['title'], 256);
            $_POST['description'] = input_clean($_POST['description'], 256);
            $_POST['language'] = !empty($_POST['language']) ? input_clean($_POST['language']) : null;
            $_POST['order'] = (int) $_POST['order'] ?? 0;

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

            if(db()->where('url', $_POST['url'])->where('language', $_POST['language'])->has('blog_posts_categories')) {
                Alerts::add_field_error('url', l('admin_blog.error_message.url_exists'));
            }

            /* If there are no errors, continue */
            if(!Alerts::has_field_errors() && !Alerts::has_errors()) {

                /* Database query */
                db()->insert('blog_posts_categories', [
                    'url' => $_POST['url'],
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'language' => $_POST['language'],
                    'order' => $_POST['order'],
                    'datetime' => get_date(),
                ]);

                /* Set a nice success message */
                Alerts::add_success(sprintf(l('global.success_message.create1'), '<strong>' . $_POST['title'] . '</strong>'));

                /* Clear the cache */
                cache()->deleteItemsByTag('blog_posts_categories');

                redirect('admin/blog-posts-categories');
            }

        }

        /* Set default values */
        $values = [
            'title' => $_POST['title'] ?? '',
            'url' => $_POST['url'] ?? '',
            'language' => $_POST['language'] ?? '',
            'order' => $_POST['order'] ?? 0,
        ];

        $data = [
            'values' => $values
        ];

        /* Main View */
        $view = new \Altum\View('admin/blog-posts-category-create/index', (array) $this);

        $this->add_view_content('content', $view->run($data));
    }

}
