<?php

include 'php/autoload.php';

$objWBPTranslation = new WBPTranslation();
$objWBPLayout = new WBPLayout();
$objWBPHtml = new WBPHtml();
$objWBPRoute = new WBPRoute();

$WBPTranslation = $objWBPTranslation->translateContent();

$objWBPRoute->addRoute([
    ['home', 'home.php'],
    ['blog', 'blog.php'],
    ['blog-post', 'blog_post.php'],
    ['admin', 'admin.php'],
    ['admin-blog', 'admin_blog.php'],
    ['admin-login', 'admin_login.php'],
    ['admin-logout', 'admin_logout.php'],
]);

$route = $objWBPRoute->getRoute();
include $route;
