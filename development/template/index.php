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
    ['blog-post', 'blog-post.php'],
    ['admin', 'admin.php'],
    ['admin-blog', 'admin-blog.php'],
    ['admin-login', 'admin-login.php'],
    ['admin-logout', 'admin-logout.php'],
    ['admin-upload-image', 'admin-upload-image.php'],
]);

$route = $objWbRoute->getRoute();
?>

<?php
include $route;
?>
{% include "include/analytics.php" %}
{% include "include/footer.php" %}