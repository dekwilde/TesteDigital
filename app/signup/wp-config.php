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
define('DB_NAME', 'provaonline');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'Ql*PgbBxOu,6G4hIh=OX)+^p}Riyl88-dAE`Rb#6{{S|H5|>KnJ)t,e=ouH 1>*4');
define('SECURE_AUTH_KEY',  '*QUd)ZcO2?V94IfZqt;!Owto/.HVJ?s]#C+=nC?OK($61.YxP5ukQYAyD}IRJF$x');
define('LOGGED_IN_KEY',    'MC,8-QHEcM)^X0E4s, TFGUf7FdgCU2pDmYirv6uGMWv}I-2GfmJ{CZD]::=]$Q/');
define('NONCE_KEY',        'RQ7V&u;wb: `;c{@&@cJ1:*~@@ZY@U_y>?A)H}fJ?U7C9<81|aBT7vcOc?QV}Q_y');
define('AUTH_SALT',        'Cs~/fpW*PI*]`w4EZEGvZPzdG0yWPs{[6oRIBX/-Q;8X1~IGx~tl[kFTjP Vt}]z');
define('SECURE_AUTH_SALT', 'r^mCtb#[t+D]JYWP F_{Zn>b1`o9llB|li}Qd>-yig]|<N_|-}V]SWW$-fD!mLRC');
define('LOGGED_IN_SALT',   'jzGoKrnGtg2j%-(5W$z`kY&DS^FT,|+roJ$g8DEB6V3c5E$;kC6}38g~vyCom[; ');
define('NONCE_SALT',       '{jHLu[;C:dH572gTtAi76}$?fT{C7A<(Pu]n6/zAvbPDG^|i.:InX^b%M 4`ZHE~');

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
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
