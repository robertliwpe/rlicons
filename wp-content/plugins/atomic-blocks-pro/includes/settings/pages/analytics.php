<?php
namespace AtomicBlocksPro\Analytics;

/**
 * Adds the opt-in setting to the settings page.
 */
add_action( 'atomic_blocks_settings_page_bottom', function() {
	$opted_in = get_option( 'atomic_blocks_pro_analytics_opt_in', false );
	?>
	<table class="form-table atomic-blocks-analytics-form-table">
		<tbody>
		<tr>
			<th>
				<label for="atomic-blocks-settings[analytics-opt-in]">
					<?php esc_html_e( 'Analytics', 'atomic-blocks' ); ?>
				</label>
			</th>
			<td>
				<input type="radio" id="atomic-blocks-settings[analytics-opt-in]" name="atomic-blocks-settings[analytics-opt-in]" value="1" <?php checked( true, ! empty( $opted_in ), true ) ?>" />	
				<label for="atomic-blocks-settings[analytics-opt-in]"><?php esc_html_e( 'Enabled', 'atomic-blocks-pro' ); ?></label>
				<br/>
				<input type="radio" id="atomic-blocks-settings[analytics-opt-in]" name="atomic-blocks-settings[analytics-opt-in]" value="0" <?php checked( true, empty( $opted_in ), true ) ?>" />
				<label for="atomic-blocks-settings[analytics-opt-in]"><?php esc_html_e( 'Disabled', 'atomic-blocks-pro' ); ?></label>
				<p class="atomic-blocks-settings-description">
					<?php
					printf(
						wp_kses_post( 'Opt into anonymous usage tracking to help us make Atomic Blocks Pro better! Read our <a href="%s">privacy policy</a> for more details.', 'atomic-blocks-pro' ),
						'https://wpengine.com/legal/privacy/'
					);
					?>
				</p>
			</td>
		</tr>
		</tbody>
	</table>

	<?php
} );

/**
 * Saves the opt-in setting's value.
 */
add_action( 'atomic_blocks_save_settings', function( $posted_data ) {

	$posted_settings = $posted_data['atomic-blocks-settings'];

	if ( ! empty( $posted_settings['analytics-opt-in'] ) ) {
		update_option( 'atomic_blocks_pro_analytics_opt_in', sanitize_text_field( $posted_settings['analytics-opt-in'] ) );
		return;
	}
	delete_option( 'atomic_blocks_pro_analytics_opt_in' );
} );

/**
 * Loads the opt-in analytics script in wp-admin.
 */
add_action( 'admin_enqueue_scripts', function() {
	if ( empty( get_option( 'atomic_blocks_pro_analytics_opt_in', false ) ) ) {
		return;
	}

	?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-17364082-14"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-17364082-14');
	</script>
	<?php
} );