<?php

namespace hypeJunction\ElggBridge;

/**
 * Plugin bootstrap
 */
class Plugin {

	const TEXT_DOMAIN = 'elgg-bridge';

	/**
	 * @var \hypeJunction\WebServices\Client
	 */
	private $client;

	/**
	 * Get plugin root path
	 * @return string
	 */
	public static function root() {
		return dirname(dirname(dirname(dirname(__FILE__))));
	}

	/**
	 * Boot the plugin
	 * @return void
	 */
	public function boot() {
		(new AdminInterface())->boot();
	}

	/**
	 * Build a web services client
	 * @return \hypeJunction\WebServices\Client
	 */
	public function getClient() {
		if (!isset($this->client)) {
			$options = (array) get_option('elgg_bridge_options');
			$this->client = new \hypeJunction\WebServices\Client($options['base_url'], $options['api_key']);
		}
		return $this->client;
	}
}
