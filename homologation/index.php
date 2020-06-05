<?php

require './application/configuration/helper.php';
require './application/core/Route.php';
require './application/core/Session.php';
require './application/core/Translation.php';

$objRoute = new Application\Core\Route();
$objTranslation = new Application\Core\Translation();

$objTranslation->build();
$objRoute->build();