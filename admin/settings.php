<?php

use hypeJunction\ElggBridge\Plugin;

$options = (array) get_option('elgg_bridge_options');
$api_result = elgg_bridge()->getClient()->get('site.test');
?>
<div class="wrap">
	<h2><?= __('Elgg Bridge Options', Plugin::TEXT_DOMAIN) ?></h2>
	<form method="post" action="options.php">
		<?= settings_fields('elgg_bridge_options'); ?>
		<?php
		if ($api_result && $api_result['status'] >= 0) {
			?>
			<div class="notice notice-success">
				<p>
					<?= __('Web services are up and running', Plugin::TEXT_DOMAIN) ?>
				</p>
			</div>
			<?php
		} else {
			?>
			<div class="notice notice-error">
				<p>
					<?= __('Unable to connect to web services. Please verify that you have provided correct details below.', Plugin::TEXT_DOMAIN) ?>
				</p>
			</div>
			<?php
		}
		?>
		<table class = "form-table">
			<tr valign = "top">
				<th scope = "row"><?= __('Elgg site URL', Plugin::TEXT_DOMAIN) ?></th>
				<td>
					<input type="text" name="elgg_bridge_options[base_url]" value="<?= $options['base_url']; ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?= __('API Key', Plugin::TEXT_DOMAIN) ?></th>
				<td>
					<input type="text" name="elgg_bridge_options[api_key]" value="<?php echo $options['api_key']; ?>" />
				</td>
			</tr>
		</table>
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>