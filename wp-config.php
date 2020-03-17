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
define( 'DB_NAME', 'drop' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'j]A g4kRkMMls>`/v!fjzL!6aBs6]frE%o]DQSsx(^!*_,tm|h/n]V1C{0e+`Iaw' );
define( 'SECURE_AUTH_KEY',  'w(ss)4?,.%)AqapXI)%r#Qw~vjgZ8>L>HHp0}P)GE|*IFltGYcrNUFr>_D6Imt-]' );
define( 'LOGGED_IN_KEY',    'vITk 2!M|1fQk4ga{D)2n 0;85-K&^:#K05b5hAv;#9qOA3%t|)g(.Ns&4UUnx*_' );
define( 'NONCE_KEY',        'v>ry5=>D2w<%3=)QWsN2FMMZGj[iZOT k<hwXoY|p@xGX)V7_ #LaY3VzOHwwDAi' );
define( 'AUTH_SALT',        'G1N&Cj (U;Uo*q/<NbYRyG!x8uA-AQAtl:+%-l*J{6V?(?;[n~0X%=u@mb_s`c~e' );
define( 'SECURE_AUTH_SALT', '[c~Vx6xyeov,L]pm+JVo}D&(|S{U0iqv9~8KibU!y&|/+}mjOgPOg=|,=:?b=ySn' );
define( 'LOGGED_IN_SALT',   ';,l7t@9MM[Y?l6A:Y=H?bXyjELBpWv.)Z+vcKKt?M}8HM:fr<5T~x2HToLK=Q`7!' );
define( 'NONCE_SALT',       '&CVk/k3pTs59YC@vU9</1DL __zW@;Z*q7u~30L#Lea*/,qqM8oiL hp~#NO$%8}' );

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
