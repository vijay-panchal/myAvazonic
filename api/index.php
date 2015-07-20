<?php

require 'Slim/Slim.php';
require 'Slim/db.php';

/***********DB Connection start************/
include ('db_config.php');
/***********DB Connection End************/

/************Modules Include here**************/
include ('Slim/modules/user_manager.php');
include ('Slim/modules/customer_manager.php');
/************Modules End**************/


//$app = new Slim();
$app = new Slim(array('log.enable' => true));

/***************Error Handling*************/
$app->get('/', function () use ($app) {
    $log = $app->getLog();
    $log->debug('root');
});
/***************Error Handling*************/

/************Create routes ************/
include('routes.php');
/************End routes ************/

$app->run();


?>