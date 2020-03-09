<?php
$parentFolder = '';

include $parentFolder . 'php/autoload.php';

$objWBPTranslation = new WBPTranslation();
$objWBPLayout = new WBPLayout();
$objWBPHtml = new WBPHtml();

$WBPTranslation = $objWBPTranslation->translateContent();
echo $objWBPHtml->buildHeader();
?>