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
define('DB_NAME', 'prabhain_test');

/** MySQL database username */
define('DB_USER', 'prabhain_test');

/** MySQL database password */
define('DB_PASSWORD', 'zomata!@#$%');

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
define('AUTH_KEY',         ' {Q*r72i6/#C@KuD?{{yMj[MiA(b-xG]+1!Lm&%7c~@zlg5W<gVH1MppYYn_ofyS');
define('SECURE_AUTH_KEY',  '#vC%o02obE:ljTt5=n5x=rEJ{QasdG%sCKmb(rew :H!qW|jvBgu(Z`V#n|+ho:u');
define('LOGGED_IN_KEY',    '@(/>YKQ60Q`HW;JtHO{,RXd?~y_*389A#ji-~_`>84;ef),Y5V]I@^Kli8:vUumS');
define('NONCE_KEY',        'zwHo!/4w7}xED|^PI!xqh=>1dTI?NnEZP@QUAEOf6~wZGfX!EOXy8JUxCX$7c5kn');
define('AUTH_SALT',        'S`GT0 93mF}W~F10!2[!HJ!yJ4</kcw|wJn_<mXi!:Zj)o1}m,zwr,+<qf {[VY6');
define('SECURE_AUTH_SALT', '*bFgz 1WXsWgevo/7@zqmD%Md8^7]Tag$|15I>(h[]]8_F+QK,;JuTR_}4jGwJs[');
define('LOGGED_IN_SALT',   '!$7`GD_b0JXC&Ek7D2]LIEebM})o,T67$EU~<%eD{al,_uOEBk?5OU,~eh-S}bO1');
define('NONCE_SALT',       '{`9Gz]Hp|Q$,RC_6~%`|<tpI=!]?FhQ&v2K?i:#$CQgeqiV.?97&%~0!QwPo`Av}');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
