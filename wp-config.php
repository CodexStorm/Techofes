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
define('DB_NAME', 'techofes');

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
define('AUTH_KEY',         '%M8acQgoI*G;1?og53>L35`L&z<u._+#52*8~bE-oF]xyM.]yUS6DUN#P+h:^cs{');
define('SECURE_AUTH_KEY',  ',sz<Gk>/A9<Svg([f^a7ee$~_n(3#bCR[8U&~r[Ngg;]%]E)QS6kw{<*0hwma(so');
define('LOGGED_IN_KEY',    'i-+jd|j!qhSmhfu%U<^D^8>[U/$razi|P&%=<R(wq/Y5`>vlYsxM++Qh~t!3yVc3');
define('NONCE_KEY',        '0gBpX_Hy;&sYWLX)ifme[RgS&dy~oY/-!^93.|m[W1rVWQivSe`L:mBlGr)oD@c@');
define('AUTH_SALT',        'X1#x((-W7A?&>i8rl-@?.oxu7IV0h: wk34cq*i)*N-ztEkpAza10o9[5%/)ho35');
define('SECURE_AUTH_SALT', '~B(eHFZX%n7.Yy7ayK: tPahsa(9Zu71fX!OH+oIJweMQgS~-es;aghOQ0@QN*e^');
define('LOGGED_IN_SALT',   ',aky)a#$%DXrRH.E+qj[$Crm2Hex>48Kjn&@}yv7u*N(mY*5^@Fdom#B2JrJyL,}');
define('NONCE_SALT',       '@:aL;K2fV8=,QDo-wDoT2 ?t0PiZrE[Xzkip*<w|oBF_d}2ZZgn%W^W?eV>@m&]B');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
