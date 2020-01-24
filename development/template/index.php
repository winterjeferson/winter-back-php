<?php

include 'php/autoload.php';

$objFrameworkTranslation = new FrameworkTranslation();
$objFrameworkLayout = new FrameworkLayout();
$objFrameworkHtml = new FrameworkHtml();
$objFrameworkRoute = new FrameworkRoute();

$frameworkTranslation = $objFrameworkTranslation->translateContent();

$objFrameworkRoute->addRoute([
    ['home', 'home.php'],
    ['blog', 'blog.php'],
    ['post', 'post.php'],
    ['panel', 'admin.php'],
    ['panel-blog', 'admin_blog.php'],
    ['panel-login', 'admin_login.php'],
]);

$route = $objFrameworkRoute->getRoute();
include $route;
