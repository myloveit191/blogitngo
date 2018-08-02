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
define('DB_NAME', 'db_blogit');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'c_<U@5Fl[&)nRQ*3O$`wA]YM)mO.@dA0~mu;|}997&B&F~$vo8Y^iRsu0|kV*2qn');
define('SECURE_AUTH_KEY',  'g#q(^k%5J[)</+x6;?,epb.OoluD@!H*w[,u%*p)9{Q%YaNXJV#%[R*nm}KJlu@p');
define('LOGGED_IN_KEY',    '`e4JgQj4SGN78{8NT[4{FD}$J1wOe23We24j(86MbPb^HR7Xy;%+.`04LJ_5jcFg');
define('NONCE_KEY',        '4ufFt}u(*Q&J10kCyUP-/N85ggmsgBgC?Lc`%$2lF(bf K@IE/ }IhQ,U;+5tCkd');
define('AUTH_SALT',        '~<T`jpbFI6bY|5QEJ#bJ3oinK~_Z4*P<0&Yl;y-ZnV7XW9SjeVtZ>A7RBKbdH-42');
define('SECURE_AUTH_SALT', '4GdTr,425c*6}3P(e.X@3J* G>^o={-V39G MDBJ$76+[W&0[MvC.bEK=xy`ZlMg');
define('LOGGED_IN_SALT',   'gtf3e1 2fEjMk6Wg&-P><jzA3AerRKU%N[:2oyqGyLn~>ZI,aGhj.&z?ozKiI+9k');
define('NONCE_SALT',       'A|{f>iRIwc*Kx7}+$XsxeHkL3:~`ZaQ]C+*5-&R5>G/w}s#,99}Ym_ Q636oyqX6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
// Allow_Repair database
// define( 'WP_ALLOW_REPAIR', true ); 
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
