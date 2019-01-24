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
define('DB_NAME', 'smurfee');

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
define('AUTH_KEY',         '($vm]+B8n3eC[;dqJs)q4~|`o1,]t`1(N5,8mrpoumqqet=/|[(/.zP&Q.d!/^y`');
define('SECURE_AUTH_KEY',  'S8<LL8m]j;6-9SmZvJR`#dsN-i,W<zH|b9,az$1ww<$h3fUt=PMI> L&`aqC<8_-');
define('LOGGED_IN_KEY',    'W(i#/GAu1tYn7t~)I1/oii?1odN$fvYyJj{`OvSpy$j-gcKUDz-dwzTg$?/BzDmy');
define('NONCE_KEY',        '/jkVfa){(}+Qm-6w~8kO-6Cl ^;vSrM%~Qu0,5%~7_3Q*,p-z{U9l|6urWw9v,Dz');
define('AUTH_SALT',        't^dGAX6%<io]p)7 ``0E^q$qU?&q&`bK40+<Q +WMH0sWql$(4pf_P1ST(&r#6u=');
define('SECURE_AUTH_SALT', 'r=~3-{iibYaTuObA1TTCr}=f9G`U%W}-,sd{M0Vh6r{JYs==0W.n!QI//?u[c<L]');
define('LOGGED_IN_SALT',   'E`p}3 B4:!5IOAlnUipx)(h]%++0Qvt.EX|pwB;qf[Yf`4<hhM~mI:NcP=6qT+Qe');
define('NONCE_SALT',       '< -mbI9?1_/88i<;61<]J;b4W$xGq2k@IGD-Ct]ROU}lP#s9+`a*R:^ :d!&o0L%');

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
