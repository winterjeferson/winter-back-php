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
]);

$route = $objWbRoute->getRoute();
?>

<?php
include $route;
?>
<!--PLACE YOUR GOOGLE ANALYTICS CODE HERE-->
<?php
echo $objWbHtml->buildFooter();
?>