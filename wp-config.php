<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'vylGFjSy9SHTtw3qN61PZ2m52KU7oSGCwy/5H0OU2H3cYmj3AxrMRAm9E5BzrawYOKQFJ6/7OxzmQORYnFqVgg==');
define('SECURE_AUTH_KEY',  'Mlj2IXb7gbLLJ/HvuHBF4igzlBGrVX2V+CApsSLMmKtLRiYcyJyJUel2PhuWjVc3CLkCamfJxHF6ESL20kEUUw==');
define('LOGGED_IN_KEY',    'Fz0DmBRKLZyi9M2MvZOKLfEugqqMZe4mZDNtcmyI6QlYAqdLU+edYE+TFrwL5oIhC3m/NeDOUN0zYeUVFY0ZpQ==');
define('NONCE_KEY',        '6fOiu+nABWr1JzdwF0UeHhkgv01c8iHmVTEcSRm6C//xti6TKe7OIrkaocFGoASxPdToLGQAh0pvHQKlV0BYHg==');
define('AUTH_SALT',        'wmWDHA7JBg4Az5S8LK8LC4Crd+qZdWQs8gAx70B8CNq8IbfW2GWtCaj1IEhdMxK7jskUMjg+JKSN2laRuWezLA==');
define('SECURE_AUTH_SALT', 'MnDQ9zyR+Ytjvgqt8CjroPF7rxGF09eK2UFyjuLAVGYwf68ZGrLcBTsM99sr6RZqFXu6qo3hcnqP/ZI1+cpzVw==');
define('LOGGED_IN_SALT',   'h8Ouqywr6xS7/gfftJXe+r8Ya2WPhbSitv+H6VmK0Us97NtmDTJfe+ZXta5zNwpvxBd8ZaP+FNjsJgW+dpmNBg==');
define('NONCE_SALT',       'LJJB4ZLyMo/vfGaPcJ1UdwWYGEuMlSImV+H28yJAyfeZHuC3YkVqCu0oI/q0XL0ZMbxt/rXvFrWFyhSVj7VyuQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
