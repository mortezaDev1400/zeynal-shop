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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "zeynal1" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "123" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',         '! lw8lT8EGI0JiN+^D;YVbrqUWQ_q=pYLqu{&?[jPZFZ!7|@k(ilRXG!1H9Gm6v}' );
define( 'SECURE_AUTH_KEY',  '@QtmE9m2UP<b-SKvh{+Qe4S^G w$@sC3TG@r:J#[CVal+&1N@;@7Ne0Lf2:]}0o%' );
define( 'LOGGED_IN_KEY',    '|spe*zdKa-MF=r2?.xbFhR;/m_O[c;2qFjFII)3Pcg=`XQqVpkRcn1Pvf=pKj`5+' );
define( 'NONCE_KEY',        '!(<}mPWG`uFfq~Cj#dKY~2YKLBoT?Q4)o=>&qSKqfdtVTs2W CIez~Hg{1`aNUz0' );
define( 'AUTH_SALT',        'mj=v0slsi]j<~iHpQszVIjG]35)(z^MiRDQ6]^X{8|{kdI-=:~/R?LavlR]/5tL@' );
define( 'SECURE_AUTH_SALT', '[=NkwgAMS/G/89Sc/O$#nc8[{TjS4s+Ae`Rl]cqIW^z &uMj .utV#SQyZ,E-{!H' );
define( 'LOGGED_IN_SALT',   '}.n1e(_T%@;Sl=;-!ZTl1PR+lx=r#/4VbUNDO2w2tG%Z9Zs^^!CbCa|b@_vV`*hE' );
define( 'NONCE_SALT',       '$mgC0A*o> Y^e)2jN/.?V_vc|]GW5(,#zDQ1aSnQTfj8(|@|;*=K97DdV|#aE$B[' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'dappq_';

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
 
 
//define( 'ALTERNATE_WP_CRON', true );
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

define( 'WP_SITEURL', 'http://localhost/zeynal-shop/' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
//Disable File Edits
define( 'DISALLOW_FILE_EDIT', false );