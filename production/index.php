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
    ['blog-search', 'blog-search.php'],
    ['form', 'form.php'],
    ['home', 'home.php'],
]);

$route = $objWbRoute->getRoute();
?> <?php
include $route;
?> <!--PLACE YOUR GOOGLE ANALYTICS CODE HERE--><script>var globalLanguage = '<?php echo $objWbSession->get("language"); ?>';
    var globalUrl = '<?php echo $objWbUrl->getUrlMain(); ?>';
    var globalTranslation = <?php echo json_encode($objWbSession->get("translation")); ?>;</script><script src="<?php echo $urlFrontEnd . 'assets/js/wf-plugin.js'; ?>"></script><script src="<?php echo $mainUrl . 'assets/js/wb-theme.js'; ?>"></script> <?php
if ($isAdmin) {
    echo '<script src="' . $mainUrl . 'assets/js/wb-admin.js"></script>';
}
?>