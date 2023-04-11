<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'southgatedb' );

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
define( 'AUTH_KEY',         '*~[hz8BKw1MBt@:)8LYTm[En%*p$K,LB+f,,ZMkR]O6sFk0(ZN0ZU]5rcVhdj/<$' );
define( 'SECURE_AUTH_KEY',  '6G&@z2dR*r^fQH_<xg/Af@rM/ylb1,KbBFM_[L-Ru.+{mq dgP;zZFH<;CYU3a]?' );
define( 'LOGGED_IN_KEY',    'L:GMucPq{B .xO1]~D^i=7m+ick8]Nm;<wwf5.F<+NFrtWu1*=R62SnAT=1V#%0r' );
define( 'NONCE_KEY',        'AW.w|r}Dt=k.Noa]`xHk/}5_YFn>?2[ytz@|0y ~gv7aS@!Zd=J)&!O>L~Yn#Rr,' );
define( 'AUTH_SALT',        'Qh=3<e? ^fyI3r$B;ig|E)!:z^Bb<)(a=rOzKaoebRIbNEdnWTtY03c#QO~TSA~;' );
define( 'SECURE_AUTH_SALT', 'nI2Cj=,Tnx#,HMHdHFZ(#3PtM$b=~=-A|*/),*+fWH:s6v?#b*>d;]BBu!5zARh?' );
define( 'LOGGED_IN_SALT',   'AbDen!(Li(q/J7RW8jH7hR)&B5^:P}RrcUYt{O&p_(4ms<Yc($PB%@/FmgR8hgkf' );
define( 'NONCE_SALT',       'g4q)+O.pul@c6dvZefpgG_vtTatv#fUT5[}z,Pfum?uKCOom<K(xkIQ@A,*Epy%6' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
