<?php
$parentFolder = '';

include $parentFolder . 'php/autoload.php';

$objFrameworkTranslation = new FrameworkTranslation();
$objFrameworkLayout = new FrameworkLayout();
$objFrameworkHtml = new FrameworkHtml();

$frameworkTranslation = $objFrameworkTranslation->translateContent();
echo $objFrameworkHtml->buildHeader();
?>