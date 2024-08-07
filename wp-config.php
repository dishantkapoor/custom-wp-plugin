<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_database' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'CCuFV} o2F{KmI@%1<0]:3#arVG5p G;;84J+Yg@_*<&]cUU?<VNIh:m4?eqM3%(' );
define( 'SECURE_AUTH_KEY',  '.#E#tqvsVTE+^EcU5l9,itSwIQQM;]QKF!(MQb!5pN|t-(.tS3UAE6[Iwmrf#0-t' );
define( 'LOGGED_IN_KEY',    'Su0{3$-BmglG=aCT>wNULgb00AYrwE1w#kwEHD)En/%yQZ:l^(~)xv#Y!+.aN*+H' );
define( 'NONCE_KEY',        'OFsb&b3#g:wvc/<vy^ik]q*@BWN{4^{4w*V^jw>(EWuR=<b*Yc]N|afQ2]Ak+-sm' );
define( 'AUTH_SALT',        'w(7D^3,%& )u8Jb@|?Er$v7bl,TTXBB,N<l<kl+G+5M0M4@_Ohn`h#H4Z)1x0C d' );
define( 'SECURE_AUTH_SALT', 'B[na|OaR^Ma+rgR>fl.FntmXs9KR%c9wzr+5za:11yuyfsk)WZ5ZHRN[2RS:&~^O' );
define( 'LOGGED_IN_SALT',   't!+n$qS6w_xrRMv#rQ}9&hN2A:)>pR`2r.$FUWc:d-K.},OG*f2L VM%5Ci{vhzO' );
define( 'NONCE_SALT',       '$# ?B:s#K|-h1>D8 /dh.;.b,Bd<5m #&^ZH_$rp4fPI7 blmxtsN-/6~c/@+D/D' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
