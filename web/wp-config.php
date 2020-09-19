<?php

require_once(dirname(__DIR__).'/web/config.php');

$databaseUrl = getenv('DATABASE_URL') ? getenv('DATABASE_URL') : getenv('JAWSDB_MARIA_URL');

// default for dev
if (empty($databaseUrl)) {
  $databaseUrl = 'mysql://root:@127.0.0.1:32809/experience.mcintire.virginia.edu';
}

$url = parse_url($databaseUrl);
$port = '';
if (isset($url['port']) && $url['port'] !== '') {
  $port = ':' . $url['port'];
}

define('DB_NAME', 'wordpress');
define('DB_USER', 'wordpress');
define('DB_PASSWORD', 'wordpress');
define('DB_HOST', '127.0.0.1:32809');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('AUTH_KEY',         getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY'));
define('NONCE_KEY',        getenv('NONCE_KEY'));
define('AUTH_SALT',        getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT'));
define('NONCE_SALT',       getenv('NONCE_SALT'));

if (!defined('ABSPATH')) {
  define('ABSPATH', WEB_ROOT_DIR . '/wp/');
}

require_once(ABSPATH . 'wp-settings.php');
