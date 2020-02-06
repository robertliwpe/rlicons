<?php
namespace AtomicBlocksPro\Settings;

add_action( 'atomic_blocks_settings_page_bottom', function() {
	?>
	<div id="atomic-blocks-settings-block-settings-permissions" class="tab-content" style="display: none;"></div>
	<?php
	wp_nonce_field( 'abp_settings_submit', 'abp_settings_submit_nonce' );
} );

add_action( 'atomic_blocks_settings_page_panel_right', function() {
	?>
	<div class="panel-aside panel-ab-plugin panel-club">
		<div class="panel-club-inside">
			<div class="cell panel-title">
				<h3><i class="fa fa-plug"></i> <?php esc_html_e( 'Block Permissions', 'atomic-blocks-pro' ); ?></h3>
			</div>

			<ul>
				<li class="cell">
					<p><?php esc_html_e( 'Block permissions allow you to control which Atomic Blocks settings can be controlled by different user roles.', 'atomic-blocks-pro' ); ?></p>
					<a class="button-primary club-button" target="_blank" href="https://github.com/studiopress/atomic-blocks/wiki"><?php esc_html_e( 'View Documentation', 'atomic-blocks-pro' ); ?> &rarr;</a>
				</li>
			</ul>
		</div>
	</div>
	<?php
} );
/**
 * Saves the block settings permissions data.
 * Ties into the save settings event triggered by Atomics Blocks.
 */
add_action( 'atomic_blocks_save_settings', function( $posted_data ) {

	if ( ! isset( $posted_data['abp_settings_submit_nonce'] )  || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $posted_data['abp_settings_submit_nonce'] ) ), 'abp_settings_submit' ) ) {
		return;
	}

	if ( empty( $posted_data['atomic-blocks-settings']['block_settings_permissions'] ) ) {
		return;
	}

	// @todo validate and sanitize data
	$posted_settings = $posted_data['atomic-blocks-settings']['block_settings_permissions'];
	$all_roles       = array_keys( get_editable_roles() );
	$new_settings    = [];

	// Build an array of the new settings.
	foreach ( $posted_settings as $block => $settings ) {
		foreach ( $settings as $setting_name => $roles ) {
			/**
			 * Remove the placeholder. Placeholder? If someone unchecks all the
			 * roles, the browser won't submit the settings data which we need
			 * to build a complete array of permissions data. Why do we need a
			 * complete array? Because we need to distinguish between
			 * "has yet to be configured" and "has been denied". When someone
			 * submits the form and the roles are missing from the posted data,
			 * that role has been denied access.
			 */
			$roles = array_filter( $roles, function( $role ) {
				return $role !== 'placeholder';
			} );

			$role_array = [];

			foreach ( $all_roles as $role ) {
				$role_array[$role] = true;
				if ( ! in_array( $role, $roles, true ) ) {
					$role_array[$role] = false;
				}
				$new_settings[$block][$setting_name] = $role_array;
			}
		}
	}

	update_option( 'atomic_blocks_pro_block_settings_permissions', $new_settings, false );
} );


add_action( 'atomic_blocks_settings_tabs', function() {
	?>
	<li id="atomic-blocks-settings-tab-block-settings-permissions">
		<a href="#block-settings-permissions" data-tab="block-settings-permissions">
			<i class="fa fa-lock"></i> <?php esc_html_e( 'Block Permission Settings', 'atomic-blocks' ); ?>
		</a>
	</li>
	<?php
} );