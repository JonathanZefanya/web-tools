<?php


namespace Altum\Controllers;

use Altum\Alerts;

defined('ZEFANYA') || die();

class AdminBiolinkThemeCreate extends Controller {

    public function index() {

        $biolink_backgrounds = require APP_PATH . 'includes/biolink_backgrounds.php';
        $links_types = require APP_PATH . 'includes/links_types.php';

        if(!empty($_POST)) {
            /* Filter some the variables */
            $_POST['name'] = input_clean($_POST['name']);
            $_POST['order'] = (int) $_POST['order'] ?? 0;
            $_POST['is_enabled'] = (int) isset($_POST['is_enabled']);

            $_POST['additional_custom_css'] = mb_substr(trim($_POST['additional_custom_css']), 0, 10000);
            $_POST['additional_custom_js'] = mb_substr(trim($_POST['additional_custom_js']), 0, 10000);

            /* Width */
            $_POST['width'] = isset($_POST['biolink_width']) && in_array($_POST['biolink_width'], [6, 8, 10, 12]) ? (int) $_POST['biolink_width'] : 8;

            /* Block spacing */
            $_POST['block_spacing'] = isset($_POST['biolink_block_spacing']) && in_array($_POST['biolink_block_spacing'], [1, 2, 3,]) ? (int) $_POST['biolink_block_spacing'] : 2;

            /* Link hover animation */
            $_POST['hover_animation'] = isset($_POST['biolink_hover_animation']) && in_array($_POST['biolink_hover_animation'], ['false', 'smooth', 'instant',]) ? input_clean($_POST['biolink_hover_animation']) : 'smooth';

            //ZEFANYA:DEMO if(DEMO) Alerts::add_error('This command is blocked on the demo.');

            /* Check for errors & process potential uploads */
            $background_new_name = \Altum\Uploads::process_upload(null, 'biolink_background', 'biolink_background_image', 'background_remove', null);

            if(!\Altum\Csrf::check()) {
                Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            }

            if(!Alerts::has_field_errors() && !Alerts::has_errors()) {

                $settings = json_encode([
                    'additional' => [
                        'custom_css' => $_POST['additional_custom_css'] ?? null,
                        'custom_js' => $_POST['additional_custom_js'] ?? null,
                    ],

                    'biolink' => [
                        'background_type' => $_POST['biolink_background_type'] ?? 'preset',
                        'background' => $background_new_name ?? $_POST['biolink_background'] ?? 'one',
                        'background_color_one' => $_POST['biolink_background_color_one'],
                        'background_color_two' => $_POST['biolink_background_color_two'],
                        'font' => $_POST['biolink_font'],
                        'font_size' => $_POST['biolink_font_size'],
                        'background_blur' => (int) $_POST['biolink_background_blur'],
                        'background_brightness' => (int) $_POST['biolink_background_brightness'],
                        'width' => $_POST['width'],
                        'block_spacing' => $_POST['block_spacing'],
                        'hover_animation' => $_POST['hover_animation'],
                    ],

                    'biolink_block' => [
                        'text_color' => $_POST['biolink_block_text_color'],
                        'title_color' => $_POST['biolink_block_text_color'],
                        'description_color' => $_POST['biolink_block_description_color'],
                        'background_color' => $_POST['biolink_block_background_color'],
                        'border_width' => $_POST['biolink_block_border_width'],
                        'border_color' => $_POST['biolink_block_border_color'],
                        'border_radius' => $_POST['biolink_block_border_radius'],
                        'border_style' => $_POST['biolink_block_border_style'],
                        'border_shadow_offset_x' => $_POST['biolink_block_border_shadow_offset_x'],
                        'border_shadow_offset_y' => $_POST['biolink_block_border_shadow_offset_y'],
                        'border_shadow_blur' => $_POST['biolink_block_border_shadow_blur'],
                        'border_shadow_spread' => $_POST['biolink_block_border_shadow_spread'],
                        'border_shadow_color' => $_POST['biolink_block_border_shadow_color'],
                    ],

                    'biolink_block_socials' => [
                        'color' => $_POST['biolink_block_socials_color'],
                        'background_color' => $_POST['biolink_block_socials_background_color'],
                        'border_radius' => $_POST['biolink_block_socials_border_radius'],
                    ],

                    'biolink_block_paragraph' => [
                        'text_color' => $_POST['biolink_block_paragraph_text_color'],
                        'background_color' => $_POST['biolink_block_paragraph_background_color'],
                        'border_radius' => $_POST['biolink_block_paragraph_border_radius'],
                    ],

                    'biolink_block_heading' => [
                        'text_color' => $_POST['biolink_block_heading_text_color'],
                    ],
                ]);

                /* Database query */
                db()->insert('biolinks_themes', [
                    'name' => $_POST['name'],
                    'settings' => $settings,
                    'is_enabled' => $_POST['is_enabled'],
                    'order' => $_POST['order'],
                    'datetime' => get_date(),
                ]);

                /* Set a nice success message */
                Alerts::add_success(sprintf(l('global.success_message.create1'), '<strong>' . $_POST['name'] . '</strong>'));

                /* Clear the cache */
                cache()->deleteItem('biolinks_themes');

                redirect('admin/biolinks-themes');
            }
        }

        $values = [
            'name' => $_POST['name'] ?? null,
            'order' => $_POST['order'] ?? 0,
            'is_enabled' => $_POST['is_enabled'] ?? 1,
            'additional_custom_css' => $_POST['additional_custom_css'] ?? null,
            'additional_custom_js' => $_POST['additional_custom_js'] ?? null,
            'biolink_width' => $_POST['biolink_width'] ?? 8,
            'biolink_block_spacing' => $_POST['biolink_block_spacing'] ?? 2,
            'biolink_hover_animation' => $_POST['biolink_hover_animation'] ?? 'smooth',
            'biolink_background_type' => $_POST['biolink_background_type'] ?? null,
            'biolink_background' => $_POST['biolink_background'] ?? null,
            'biolink_background_color_one' => $_POST['biolink_background_color_one'] ?? null,
            'biolink_background_color_two' => $_POST['biolink_background_color_two'] ?? null,
            'biolink_font' => $_POST['biolink_font'] ?? null,
            'biolink_font_size' => $_POST['biolink_font_size'] ?? 16,
            'biolink_background_blur' => $_POST['biolink_background_blur'] ?? 0,
            'biolink_background_brightness' => $_POST['biolink_background_brightness'] ?? 100,

            'biolink_block_text_color' => $_POST['biolink_block_text_color'] ?? '#ffffff',
            'biolink_block_description_color' => $_POST['biolink_block_description_color'] ?? '#ffffff',
            'biolink_block_background_color' => $_POST['biolink_block_background_color'] ?? '#000000',
            'biolink_block_border_width' => $_POST['biolink_block_border_width'] ?? 0,
            'biolink_block_border_color' => $_POST['biolink_block_border_color'] ?? null,
            'biolink_block_border_radius' => $_POST['biolink_block_border_radius'] ?? null,
            'biolink_block_border_style' => $_POST['biolink_block_border_style'] ?? null,
            'biolink_block_border_shadow_offset_x' => $_POST['biolink_block_border_shadow_offset_x'] ?? 0,
            'biolink_block_border_shadow_offset_y' => $_POST['biolink_block_border_shadow_offset_y'] ?? 0,
            'biolink_block_border_shadow_blur' => $_POST['biolink_block_border_shadow_blur'] ?? 20,
            'biolink_block_border_shadow_spread' => $_POST['biolink_block_border_shadow_spread'] ?? 0,
            'biolink_block_border_shadow_color' => $_POST['biolink_block_border_shadow_color'] ?? '#00000010',

            'biolink_block_socials_color' => $_POST['biolink_block_socials_color'] ?? '#ffffff',
            'biolink_block_socials_background_color' => $_POST['biolink_block_socials_background_color'] ?? '#00000000',
            'biolink_block_socials_border_radius' => $_POST['biolink_block_socials_border_radius'] ?? 'rounded',

            'biolink_block_paragraph_text_color' => $_POST['biolink_block_paragraph_text_color'] ?? '#ffffff',
            'biolink_block_paragraph_background_color' => $_POST['biolink_block_paragraph_background_color'] ?? '#00000000',
            'biolink_block_paragraph_border_radius' => $_POST['biolink_block_paragraph_border_radius'] ?? 'rounded',

            'biolink_block_heading_text_color' => $_POST['biolink_block_heading_text_color'] ?? '#000000',
        ];

        /* Main View */
        $data = [
            'values' => $values,
            'biolink_backgrounds' => $biolink_backgrounds,
            'biolink_fonts' => settings()->links->biolinks_fonts,
            'links_types' => $links_types,
        ];

        $view = new \Altum\View('admin/biolink-theme-create/index', (array) $this);

        $this->add_view_content('content', $view->run($data));

    }

}
