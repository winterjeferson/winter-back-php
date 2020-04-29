<?php
$objWbSession = new WbSession();
$objTheme = new Theme();
$objWbUrl = new WbUrl();

$page = $objWbUrl->getUrlParameters()['page'];
$isAdmin = strpos($page, 'admin') !== false ? true : false;
$lang = $objWbSession->getArray('translation', 'metaLang');
$title = isset($metaDataCustom['title']) ? $metaDataCustom['title'] : $objWbSession->getArray('translation', 'metaTitle');
$author = isset($metaDataCustom['author']) ? $metaDataCustom['author'] : $objWbSession->getArray('translation', 'metaAuthor');
$description = isset($metaDataCustom['description']) ? $metaDataCustom['description'] : $objWbSession->getArray('translation', 'metaDescription');
$keywords = isset($metaDataCustom['keywords']) ? $metaDataCustom['keywords'] : $objWbSession->getArray('translation', 'metaKeywords');
$mainUrl =  $objWbUrl->getUrlMain();;
$urlFrontEnd = 'https://winterjeferson.github.io/winter-front/production/';
$assets = '';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">

<head>
    <?php
    if ($isAdmin) {
        echo '<meta name="robots" content="noindex">';
    }
    ?>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=yes" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=5,user-scalable=yes,width=device-width">
    <base href="<?php echo $mainUrl ?>">

    <meta name="theme-color" content="#000000" />
    <meta name="msapplication-TileColor" content="#000000" />

    <link rel="shortcut icon" href="<?php echo $mainUrl . $assets . 'img/logo/16-16.png' ?>" />

    <link rel="apple-touch-icon" href="<?php echo $mainUrl . $assets . 'img/logo/57-57.png' ?>" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $mainUrl . $assets . 'img/logo/72-72.png' ?>" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $mainUrl . $assets . 'img/logo/114-114.png' ?>" />

    <meta name="msapplication-TileImage" content="<?php echo $mainUrl . $assets . 'img/logo/144-144.png' ?>" />

    <meta name="application-name" content="<?php echo $title ?>" />
    <title><?php echo $title ?></title>
    <meta name="description" content="<?php echo $description ?>" />
    <meta name="author" content="<?php echo $author ?>" />
    <meta name="keywords" content="<?php echo $keywords ?>" />


    <meta property="og:image" content="<?php echo $mainUrl . $assets . 'img/logo/600-315.png' ?>" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:locale" content="<?php echo $lang ?>" />
    <meta property="og:url" content="<?php echo $mainUrl ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $title ?>" />
    <meta property="og:site_name" content="<?php echo $title ?>" />
    <meta property="og:description" content="<?php echo $description ?>" />

    <link href="<?php echo $urlFrontEnd . 'css/wf-plugin.css' ?>" rel="stylesheet">
    <link href="<?php echo $urlFrontEnd . 'css/wf-theme.css' ?>" rel="stylesheet">
    <link href="<?php echo $mainUrl . $assets . 'css/wb-theme.css' ?>" rel="stylesheet">
    <?php
    if ($isAdmin) {
        echo '<link href="' . $mainUrl . $assets . 'css/wb-admin.css" rel="stylesheet">';
    }
    ?>
</head>

<body class="overflow-hidden">