<?php

require_once './application/configuration/helper.php';
$arrFile = glob('./application/core/*.php');

foreach ($arrFile as $file) {
    require_once($file);
}

$objRoute = new Application\Core\Route();
$objTranslation = new Application\Core\Translation();

$objTranslation->build();
$objRoute->build();