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

function smarty_set_admin_colors() {
	switch(wp_get_environment_type()) {
		case 'local': 
			$admin_color = 'sunrise';
			break;
		case 'development': 
			$admin_color = 'coffee';
			break;
		case 'staging': 
			$admin_color = 'midnight';
			break;
		default: 
			$admin_color = 'modern';
	}

	$args = array(
		'ID' => get_current_user_id(),
		'admin_color' => $admin_color,
	);

	wp_update_user($args);
}

add_action('admin_init', 'smarty_set_admin_colors');