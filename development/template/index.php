<?php

include_once 'php/autoload.php';

$objWBTranslation = new WBTranslation();
$objWBHtml = new WBHtml();
$objWBRoute = new WBRoute();

$WBTranslation = $objWBTranslation->define();
$WBTranslation = $objWBTranslation->translate();

$objWBRoute->addRoute([
    ['home', 'home.php'],
    ['blog', 'blog.php'],
    ['blog-post', 'blog_post.php'],
    ['admin', 'admin.php'],
    ['admin-blog', 'admin_blog.php'],
    ['admin-login', 'admin_login.php'],
    ['admin-logout', 'admin_logout.php'],
]);

$route = $objWBRoute->getRoute();
?>

<?php
include $route;
?>
{% include "include/analytics.php" %}
{% include "include/footer.php" %}