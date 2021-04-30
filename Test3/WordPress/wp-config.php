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
define( 'DB_NAME', 'wordpress1' );

/** MySQL database username */
define( 'DB_USER', 'adminwp' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

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
define( 'AUTH_KEY',         'upkk_CWTIckwn5w`EU[q,;n~Xn:[uyye$!]qyJ+v)Ne5)[%],{D!(wG.ol?Ra#.D' );
define( 'SECURE_AUTH_KEY',  '$=rNA#}H=TUm.>t]8cFA2-2Y;_45eIl3Qa.&v^K&<+^{um}QibtuQ:`:<MPF&#ZR' );
define( 'LOGGED_IN_KEY',    'K1nu/]S G(f%#_V;W6#!^jrGS#DUwLK+_QbiCUTTy=K+hmDo`s/LQupY,F,UsZ<<' );
define( 'NONCE_KEY',        'bALL7uH*Vs6cezmC&2S63gr61v$5/SS4/^bzL9ndd.:1TP(C$cqs>7>^|h%`]4)~' );
define( 'AUTH_SALT',        ')^$c@:J8/^KZbH&Q@14v.D*,q<7|{~ebMid%ewYQiUyu&<<f1HN6%@ncrDY3`3{5' );
define( 'SECURE_AUTH_SALT', 'Vm{2EAl+PkkhbD%v[41Q4iz#<mCfW|yTEI+}a$fbjAm.>-:.6N{Vj*+=w|Zma4Xg' );
define( 'LOGGED_IN_SALT',   'fXTGO[UD*DUwrjb0K%eNYK2AnLI@nI#]]Hk>Z={yyCAfjbbK-4tbe44wGrTOm/R?' );
define( 'NONCE_SALT',       'b!)NjG5e&Wl77rm:U6t4*gwx`7L[%.]F7afeEo3k`78V4ftLH7akq#22T^=88Af?' );

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
