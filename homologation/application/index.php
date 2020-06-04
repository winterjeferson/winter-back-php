<?php

require './configuration/helper.php';

require './core/Route.php';
require './core/Session.php';
require './core/Translation.php';

$objRoute = new Application\Core\Route();
$objTranslation = new Application\Core\Translation();

$objTranslation->build();
$objRoute->build();