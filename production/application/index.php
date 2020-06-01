<?php

require_once './configuration/helper.php';

require_once './core/Route.php';
require_once './core/Session.php';
require_once './core/Translation.php';

$objRoute = new Application\Core\Route();
$objTranslation = new Application\Core\Translation();

$objTranslation->build();
$objRoute->build();