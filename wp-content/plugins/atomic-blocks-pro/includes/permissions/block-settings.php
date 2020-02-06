<?php
/**
 * Functions related to block settings permissions.
 */
namespace AtomicBlocksPro\Permissions;

/**
 * Returns the permissions for block setting controls.
 *
 * @return array
 */
function block_settings_permissions() {
	return get_option( 'atomic_blocks_pro_block_settings_permissions', [] );
}
