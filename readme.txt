=== Elgg Bridge ===
Contributors: ismayil.khayredinov
Donate link: http://hypejunction.com/
Tags: elgg, integration
Requires at least: 4.5
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Bridges WordPress with an Elgg installation via Web Services

== Description ==

This plugin is intended for developers that need an easy way to access Elgg's web services from WordPress.

`
// Retrieve blogs from Elgg
elgg_bridge()->getClient()->get('blog.get_posts');

// Get a user auth token
$token = elgg_bridge()->getClient()->getAuthToken($username, $password);

// Post a blog on behalf of the user
elgg_bridge()->getClient()->post('blog.save_post', [
   'title' => 'Blog title',
   'text' => 'Lorem ipsum',
], $token);
`

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/elgg-bridge` directory, or install the plugin through the WordPress plugins screen directly
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings -> Elgg Bridge screen to provide the URL and the API Key of your Elgg installation

You will most likely need to activate `web_services` plugin in Elgg.
This plugin assumes to have `web_services_apis` plugin or similar that provides a set of web services that you can access.

