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
define('DB_NAME', 'i2086466_wp2');

/** MySQL database username */
define('DB_USER', 'i2086466_wp2');

/** MySQL database password */
define('DB_PASSWORD', 'V]1[*p&aQYs~9fdiEq(68(.1');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'udGS0RxQmS0QZXvUMVhYKaO5i5XrZJDf2GV0YMcnxiDo4cxqiNYeVEmlyU53qxlu');
define('SECURE_AUTH_KEY',  'GjghJjulAQdzoLMyfRnY7qPdGgqsgTAozFylWVgNQKgA0Dgiz97inf9a3fCx3i6p');
define('LOGGED_IN_KEY',    'MdY0cY9o1GHuFj2NohBUXNYt1eB2HxC3kXIWc33v9vUUc1Qu5T9hKe1PlynSpd1r');
define('NONCE_KEY',        'oB0bXU7t7fA0ygrIClIMqYQXtxCdxUr71pHLaeliZxk80161xo1Q61HlaVXRsYCd');
define('AUTH_SALT',        '9GUguNx1jgsXYCE1w1WjWNYsWhB0g1QpBvLwbrpKyfp4QjySrMxRWymXAWQUMl1i');
define('SECURE_AUTH_SALT', 'QCT6sJFL46VqTJdQ7HqA7qPHNl7IP0SL2N6DKkfo3vkgprWLqxU5zO7707P80cdt');
define('LOGGED_IN_SALT',   'Yk9GmLPjaeLd4UiFQZZM8XpLuAPTL3ofCYhQMuvIZYZV79F0f6gkzkZrujLrz3yl');
define('NONCE_SALT',       'LfeVeI8NlDq6F8PWZ7AqmW8IpDcA1g0IjdJ9ckDdkw1U6la75hRZWz0ZdBlZtgmd');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
