<?php
function set_autoblog_url($base) {

	global $autoblog_url;

	if(defined('WPMU_PLUGIN_URL') && defined('WPMU_PLUGIN_DIR') && file_exists(WPMU_PLUGIN_DIR . '/' . basename($base))) {
		$autoblog_url = trailingslashit(WPMU_PLUGIN_URL);
	} elseif(defined('WP_PLUGIN_URL') && defined('WP_PLUGIN_DIR') && file_exists(WP_PLUGIN_DIR . '/autoblog/' . basename($base))) {
		$autoblog_url = trailingslashit(WP_PLUGIN_URL . '/autoblog');
	} else {
		$autoblog_url = trailingslashit(WP_PLUGIN_URL . '/autoblog');
	}

}

function set_autoblog_dir($base) {

	global $autoblog_dir;

	if(defined('WPMU_PLUGIN_DIR') && file_exists(WPMU_PLUGIN_DIR . '/' . basename($base))) {
		$autoblog_dir = trailingslashit(WPMU_PLUGIN_URL);
	} elseif(defined('WP_PLUGIN_DIR') && file_exists(WP_PLUGIN_DIR . '/autoblog/' . basename($base))) {
		$autoblog_dir = trailingslashit(WP_PLUGIN_DIR . '/autoblog');
	} else {
		$autoblog_dir = trailingslashit(WP_PLUGIN_DIR . '/autoblog');
	}


}

function autoblog_url($extended) {

	global $autoblog_url;

	return $autoblog_url . $extended;

}

function autoblog_dir($extended) {

	global $autoblog_dir;

	return $autoblog_dir . $extended;


}

function get_autoblog_option($key, $default = false) {

	if(defined( 'AUTOBLOG_GLOBAL' ) && AUTOBLOG_GLOBAL == true) {
		return get_site_option($key, $default);
	} else {
		return get_option($key, $default);
	}

}

function update_autoblog_option($key, $value) {

	if(defined( 'AUTOBLOG_GLOBAL' ) && AUTOBLOG_GLOBAL == true) {
		return update_site_option($key, $value);
	} else {
		return update_option($key, $value);
	}

}

function delete_autoblog_option($key) {

	if(defined( 'AUTOBLOG_GLOBAL' ) && AUTOBLOG_GLOBAL == true) {
		return delete_site_option($key);
	} else {
		return delete_option($key);
	}

}

function autoblog_db_prefix(&$wpdb, $table) {

	if( defined('AUTOBLOG_GLOBAL') && AUTOBLOG_GLOBAL == true ) {
		if(!empty($wpdb->base_prefix)) {
			return $wpdb->base_prefix . $table;
		} else {
			return $wpdb->prefix . $table;
		}
	} else {
		return $wpdb->prefix . $table;
	}

}
?>