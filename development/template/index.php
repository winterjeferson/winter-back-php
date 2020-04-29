<?php

include_once 'assets/php/autoload.php';

$objWbTranslation = new WbTranslation();
$objWbRoute = new WbRoute();

$WbTranslation = $objWbTranslation->define();
$WbTranslation = $objWbTranslation->translate();

$objWbRoute->addRoute([
    ['admin', 'admin.php'],
    ['admin-blog', 'admin-blog.php'],
    ['admin-login', 'admin-login.php'],
    ['admin-logout', 'admin-logout.php'],
    ['admin-upload-image', 'admin-upload-image.php'],
    ['blog', 'blog.php'],
    ['blog-post', 'blog-post.php'],
    ['form', 'form.php'],
    ['home', 'home.php'],
    ]);

$route = $objWbRoute->getRoute();
?>

<?php
include $route;
?>
{% include "include/analytics.php" %}
{% include "include/footer.php" %}