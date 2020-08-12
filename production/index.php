<?php

require_once './application/configuration/helper.php';
$arrFile = glob('./application/core/*.php');

foreach ($arrFile as $file) {
    require_once($file);
}

$objRoute = new Application\Core\Route();
$objToken = new Application\Core\Token();
$objTranslation = new Application\Core\Translation();

$objToken->build();
$objTranslation->build();
$objRoute->build();