<?php
define( 'WP_CACHE', true );

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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u538957227_AZ7A6' );

/** Database username */
define( 'DB_USER', 'u538957227_k2JvU' );

/** Database password */
define( 'DB_PASSWORD', '4rfr2HtDfE' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'IC&y]lO!(LUiZ:VdNpdEaH^bR/rR,/</n~|2pE)zyjH%Z_m)Uh,+7z,/RH&~rcKY' );
define( 'SECURE_AUTH_KEY',   'IT}M`?5r;>s95qy:;E{$?EdY?Yk8>t=I%7e@8FhOP&?bdbP`|NIsdyAl3d<!g6iJ' );
define( 'LOGGED_IN_KEY',     'R]KBU|+@8%k>KfSdF/UDh5J->qo9N[T7LjlM5GuX4Y!p.9^@v=7F>L)G0#SV5YKz' );
define( 'NONCE_KEY',         'H~|9fr-anwRfNHS|8~*h[+<Qno}]&jg 7a}+p=j{,*whfVRm bnp6[gA;-R8b)uJ' );
define( 'AUTH_SALT',         '9U$p.1=l!K2`XnPg#6B3C@DTy_/8Vrz6msgrbk3o>5Rb.&c2SQ{>fnL~W)=xjA `' );
define( 'SECURE_AUTH_SALT',  'Z20TgYxA2UTPG.x iCSf95<ItxIE8b|I*an|F-c^ZaJ =^X13!OC<^oBJr4v+H8}' );
define( 'LOGGED_IN_SALT',    'a&G#>P%.<C|kv0yAxq)Mhgz}p$32e0t4iq[UB-)8yO#y.fr.){W{}SDK@ML_XkVu' );
define( 'NONCE_SALT',        '!Mk]cQs3L)rjNz~<B.9qbidy[shBa,=#*5Gc+_R@@J&|O8~% -Zv%=?x8[qBCU;j' );
define( 'WP_CACHE_KEY_SALT', 'iJoaSc@x*|oCazw}Fzi}?p:~B06OnN5OI<IT<c!}(QZ]k]^2COp0260P*)zl4Ii]' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', '0621894c087e5720735e9925bc09be19' );
define( 'WP_AUTO_UPDATE_CORE', true );
define( 'WP_MEMORY_LIMIT', '512M' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
