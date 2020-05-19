<?php
$objWbSession = new WbSession();
$objTheme = new Theme();
$objWbUrl = new WbUrl();

$arrLocalhost = ['127.0.0.1', '::1'];
$isLocalHost = in_array($_SERVER['REMOTE_ADDR'], $arrLocalhost) ? true : false;

if (in_array($_SERVER['REMOTE_ADDR'], $arrLocalhost)) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$page = $objWbUrl->getUrlParameters()['page'];
$isAdmin = strpos($page, 'admin') !== false ? true : false;
$lang = $objWbSession->getArray('translation', 'metaLang');
$title = isset($metaDataCustom['title']) ? $metaDataCustom['title'] : $objWbSession->getArray('translation', 'metaTitle');
$author = isset($metaDataCustom['author']) ? $metaDataCustom['author'] : $objWbSession->getArray('translation', 'metaAuthor');
$description = isset($metaDataCustom['description']) ? $metaDataCustom['description'] : $objWbSession->getArray('translation', 'metaDescription');
$keywords = isset($metaDataCustom['keywords']) ? $metaDataCustom['keywords'] : $objWbSession->getArray('translation', 'metaKeywords');
$mainUrl =  $objWbUrl->getUrlMain();;
$urlFrontEnd = 'https://winterjeferson.github.io/winter-front/production/';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=yes" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=5,user-scalable=yes,width=device-width">
    <base href="<?php echo $mainUrl ?>">

    <meta name="theme-color" content="#000000" />
    <meta name="msapplication-TileColor" content="#000000" />

    <link rel="shortcut icon" href="<?php echo $mainUrl .  'assets/img/logo/16-16.png' ?>" />

    <link rel="apple-touch-icon" href="<?php echo $mainUrl . 'assets/img/logo/57-57.png' ?>" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $mainUrl . 'assets/img/logo/72-72.png' ?>" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $mainUrl . 'assets/img/logo/114-114.png' ?>" />

    <meta name="msapplication-TileImage" content="<?php echo $mainUrl . 'assets/img/logo/144-144.png' ?>" />

    <meta name="application-name" content="<?php echo $title ?>" />
    <title><?php echo $title ?></title>
    <meta name="description" content="<?php echo $description ?>" />
    <meta name="author" content="<?php echo $author ?>" />
    <meta name="keywords" content="<?php echo $keywords ?>" />


    <meta property="og:image" content="<?php echo $mainUrl . 'assets/img/logo/600-315.png' ?>" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:locale" content="<?php echo $lang ?>" />
    <meta property="og:url" content="<?php echo $mainUrl ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $title ?>" />
    <meta property="og:site_name" content="<?php echo $title ?>" />
    <meta property="og:description" content="<?php echo $description ?>" />

    <link href="<?php echo $urlFrontEnd . 'assets/css/wf-plugin.css' ?>" rel="stylesheet">
    <link href="<?php echo $urlFrontEnd . 'assets/css/wf-theme.css' ?>" rel="stylesheet">
    <link href="<?php echo $mainUrl  . 'assets/css/wb-theme.css' ?>" rel="stylesheet">
    <?php
    if ($isAdmin) {
        echo '<meta name="robots" content="noindex">';
        echo '<link href="' . $mainUrl . 'assets/css/wb-admin.css" rel="stylesheet">';
        echo '<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>';
        echo '<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">';
    }
    ?>
</head>

<body class="overflow-hidden">