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
define('DB_NAME', 'webcom');

/** MySQL database username */
define('DB_USER', 'test');

/** MySQL database password */
define('DB_PASSWORD', 'test@123');

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
define('AUTH_KEY',         '5;OzD32@ hM|qm0+4-hlJsih^iOaQ@}d@8T*H`%eRFMPy+^5a1~^+J<Lk!um==_T');
define('SECURE_AUTH_KEY',  '6kJW?n.j~R^$W#I}t;Q5.4<{*H0aF@!f=Oq+dE(~XF^mj.oMeh8jSpH)Dlp7rkNz');
define('LOGGED_IN_KEY',    'VS9lWJ8w2)Apv4n[-pBfa6|S`k%gasB?8N&0H>.Z``TPZ>,a~,~8ffvt7ka{RSWs');
define('NONCE_KEY',        'K2&=[jAr5?DU,-[ KNcHp{O:APc(9%p9+}zoFQC2si~lZm(T!cD_zxZ{k]-Qaism');
define('AUTH_SALT',        ';wGe?TDfKZ1Y[~H?fw~+:$z*>{k:_7`S)[?}gtI&#HpbKFuL9%%]}&DsrW@u[FHt');
define('SECURE_AUTH_SALT', 'w0qR:71X_7/V&3JJ#2:/7_l>t=CLw7uxx&Kf]cj_cViRAmo%ex)6=OgfDgRH]Q:y');
define('LOGGED_IN_SALT',   '>Uh*6N?HTZ(N;9t_Qn[Fz]gw.BA}:s:M35fRR0Vi^&(.am 32e;&Z@44fQYi^%Oh');
define('NONCE_SALT',       'HW/Y9pL.Vt2Nz7ei.<&85j5O^eNyR!eB%.#DU=QZVk(gM+IO9,ou![yYb=w3)kh/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wc_';

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
