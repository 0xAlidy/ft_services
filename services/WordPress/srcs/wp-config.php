<?php
//Php is a script language
//https://wordpress.org/support/article/editing-wp-config-php/

//Otherwise empty table prefix error
$table_prefix = 'wp_';

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );
/** MySQL database username */
define( 'DB_USER', 'user1' );
/** MySQL database password */
define( 'DB_PASSWORD', 'password' );
/** MySQL hostname */
define( 'DB_HOST', 'mysql' );
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define( 'WP_DEBUG', true );
define( 'WP_ALLOW_REPAIR', true );

//define wordpress url
//define( 'WP_SITEURL', 'http://192.168.99.131:5050' );
//define wordpress homepage url
//define( 'WP_HOME', 'http://192.168.99.131:5050' );

//Setting authorization keys
define( 'AUTH_KEY',         'pass' );
define( 'SECURE_AUTH_KEY',  'pass' );
define( 'LOGGED_IN_KEY',    'pass' );

//Define the absolute path to this file if not already defined
if ( ! defined( 'ABSPATH' ) )
{
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
  //dirname(_FILE_) => gives pwd of current file
}

//Sets up WordPress variables and included files
require_once( ABSPATH . 'wp-settings.php' );
//require once => if file already included do not include it a second time
//ABSPATH gives path

?>