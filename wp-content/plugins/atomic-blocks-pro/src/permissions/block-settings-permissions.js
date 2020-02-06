wp.hooks.addFilter( 'ab_should_render_block_setting', 'ab_pro', ( can_access, block_name, setting_id, user_data ) => {

	const permissions = getBlockSettingsPermissions();

	/**
	 * If the permissions are undefined, this means the settings page
	 * has not been used yet, and by default everyone has access to all
	 * settings. We return the can_access value early, which by default
	 * is set to 'true' by Atomic Blocks. We return can_access instead of
	 * 'true' in case someone else has filtered the value.
	 */
	if ( typeof permissions[block_name] === 'undefined' || typeof permissions[block_name][setting_id] === 'undefined' ) {
		return can_access;
	}

	return user_data.roles.some( ( role ) => {
		return permissions[block_name][setting_id][role] === true;
	} );
} );


/**
 * Returns the block settings permissions data.
 *
 * @returns {{}}
 */
export function getBlockSettingsPermissions() {
	return atomic_blocks_pro_globals.blockSettingsPermissions;
}

/**
 * Returns all the registered blocks from AB and AB Pro.
 *
 * @returns {[]}
 */
export function get_registered_ab_blocks() {
	let abBlocks = [];
	wp.blocks.getBlockTypes().map( block => {
		if ( block.name.startsWith( 'atomic-blocks' ) ) {
			abBlocks.push(block);
		}
	});

	// Remove blocks with no settings data.
	abBlocks = abBlocks.filter( ( block ) => {
		return block.hasOwnProperty( 'ab_settings_data' );
	} );

	return abBlocks;
}

/**
 * Returns all user roles.
 *
 * @returns {{}}
 */
export function getAllRoles() {
	return atomic_blocks_pro_globals.allRoles;
}
