<?php

require './configuration/helper.php';
require './core/Route.php';
require './core/Session.php';
require './core/Translation.php';

$objRoute = new Core\Route();
$objTranslation = new Core\Translation();

$objTranslation->build();
$objRoute->build();