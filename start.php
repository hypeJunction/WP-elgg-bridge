<?php

/**
 * Plugin Name: Elgg Bridge
 * Version: 1.0.1
 * Description: Integrates WordPress with Elgg via XML-RPC web services
 * Author: Ismayil Khayredinov
 * Author URI: http://hypejunction.com/
 * Plugin URI: http://hypejunction.com/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: elgg-bridge
 */

if (!defined('ABSPATH')) {
	die('Do not go where the path may lead ...');
}

require_once __DIR__ . '/autoloader.php';

/**
 * Returns plugin singleton
 * @return \hypeJunction\ElggBridge\Plugin
 */
function elgg_bridge() {
	static $instance;
	if (!isset($instance)) {
		$instance = new \hypeJunction\ElggBridge\Plugin();
	}
	return $instance;
}

// Boot the plugin
elgg_bridge()->boot();