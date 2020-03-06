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
    ['blog-post', 'blog_post.php'],
    ['admin', 'admin.php'],
    ['admin-blog', 'admin_blog.php'],
    ['admin-login', 'admin_login.php'],
    ['admin-logout', 'admin_logout.php'],
]);

$route = $objFrameworkRoute->getRoute();
include $route;
