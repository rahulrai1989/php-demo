<?php
require('vendor/autoload.php');

use Dotenv\Dotenv;
use \Rollbar\Rollbar;
use \Rollbar\Payload\Level;

if (getenv('ENVIROMENT') !== 'staging' && getenv('ENVIROMENT') !== 'production') {
    //load env variables
    $dotenv = new Dotenv(__DIR__);
    $dotenv->load();
}

Rollbar::init(
    array(
        'access_token' => getenv('ROLLBAR_KEY'),
        'environment' => 'development'
    )
);
 ?>