<?php

/**
 * Plugin Name:             SM - Change Admin Colors
 * Plugin URI:              https://smartystudio.net/smarty-change-admin-colors
 * Description:             Change admin colors based on the server (local, dev, staging, production).
 * Version:                 1.0.0
 * Author:                  Smarty Studio | Martin Nestorov
 * Author URI:              https://smartystudio.net
 * License:                 GPL-2.0+
 * License URI:             http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

if (!function_exists('smarty_custom_admin_bar_message')) {
    function smarty_custom_admin_bar_message($wp_admin_bar) {
        $environment = wp_get_environment_type();
        $message = '';
        $env_class = '';

        switch ($environment) {
            case 'local':
                $message = 'Local';
                $env_class = 'local-env';
                break;
            case 'development':
                $message = 'Development';
                $env_class = 'dev-env';
                break;
            case 'staging':
                $message = 'Staging';
                $env_class = 'staging-env';
                break;
            default:
                $message = 'Production';
                $env_class = 'prod-env';
        }

        // Add a new node to the admin bar
        $args = array(
            'id'    => 'environment_notice',
            'title' => '<span class="' . $env_class . '">' . esc_html(strtoupper($message)) . '</span>',
            'parent' => 'top-secondary'
        );

        $wp_admin_bar->add_node($args);
    }
    add_action('admin_bar_menu', 'smarty_custom_admin_bar_message', 100);
}

if (!function_exists('smarty_custom_admin_styles')) {
    function smarty_custom_admin_styles() { ?>
        <style type="text/css">
            .local-env { background-color: #f3993b; } 		/* Orange for Local */
            .dev-env { background-color: #9fc5e8; } 		/* Blue for Development */
            .staging-env { background-color: #a296c0; } 	/* Purple for Staging */
            .prod-env { background-color: #759c64; } 		/* Green for Production */

            #wp-admin-bar-environment_notice > .ab-item.ab-empty-item > span {
                color: #ffffff; 
                font-weight: bold;
                padding: 9px 15px !important;
            }
            #wp-admin-bar-environment_notice > .ab-item.ab-empty-item,
            #wp-admin-bar-environment_notice > .ab-item.ab-empty-item:hover {
                padding: 0 !important;
                margin-right: 15px;
            }
        </style>
    <?php }
    add_action('admin_head', 'smarty_custom_admin_styles');
}
