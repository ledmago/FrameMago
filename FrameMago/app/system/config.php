<?php

$config = array();

$config['db'] = [
  'host' => 'localhost',
  'name' => 'oyunpadn_MVO',
  'user' => 'oyunpadn_MVO',
  'pass' => 'Ledmago12'
];

$config['default_language'] = 'en';

define('dir', realpath('.'));
define('controller', dir . '/app/controller');
define('view' , dir . '/app/view');
define('url', 'http://' . $_SERVER['SERVER_NAME'] . '/MVO');
