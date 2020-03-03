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
    ['admin', 'admin.php'],
    ['admin-blog', 'admin_blog.php'],
    ['admin-login', 'admin_blog.php'],
    ['admin-logout', 'home.php'],
]);

$route = $objFrameworkRoute->getRoute();
include $route;
?>