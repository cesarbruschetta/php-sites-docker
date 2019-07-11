<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cesarbru_db_physis');

/** MySQL database username */
define('DB_USER', $_ENV['MYSQL_USER']);

/** MySQL database password */
define('DB_PASSWORD', $_ENV['MYSQL_PASS']);

/** MySQL hostname */
define('DB_HOST', $_ENV['MYSQL_HOST']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '2|5_j^TxzdXBeF;_O~St`NA*Q6;8:wws&nW!VUNJ`*j]8dviwrSM)C sKLd$x?v/');
define('SECURE_AUTH_KEY',  '@T(e!A~O6I()]nkmhjmNf6|^) 6)z9Hn66I&Wd%9Qq+S,vVA(*1!bm=t(oh}L4r>');
define('LOGGED_IN_KEY',    '(| QzoV$Up+  =ixdI<XXw;Cels7a[+zcF[(g>TeKyUJ;U4bM1Q^tw@Ex]6ffxZl');
define('NONCE_KEY',        '.Xt%HKZ5TO<+zJg_s?]!%`L}W2{0_?wCBTkPpP@m#ATY]Csq8EHX}<b:(xPSf4zJ');
define('AUTH_SALT',        'yBd)<]PW3($Al)Oi1i}m8hz7sNuvt{sFv#]cs1ZG:w$jq?jXf&VEB2/3B >3=Pz7');
define('SECURE_AUTH_SALT', 'G$h.#%&0uKlE1bs[;0H:Z8L@ss|SS!S o  ,*<K(`UY/co|;3Q!]mAuISGnlH*f_');
define('LOGGED_IN_SALT',   '9O+#%ELH|J%MgI_oT4Je.nVGwVfYN0J=lsv^X$+kUOg]kMZ<q5G!IH|Zc9>`wYzd');
define('NONCE_SALT',       'vUpS1UB.ta9o|{:~W2`h$aySFpppK)u]e=gH]D!-?z$LC:z!/H_|vOY}c;yp&xU ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
// define ('WPLANG', '');
define ('WPLANG', 'pt_BR');

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
