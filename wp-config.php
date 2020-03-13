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
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', '8b2e41e34673bdc3b4e4e8c9ae81d5d9643c0656eae11d86' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '{1If5k&1Pn3;NrUDX%[~r!)6$iD1A3m.(dbpemn/b0&{_?(pXy%.$!-tL!8WRZ3&' );
define( 'SECURE_AUTH_KEY',  'fDyh?K-Y7ji*0#;hl^LQ:JT|pablFI1X_Po[w2o(q:0AxMf-rdKO3/MdrTg/zvcx' );
define( 'LOGGED_IN_KEY',    'oMA$gBQM>|MAS^aj:eQJ`.0$V>%&Q,k=z_ziWU9|Cr6P7b&XLpP#_!5YW1.%+]=]' );
define( 'NONCE_KEY',        'szhwT c]8.dcl^}Y}SkG9NQ5+!/t9H0|p:prR{ ;:2(8ub.<W!ox3Ck|ix=:mgSo' );
define( 'AUTH_SALT',        'D)_|UELstwYHO=bh5VZg_]O.Z33*>}!SdfHX{@qaPMF/tP#c-VF1 :_p1IoZE_OL' );
define( 'SECURE_AUTH_SALT', 'Xn77$ImK[;qnLLHylzlr>9O$Ryke6gd_)^X1Q~nEk3B{?C5k>OnH7#Ti3bIl#B@]' );
define( 'LOGGED_IN_SALT',   'w2@[t5.}LcOC+-qVL!wZ73e|{UR7,ZDNTfEXT%>JM6&@3+M!yjZXeZ4CoW.u@g:F' );
define( 'NONCE_SALT',       '5[U!h<QHpcAfwtR@8t:KkB5L9?r;~p<%?q!!+Z[u#>m-a0_<SNUH;?Xp/%pjo!73' );

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
