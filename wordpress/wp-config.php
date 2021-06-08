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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpressuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin123' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'D]b+L:N5NtQ&l |G-6HRFsz-+5FFOe=cOTv--*e-:[7>o#- yxZa1mG==+68WNhb');
define('SECURE_AUTH_KEY',  'E=nL}Wd>_+6;Bi|GQm^HA;ZS%)i0)vS0Seg_HgAN7!C7m/DbOD&-|E-+-B;DLzS{');
define('LOGGED_IN_KEY',    '3J+k3E@r,|[$jF8diI.xO@BG,v&q_Klv,279b8}@KgN9=I+,QPz,>VB@E=QhLLf/');
define('NONCE_KEY',        'giu?=rl>-$rw{Rvx?<+<5uvWO+2S}|P(cNl8fCMs!p|iB@Q;88WbV!kdZ2X,5LBv');
define('AUTH_SALT',        'uU+sW[$`l?:4GonKK1xC|v;|YlRB1_ 5a--5AX2Q:$~ -]mqPd|wU)7[H9kvFr@-');
define('SECURE_AUTH_SALT', '&XB|hmY|Haw6[BGf=0C}~Q~<.0ek0gu-opKd}A6d8ys3=6I@8wVarOtqGAYB[M?H');
define('LOGGED_IN_SALT',   ',U 3YM>)y|=C. K,#k6~#7(.si62,[LP$|u}-AezYy5k{C]Lp@e|y#gSjFL8*^fp');
define('NONCE_SALT',       'xF?1~sh([9zIfH)rpp^=m,^jqc|DC|L W?CPJ3v#*ttg-Q&orCuH4I{L~m5Nlz|J');


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

define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
