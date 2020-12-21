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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpresslocal' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'A{bynM[>%Mj~f[=)Avn(5!`C{D+^lgP>HblX=t/20Df1x`hbZ[2t61h&1zM5YO2t' );
define( 'SECURE_AUTH_KEY',  'TjA7&BA@etu)D!TnRZZ43Rk8U~-h:GipYikDJ-]e]ZiKCx^*ajx.!uph7~e7O-cJ' );
define( 'LOGGED_IN_KEY',    'Uj&T[QaL<{^k}j!(UbPK~Hu`m}wpvO:~)[7[@{tY<%#i_~*#&moz#y7M!lW#c#GL' );
define( 'NONCE_KEY',        'l`:8~69~tel0*=;r>~1;PrcFE)a}k7(H* @xps5*Bd>&MFzqon<C=i`2irHf$Z9U' );
define( 'AUTH_SALT',        '-jbI TFlNf6_&H:AOub$<N^?w%@q([VrTV;/|4AwXFyXzbJIy2t=, xLyMJ3esqI' );
define( 'SECURE_AUTH_SALT', '.gu+eU?NX^a!ij5K]LV~{,}dhu:zh9L=dUFV21u&T%4?d2+=V1k{f+>tZ|U>ydTH' );
define( 'LOGGED_IN_SALT',   'GF>i-LJXicI{MN`u3RF3i3i>uR^H%a[ei7nOR1d]P?%A{~=N*vv<&Z64,PYd=)Tn' );
define( 'NONCE_SALT',       'ZE`iF`@WE:R26B55G(@/bm[;6L|VW4/+M;ib+{5A%]AKw=t knB0voo9AUyr(Rlg' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
