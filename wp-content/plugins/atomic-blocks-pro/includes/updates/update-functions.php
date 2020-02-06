<?php
/**
 * Handles communicating with the WPE product update API
 * and saving the data for WordPress to use for plugin updates.
 *
 * @package AtomicBlocksPro
 */
namespace AtomicBlocksPro\PluginUpdates;

use stdClass;
use function AtomicBlocksPro\atomic_blocks_pro_main_plugin_file;

defined( 'WPINC' or die );

add_filter( 'pre_set_site_transient_update_plugins', __NAMESPACE__ . '\check_for_updates' );
/**
 * Checks the WPE plugin info API for new versions of the plugin
 * and returns the data required to update this plugin.
 *
 * @param object $data WordPress update object.
 *
 * @return object $data An updated object if an update exists, default object if not.
 */
function check_for_updates( $data ) {

	// No update object exists. Return early.
	if ( empty( $data ) ) {
		return $data;
	}

	$response = get_product_info();

	if ( empty( $response ) ) {
		return $data;
	}

	$current_plugin_data = get_plugin_data( atomic_blocks_pro_main_plugin_file() );
	$meets_wp_req        = version_compare( get_bloginfo( 'version' ), $response->requires_at_least, '>=' );

	// Only update the response if there's a newer version, otherwise WP shows an update notice for the same version.
	if ( $meets_wp_req && version_compare( $current_plugin_data['Version'], $response->stable_tag, '<' ) ) {
		$data->response[ plugin_basename( atomic_blocks_pro_main_plugin_file() ) ] = $response;
	}

	return $data;
}

add_filter( 'plugins_api', __NAMESPACE__ . '\custom_plugins_api', 10, 3 );
/**
 * Returns a custom API response for updating the plugin
 * and for displaying information about it in wp-admin.
 *
 * The `plugins_api` filter is documented in `wp-admin/includes/plugin-install.php`.
 *
 * @param $api
 * @param $action
 * @param $args
 *
 * @return false|stdClass $api Plugin API arguments.
 */
function custom_plugins_api( $api, $action, $args ) {

	if ( $args->slug !== dirname( plugin_basename( atomic_blocks_pro_main_plugin_file() ) ) ) {
		return $api;
	}

	/** @var stdClass $product_info */
	$product_info = get_product_info();

	if ( empty( $product_info ) || is_wp_error( $product_info ) ) {
		return $api;
	}

	$current_plugin_data = get_plugin_data( atomic_blocks_pro_main_plugin_file() );
	$meets_wp_req        = version_compare( get_bloginfo( 'version' ), $product_info->requires_at_least, '>=' );

	$api                        = new stdClass();
	$api->author                = 'Atomic Blocks';
	$api->homepage              = 'https://atomicblocks.com';
	$api->name                  = $product_info->name;
	$api->requires              = isset( $product_info->requires_at_least ) ? $product_info->requires_at_least : $current_plugin_data['RequiresWP'];
	$api->sections['changelog'] = isset( $product_info->sections->changelog ) ? $product_info->sections->changelog : '<h4>1.0</h4><ul><li>Initial release.</li></ul>';
	$api->slug                  = $args->slug;

	// Only pass along the update info if the requirements are met and there's actually a newer version.
	if ( $meets_wp_req && version_compare( $current_plugin_data['Version'], $product_info->stable_tag, '<' ) ) {
		$api->version       = $product_info->stable_tag;
		$api->download_link = $product_info->download_link;
	}

	return $api;
}

/**
 * Fetches and returns the plugin info from the WPE product info API.
 *
 * @return stdClass
 */
function get_product_info() {

	$current_plugin_data = get_plugin_data( atomic_blocks_pro_main_plugin_file() );

	// Check for a cached response before making an API call.
	$response = get_transient( 'atomic_blocks_pro_product_info' );

	if ( false === $response ) {

		$request_args = [
			'timeout'    => ( ( defined( 'DOING_CRON' ) && DOING_CRON ) ? 30 : 3 ),
			'user-agent' => 'WordPress/' . get_bloginfo( 'version' ) . '; ' . get_bloginfo( 'url' ),
			'body'       => [
				'version' => $current_plugin_data['Version'],
			]
		];

		$response = wp_remote_get( 'https://www.wpengineapi.com/v1/plugins/atomic-blocks-pro/', $request_args );

		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
			// Cache an empty object for 5 minutes to give the product info API time to recover.
			$response = new stdClass();
			set_transient( 'atomic_blocks_pro_product_info', $response, MINUTE_IN_SECONDS * 5 );
			return $response;
		}

		$response = json_decode( wp_remote_retrieve_body( $response ) );

		$response->name = isset( $response->name ) ? $response->name : 'Atomic Blocks Pro';

		$response->stable_tag = isset( $response->stable_tag ) ? $response->stable_tag : $current_plugin_data['Version'];

		$response->new_version = $response->stable_tag;

		$response->download_link = isset( $response->download_link ) ? $response->download_link : '';

		$response->package = $response->download_link;

		$response->slug = 'atomic-blocks-pro';

		// Cache the response for 4 hours.
		set_transient( 'atomic_blocks_pro_product_info', $response, HOUR_IN_SECONDS * 12 );
	}

	return $response;
}
