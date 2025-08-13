<?php

namespace Altum\Plugin;

use Altum\Plugin;

class Pwa {
    public static $plugin_id = 'pwa';

    public static function install() {

        /* Run the installation process of the plugin */
        $queries = [
            'INSERT IGNORE INTO `settings` (`key`, `value`) VALUES (\'pwa\', \'{"is_enabled":true,"display_install_bar":true,"display_install_bar_for_guests":true,"display_install_bar_delay":5,"app_name":"","short_app_name":"","app_description":"","theme_color":"#237FFF","app_start_url":"","app_icon":"","app_icon_maskable":"","mobile_screenshot_1":"","desktop_screenshot_1":"","mobile_screenshot_2":"","desktop_screenshot_2":"","mobile_screenshot_3":"","desktop_screenshot_3":"","mobile_screenshot_4":null,"desktop_screenshot_4":null,"mobile_screenshot_5":null,"desktop_screenshot_5":null,"mobile_screenshot_6":null,"desktop_screenshot_6":null,"shortcut_name_1":"","shortcut_description_1":"","shortcut_url_1":"","shortcut_icon_1":"","shortcut_name_2":"","shortcut_description_2":"","shortcut_url_2":"","shortcut_icon_2":"","shortcut_name_3":"","shortcut_description_3":"","shortcut_url_3":"","shortcut_icon_3":null}\');',
        ];

        foreach($queries as $query) {
            database()->query($query);
        }

        return Plugin::save_status(self::$plugin_id, 'active');

    }

    public static function uninstall() {

        /* Run the installation process of the plugin */
        $queries = [
            "DELETE FROM `settings` WHERE `key` = 'pwa';",
        ];

        foreach($queries as $query) {
            database()->query($query);
        }

        return Plugin::save_status(self::$plugin_id, 'uninstalled');

    }

    public static function activate() {
        return Plugin::save_status(self::$plugin_id, 'active');
    }

    public static function disable() {
        return Plugin::save_status(self::$plugin_id, 'installed');
    }

}
