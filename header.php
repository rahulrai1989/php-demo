<?php
require('vendor/autoload.php');
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

use \Rollbar\Rollbar;
use \Rollbar\Payload\Level;

Rollbar::init(
    array(
        'access_token' => getenv('ROLLBAR_KEY'),
        'environment' => 'development'
    )
);
 ?>