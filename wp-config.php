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
define( 'DB_NAME', 'wordpress_602_core' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '123456' );

/** Database hostname */
define( 'DB_HOST', 'web2-mysql:3306' );

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
define( 'AUTH_KEY',         'J6kj Ke}bUa!|et9uK8KYAc^9W#{IK5$W8u~@6+IFnB#r>mMD1A@T5!+yK@XOgr;' );
define( 'SECURE_AUTH_KEY',  'oa`}:Hx$=H;n6UJX[P+| -_Th2Z5uCvBu -k9tAn:0.L#U2hz~heC4*.g+NiZMM;' );
define( 'LOGGED_IN_KEY',    'c8^2O3}h_LFZS*/Tc@fVTH-JvlD2QT{JL!Nu;ra$DV?8MT,qz8E4>|>3v{j8Z^qk' );
define( 'NONCE_KEY',        'kZa,PP]^s+2NTR6WZ6$g/if$kuj$Syh7{s}y]xepa}C&Xel0F1tWz;MIMFj $8V^' );
define( 'AUTH_SALT',        'E!i]PiLgbgCYo/P5zc3@)Qk[:Z2Thk2lzzg+`!)-thwb<FQBmWY!`P9n+2zhj;`@' );
define( 'SECURE_AUTH_SALT', 'y}-`j?0|e2iDcJp]|*NDyhG].a{.v.t+J8G&0su=TA,)EGsICH8 D.vC[tsS2=UX' );
define( 'LOGGED_IN_SALT',   '-Szi1P[k-|=#{RGZ[V_end2MN?!{krI7Acs.-(oWqopkDFhb~|BlCa9h8BwHph|#' );
define( 'NONCE_SALT',       '5d=Q`f{|-91{o+*rc? 3Jc|%eh:BHlwY%EcR-vH&4:+pJP7{BBp@a*UQ<!#C6L{e' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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