<?php

include_once 'php/autoload.php';

$objWbTranslation = new WbTranslation();
$objWbHtml = new WbHtml();
$objWbRoute = new WbRoute();

$WbTranslation = $objWbTranslation->define();
$WbTranslation = $objWbTranslation->translate();

$objWbRoute->addRoute([
    ['home', 'home.php'],
    ['blog', 'blog.php'],
    ['blog-post', 'blogPost.php'],
    ['admin', 'admin.php'],
    ['admin-blog', 'adminBlog.php'],
    ['admin-login', 'adminLogin.php'],
    ['admin-logout', 'adminLogout.php'],
]);

$route = $objWbRoute->getRoute();
?> <?php
include $route;
?> <!--PLACE YOUR GOOGLE ANALYTICS CODE HERE--> <?php
echo $objWbHtml->buildFooter();
?>