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
define( 'DB_NAME', 'testSite' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '/L(F1|aTt/QNC22CTT$<#Z[g*NlD1jrLC~l/OYyCpf2{r>$j_uA=A&fHD}P}rB:V' );
define( 'SECURE_AUTH_KEY',  'aL*l;HR-jSc,c(&T)n3^S&h;D-Fo]=2~}z{4FmXmpO+YNdGWX*|T{>BvP&|g|~0R' );
define( 'LOGGED_IN_KEY',    'dbaXXsQK5|*Z~#84InT}Xvd?3x:7z<#-KH6%g|/!S*d{/kzS47=gy5kyHYbTh^,+' );
define( 'NONCE_KEY',        ']1N=y5?>teYvXrhkBS91,m{UyPOqS#1VZ?g?S#}A1qu=,$!caAYLjw5vsQ1:94j1' );
define( 'AUTH_SALT',        '.}:z-S  E;2-nXvna!LuN]7,vMS-{E_R=cmV=.2p?5q7Ya+h<YjgQvCJQV O8;iT' );
define( 'SECURE_AUTH_SALT', 'W+e=X@+TuwLUdx+S2)u3FrtMgC82JwhRx<>2Qy85CN/WmVBq~? FUuPjt(YQ&VuW' );
define( 'LOGGED_IN_SALT',   'R+R-oTqimR{,4lQ%dm,LE*S/Mn3)0<hWE$n[K}1CW_wA/CsPg<$):Ub] gZ}m%GZ' );
define( 'NONCE_SALT',       'rB~tVu3R}3[uLT|d42L;~A=1iY{j5 ][7kWUfYS-22sIt50Lt;m0&bXFa9G62;eI' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
