<?php

include_once 'php/autoload.php';

$objWBPTranslation = new WBPTranslation();
$objWBPHtml = new WBPHtml();
$objWBPRoute = new WBPRoute();

$WBPTranslation = $objWBPTranslation->define();
$WBPTranslation = $objWBPTranslation->translate();

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
?> <?php
include $route;
?> <!--PLACE YOUR GOOGLE ANALYTICS CODE HERE--> <?php
echo $objWBPHtml->buildFooter();
?>