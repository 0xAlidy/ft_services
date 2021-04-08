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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '@4DR+B4]8g!*Po,q2::IR?..>VJyA@{hXDGzy`WLJUVe%-56$,tKk{A{ekbIC6*N');
	define('SECURE_AUTH_KEY',  'Qwit-tMjc+|xK`1Xduj[^LH*Q+^]R-p|E>O.)h-M2:i4.WzL2wX3A~r:YOE{_$1!');
	define('LOGGED_IN_KEY',    'N{jF2Aq/Aj5aK-Zn)1,$}>h-ryHS{&P5?d{[DEh][zqxlCkRvn%9.6S/89iGe@<-');
	define('NONCE_KEY',        'MZX7:=lHg<3C/r_qGXSvF<tuV*`{V6@ qV_qQ+g*Oe9=N0VFs38|@@O|Qtk<9^xO');
	define('AUTH_SALT',        '*Z|lZ=|51jIvq|),GwQ3-]$!b_%wLQf-_7z&M*#B0PET*Sq/+2imlu{i[q_$Q@IF');
	define('SECURE_AUTH_SALT', '+~tB9B(DcLbSRFgC)2Ya#Vu{ae?3ci7-bl?^-`6PL)I;+3yP3{xJV0BLLEpTe-5W');
	define('LOGGED_IN_SALT',   '9t)ch1tqljDh@R>G[/#S-]p<8>Zct0q?>ko((O@Zm,ecFY=z;|1-VP@zU;f!3{V&');
	define('NONCE_SALT',       '.hL4Qw.7cB8/I,k:]nUoMwmLKw}l+8G? Pn83@-dN(z~io~AXY*gm`Q_=m_.uqm3');
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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
