<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'imarkcli_winestorage');

/** MySQL database username */
define('DB_USER', 'imarkcli_wine'); 

/** MySQL database password */
define('DB_PASSWORD', 'imark@123#g');

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
define('AUTH_KEY',         'Tz|c.lmSt<@(}(|$S!&NfUOLq(T<QHdLbY2#I*i-FQr}U%!cac:YV<v=/CECT/gh');
define('SECURE_AUTH_KEY',  '0pl#/tl&.o76?,*20T2D+}P(p]F6]8e{PgjW>?o9h?i~[fyCEl_YSbq`$723]iA4');
define('LOGGED_IN_KEY',    '{`8Kg)jw5imQ.MDl=]PAp2Wq>y0g?Fm1fLtD|h3^I)yjvOtn24MjmYH:Am>jW`(G');
define('NONCE_KEY',        'r 4oR9)xWz+5G|a(HFYuB]StbpXi*9Lp#UaO<B0=+u=xQ`/Q;wX205ErTW ^v;Iv');
define('AUTH_SALT',        'B8<ySw+|&d0!t0=MzBUYZ[|4j/e{4w9keb#8pu;ke6e^3jS3Gie7QRVqC`--NVkK');
define('SECURE_AUTH_SALT', 'E,z%~qOv%A6@ZTLGFq}u}]P|`&n{x;R]&,N2R!*eV|<=onNA.fz|@QS)Qwp5$-#H');
define('LOGGED_IN_SALT',   '(x Nv0D *M..s)8k@15YR!xqu)-O56nFDw8!e]4lv^^p1s~, |&B+RF76oJtQd/J');
define('NONCE_SALT',       'u8=W3PWX;(StN^-A2G0^FK7g-{=KTa2}24.^#,..:v^JV&J?ZoK#y2-;T-1,RR^X');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ws_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
