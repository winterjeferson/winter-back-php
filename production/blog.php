<?php
$objWbSession = new WbSession();
$objWbBlogList = new WbBlogList();

$objWbBlogList->resetSession();
$metaDataCustom = [
    'title' => $objWbSession->getArray('translation', 'metaTitle') . ': ' . $objWbSession->getArray('translation', 'blog'),
    'keywords' => $objWbSession->getArray('translation', 'metaKeywords'),
    'description' => $objWbSession->getArray('translation', 'metaDescription'),
];
?> <?php
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
?> <!DOCTYPE html><html lang="<?php echo $lang ?>"><head> <?php
    if ($isAdmin) {
        echo '<meta name="robots" content="noindex">';
    }
    ?> <meta http-equiv="content-type" content="text/html; charset=utf-8"><meta name="format-detection" content="telephone=yes"><meta name="msapplication-tap-highlight" content="no"><meta name="viewport" content="initial-scale=1,maximum-scale=5,user-scalable=yes,width=device-width"><base href="<?php echo $mainUrl ?>"><meta name="theme-color" content="#000000"><meta name="msapplication-TileColor" content="#000000"><link rel="shortcut icon" href="<?php echo $mainUrl . $assets . 'img/logo/16-16.png' ?>"><link rel="apple-touch-icon" href="<?php echo $mainUrl . $assets . 'img/logo/57-57.png' ?>"><link rel="apple-touch-icon" sizes="72x72" href="<?php echo $mainUrl . $assets . 'img/logo/72-72.png' ?>"><link rel="apple-touch-icon" sizes="114x114" href="<?php echo $mainUrl . $assets . 'img/logo/114-114.png' ?>"><meta name="msapplication-TileImage" content="<?php echo $mainUrl . $assets . 'img/logo/144-144.png' ?>"><meta name="application-name" content="<?php echo $title ?>"><title><?php echo $title ?></title><meta name="description" content="<?php echo $description ?>"><meta name="author" content="<?php echo $author ?>"><meta name="keywords" content="<?php echo $keywords ?>"><meta property="og:image" content="<?php echo $mainUrl . $assets . 'img/logo/600-315.png' ?>"><meta property="og:image:type" content="image/png"><meta property="og:image:width" content="600"><meta property="og:image:height" content="315"><meta property="og:locale" content="<?php echo $lang ?>"><meta property="og:url" content="<?php echo $mainUrl ?>"><meta property="og:type" content="website"><meta property="og:title" content="<?php echo $title ?>"><meta property="og:site_name" content="<?php echo $title ?>"><meta property="og:description" content="<?php echo $description ?>"><link href="<?php echo $urlFrontEnd . 'css/wf-plugin.css' ?>" rel="stylesheet"><link href="<?php echo $urlFrontEnd . 'css/wf-theme.css' ?>" rel="stylesheet"><link href="<?php echo $mainUrl . $assets . 'css/wb-theme.css' ?>" rel="stylesheet"> <?php
    if ($isAdmin) {
        echo '<link href="' . $mainUrl . $assets . 'css/wb-admin.css" rel="stylesheet">';
    }
    ?> </head><body class="overflow-hidden"><div id="loadingMain" class="bg-grey"><div class="col-middle"><div class="row"><div class="col-es-2 col-es-off-5"><div class="progress progress-style-red progress-es"><div class="progress-bar"></div></div></div></div></div></div><main class="grid"> <?php
$objWbUrl = new WbUrl();
?> <header id="header" class="grid-header"><div class="row"><div class="col-es-2 text-left"><a href="<?php echo $objWbUrl->getUrlPage(); ?>home/" class="bt bt-re bt-grey" aria-label="<?php echo $WbTranslation['home']; ?>"><span aria-hidden="true">&#127968;</span></a></div><div class="col-es-10 text-right"><form class="form form-grey"><nav class="menu menu-horizontal"><ul><li><span class="about mobile-hide">v: 1.0.0</span></li><li>|</li><li><span class="about mobile-hide"><?php echo $WbTranslation['language']; ?>:</span></li><li><select id="translationSelect" aria-label="<?php echo $WbTranslation['language']; ?>"><option value="en">English</option><option value="pt">Português</option></select></li><li><a href="https://github.com/winterjeferson/winter-back-php" target="_blank" rel="noopener" class="bt bt-re bt-green">Download (Github)</a></li></ul></nav></form></div></div></header><section id="mainMenu" class="grid-menu"><div class="row"><div class="col-es-12"><button type="button" class="bt bt-re bt-toggle bt-grey" aria-label="<?php echo $WbTranslation['menu']; ?>"><span class="fa fa-bars" aria-hidden="true"></span></button><nav class="menu menu-vertical text-center menu-drop-down"><ul><li><a href="<?php echo $objWbUrl->getUrlPage(); ?>admin/" data-id="admin" class="bt bt-sm bt-fu bt-blue"> <?php echo $WbTranslation['administrativePanel']; ?> </a></li><li><a href="<?php echo $objWbUrl->getUrlPage(); ?>blog/" data-id="blog" class="bt bt-sm bt-fu bt-blue"> <?php echo $WbTranslation['blog']; ?> </a></li><li><a href="<?php echo $objWbUrl->getUrlPage(); ?>form/" data-id="form" class="bt bt-sm bt-fu bt-blue"> <?php echo $WbTranslation['form']; ?> </a></li></ul></nav></div></div></section><section id="mainContent" class="grid-content"><div id="pageBlog" class="row"><div class="col-es-12"><div class="container"><div class="row"><section class="col-es-12 col-bi-7 col-first" id="pageBlogLastPost"><h1 class="page-title"> <?php echo $WbTranslation['lastPost']; ?> </h1><div class="row blog-list"> <?php
                                $list = $objWbBlogList->getList('lastPost');
                                $json = json_decode($list, true);
                                echo $json['html'];
                                ?> </div><div class="row"><div class="col-es-12"> <?php
                                    echo $objWbBlogList->buildLoadMoreButton('lastPost');
                                    ?> </div></div></section><section class="col-es-12 col-bi-5" id="pageBlogMostViewed"><h1 class="page-title"> <?php echo $WbTranslation['mostViewed']; ?> </h1><div class="row blog-list"> <?php
                                $list = $objWbBlogList->getList('mostViewed');
                                $json = json_decode($list, true);
                                echo $json['html'];
                                ?> </div><div class="row"><div class="col-es-12"> <?php
                                    echo $objWbBlogList->buildLoadMoreButton('mostViewed');
                                    ?> </div></div></section></div></div></div></div></section><footer id="footer" class="grid-footer"><div class="row"><div class="col-es-12"><span class="about"><?php echo $WbTranslation['developedBy']; ?>:</span> <a href="https://www.jefersonwinter.com.br" target="_blank" rel="noopener" class="bt bt-sm bt-grey">Jeferson Winter</a></div></div></footer></main></body></html>