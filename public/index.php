<?php

$configfile = '../application/configs/settings.ini';

include ('../application/autoload.php');

$request = model_general_request::getRequest();
$app = new bootstrap();
$app->run($request, $configfile);

