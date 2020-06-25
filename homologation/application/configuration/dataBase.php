<?php

require_once __DIR__ . '/helper.php';

if (verifyLocalhost()) {
    $dataBaseUser = 'root';
    $dataBaseUserPassword = '';
    $dataBaseName = 'wb';
    $dataBaseHost = 'localhost';
    $dataBaseType = 'mysql';
} else {
    $dataBaseUser = '';
    $dataBaseUserPassword = '';
    $dataBaseName = '';
    $dataBaseHost = '';
    $dataBaseType = '';
}
