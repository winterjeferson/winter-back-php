<?php

require_once './app/configuration/helper.php';
$arrFile = glob('./app/core/*.php');

foreach ($arrFile as $file) {
    require_once($file);
}

$objRoute = new App\Core\Route();
$objToken = new App\Core\Token();
$objTranslation = new App\Core\Translation();

$objToken->build();
$objTranslation->build();
$objRoute->build();