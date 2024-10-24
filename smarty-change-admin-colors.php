<?php
/**
 * Plugin Name:  SM - Change Admin Colors
 * Plugin URI:   https://github.com/mnestorov/smarty-change-admin-colors
 * Description:  Change admin colors based on the server (local, dev, staging, production) environment.
 * Version:      1.0.0
 * Author:       Smarty Studio | Martin Nestorov
 * Author URI:   https://github.com/mnestorov
 * License:      GPL-2.0+
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

if (!function_exists('smarty_custom_admin_bar')) {
    /**
     * Adds an environment indicator to the WordPress admin bar.
     *
     * This function detects the current environment (local, development, staging, or production)
     * and adds a corresponding indicator to the admin bar, making it easy to identify the environment
     * while working in the admin area.
     *
     * @param WP_Admin_Bar $wp_admin_bar WordPress Admin Bar object.
     */
    function smarty_custom_admin_bar($wp_admin_bar) {
        $environment = wp_get_environment_type();
        $message = '';

        switch ($environment) {
            case 'local':
                $message = 'Local Environment';
                break;
            case 'development':
                $message = 'Development Environment';
                break;
            case 'staging':
                $message = 'Staging Environment';
                break;
            default:
                $message = 'Production Environment';
        }

        // Add a new node to the admin bar
        $args = array(
            'id'    => 'environment_notice',
            'title' => '<span>' . esc_html(strtoupper($message)) . '</span>',
            'parent' => 'top-secondary'
        );

        $wp_admin_bar->add_node($args);
    }
    add_action('admin_bar_menu', 'smarty_custom_admin_bar', 100);
}

if (!function_exists('smarty_custom_admin_styles')) {
    /**
     * Adds custom styles to the WordPress admin area based on the current environment.
     *
     * This function sets the background color of the admin bar and its elements to a specific
     * color depending on whether the environment is local, development, staging, or production.
     */
    function smarty_custom_admin_styles() {
        $environment = wp_get_environment_type();
        $bg_color = '';

        switch ($environment) {
            case 'local':
				$bg_color = '#ed800e'; // Orange for Local
                break;
            case 'development':
				$bg_color = '#2271b1'; // Blue for Development
                break;
            case 'staging':
				$bg_color = '#7866a3'; // Purple for Staging
                break;
            default:
				$bg_color = '#5e7d50'; // Green for Production
        }

        // Add styles
        echo '<style type="text/css">
			/* ENV Colors */
			.local-env { background-color: ' . $bg_color . ' !important; }
            .dev-env { background-color: ' . $bg_color . ' !important; }
            .staging-env { background-color: ' . $bg_color . ' !important; }
            .prod-env { background-color: ' . $bg_color . ' !important; }
			
			/* WP Admin Bar */
            #wpadminbar { background-color: ' . $bg_color . ' !important; }
			
			#wpadminbar *, #wpadminbar a, #wpadminbar .ab-icon {
                color: #ffffff !important;
                font-weight: bold !important;
            }
			
			#wp-admin-bar-environment_notice > .ab-item.ab-empty-item span { font-weight: bold; }
			
            #wp-admin-bar-environment_notice > .ab-item.ab-empty-item,
            #wp-admin-bar-environment_notice > .ab-item.ab-empty-item:hover {
                margin: 0 15px;
				color: #f0f0f1 !important;
				background-color: ' . $bg_color . ' !important;
            }
			
			/* Targeting Icons */
			#wpadminbar .ab-item,
            #wpadminbar .ab-item:before,
			#wpadminbar .ab-item > span.ab-icon:before,
			#wpadminbar .ab-item > span.ab-label {
                color: #ffffff !important; /* For font icons */
            }
			
            #wpadminbar svg { fill: #ffffff !important; /* For SVG icons */ }
        </style>';
    }
    add_action('admin_head', 'smarty_custom_admin_styles');
}

if (!function_exists('smarty_custom_admin_styles_frontend')) {
    /**
     * Adds custom styles to the frontend WordPress admin bar based on the current environment.
     *
     * This function applies the environment-specific styles to the admin bar when displayed
     * on the frontend of the site, making it easy to visually identify the environment.
     */
    function smarty_custom_admin_styles_frontend() {
        if (!is_admin_bar_showing()) {
            return;
        }

        $environment = wp_get_environment_type();
        $bg_color = '';

        switch ($environment) {
            case 'local':
                $bg_color = '#ed800e'; // Orange for Local
                break;
            case 'development':
                $bg_color = '#2271b1'; // Blue for Development
                break;
            case 'staging':
                $bg_color = '#7866a3'; // Purple for Staging
                break;
            default:
                $bg_color = '#5e7d50'; // Green for Production
        }

        // Add styles to the frontend admin bar
        echo '<style type="text/css">
            #wp-admin-bar-environment_notice > .ab-item.ab-empty-item span,
            #wp-admin-bar-environment_notice > .ab-item.ab-empty-item span:hover {
                color: #ffffff !important;
                font-weight: bold !important;
            }
            #wp-admin-bar-environment_notice > .ab-item.ab-empty-item,
            #wp-admin-bar-environment_notice > .ab-item.ab-empty-item:hover {
                margin: 0 15px;
                color: #f0f0f1 !important;
                background-color: ' . $bg_color . ' !important;
            }
        </style>';
    }
    add_action('wp_head', 'smarty_custom_admin_styles_frontend');
}
