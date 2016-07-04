<?php

namespace hypeJunction\ElggBridge;

class AdminInterface {

	/**
	 * Boot the plugin
	 * @return void
	 */
	public function boot() {
		add_action('admin_init', array($this, 'init'));
		add_action('admin_menu', array($this, 'setupMenu'));
	}

	/**
	 * admin_init action callback
	 * @return void
	 */
	public function init() {
		register_setting('elgg_bridge_options', 'elgg_bridge_options', array($this, 'validateSettings'));
	}

	/**
	 * Validate plugin settings input
	 *
	 * @param array $input User input
	 * @return Validated input
	 */
	public function validateSettings($input) {

		$base_url = sanitize_text_field($input['base_url']);
		$api_key = sanitize_text_field($input['api_key']);

		if (empty($base_url) || !filter_var($base_url, FILTER_VALIDATE_URL)) {
			$msg = __('Please enter a valid URL', Plugin::TEXT_DOMAIN);
			add_settings_error('base_url', 'base_url_texterror', $msg);
			$base_url = '';
		}

		if (empty($api_key)) {
			$msg = __('Please enter a valid API Key', Plugin::TEXT_DOMAIN);
			add_settings_error('api_key', 'api_key_texterror', $msg);
			$api_key = '';
		}

		return [
			'base_url' => $base_url,
			'api_key' => $api_key,
		];
	}

	/**
	 * Add options page to admin menu
	 * @return void
	 */
	public function setupMenu() {
		$name = __('Elgg Bridge Options', Plugin::TEXT_DOMAIN);
		$title = __('Elgg Bridge', Plugin::TEXT_DOMAIN);
		add_options_page($name, $title, 'manage_options', 'elgg_bridge_options', array($this, 'viewSettingsPage'));
	}

	/**
	 * Render settings page
	 * @return void
	 */
	public function viewSettingsPage() {
		include Plugin::root() . '/admin/settings.php';
	}

}
