<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
define( 'FORCE_SSL_ADMIN', true ); // Redirect All HTTP Page Requests to HTTPS - Security > Settings > Secure Socket Layers (SSL) > SSL for Dashboard
// END iThemes Security - Do not modify or remove this line

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
define( 'DB_NAME', 'bluberry_gaf' );

/** MySQL database username */
define( 'DB_USER', 'bluberry_gaf' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Xp@8Z85dS[' );

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
define( 'AUTH_KEY',         '.*]7|*!U8F_@|i+_70jHu}5;IWD[,hhA/W6hQl4s(#MC e<F1T-lu}qmi.!1PitS' );
define( 'SECURE_AUTH_KEY',  'PDDZoWyj/--V~-m>r2_gyY[N%6OJ*%x#y.CPdo,^_L1.4H MHB}{$R?avu95nIrx' );
define( 'LOGGED_IN_KEY',    ' Qhj0fuvm[v !Eng=J@9T&Dcpl5cS(JPfVKZTOk4f0ur;xx%X%677C4*`n-?|<-L' );
define( 'NONCE_KEY',        '<eKKn4b0L6R<?0K0s)To9LT%+ETS+Rv`b{l{Pcvb;3ynmn_}r&pkGD4c+`?7-[{i' );
define( 'AUTH_SALT',        'GS]d$!9vkRI^rmA-IG]TdSk1aq2aXJ>cjy?CU={/s<YR|00[w$v. 5#c&03{sj R' );
define( 'SECURE_AUTH_SALT', 'o.6q/nRrO#0(DF?n-TiZWs63n9.;T@k7b6D83Yy. ]9h+kzvEo7uQzK;8Px!j)e(' );
define( 'LOGGED_IN_SALT',   '-:n*C5 Uf}P#[D=xk[]OtIptTW{w+-jfT0aL@/!^ve|8iRR`CXE&:zU<@xDKSdGa' );
define( 'NONCE_SALT',       '6fR+gSa0AP,d8FJ!=t<#Cd~{{q)L` T?Etu~pU<4%J:%P0%WQz=ck$~`eLy--$NK' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'getafrfir_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
