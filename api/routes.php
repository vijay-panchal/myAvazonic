<?php


$app->post('/users', 'UserAction');
$app->get('/users/:id',	'getUser');

/**************** customer *************************/
$app->post('/customers', 'CustomerAction');
/**************** End customer *************************/

//$app->get('/test/:id','GetvalidUserDetails');


?>