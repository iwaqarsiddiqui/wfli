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
define('DB_NAME', 'wfli');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'U2@1 ]~Y,-O6w*DW}%QL0a}p+F<<~Ob$4Xr9=,>}V138o+xr)Rl#FR-7B2uojzat');
define('SECURE_AUTH_KEY',  '~A2{;V1FNv-BG|roi8-|H,ji)3g7&sx37Gp?c.&kJQ~7{Un>N|ynp5c|6~$(o~e ');
define('LOGGED_IN_KEY',    '6ZfT`~s!cz5k>oufwCjVJ$)e-dZ|*r3@AmL9De,s.Atu180d1y^>9USI7i:F_: ]');
define('NONCE_KEY',        '`, 7sma,G:fqv+9#mL+6`rKwt6n9a8yn+M0}jNF/FtBQ:|dL@G_]+:w]aJO<c+TC');
define('AUTH_SALT',        '~aF<z%%AmsI[KLhWsx$U@]TT^kWuNDyl%fm8e%pd*+}DLPIMF3V(cSxWE9Y?r%PS');
define('SECURE_AUTH_SALT', 'ajP(ctZle{yB9(%nB%H;kE~wJv)}<lRV5ClU$9D_,lE1|>O.m|C<Kqh?EjzO9g{P');
define('LOGGED_IN_SALT',   'U<MMY-IKYWA^~axD+ZPixQSFWv<Tu)5v?tzYDS<Vm-EYV3ZDS(U-py|lGc6wo/)$');
define('NONCE_SALT',       '0]/WnPXI2hvH*TY7MO{g%tOhV5W!bG)m$%(a8XANyV[A/;8`-wJ:13zL?^vEuFBI');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wfli_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
