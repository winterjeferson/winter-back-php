<?php
echo $objWBHtml->buildHeader();
?>
<div id="loading_main" class="bg-grey">
    <div class="col-middle">
        <div class="row">
            <div class="col-es-2 col-es-off-5">
                <div class="progress progress-style-red progress-es">
                    <div class="progress-bar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="grid">
    <?php
$objWBUrl = new WBUrl();
?>

<header id="header" class="grid-header">
    <div class="row">
        <div class="col-es-2 text-left">
            <a href="<?php echo $objWBUrl->getUrlPage(); ?>home/" class="bt bt-re bt-grey" aria-label="<?php echo $WBTranslation['home']; ?>">
                <span class="fa fa-home" aria-hidden="true"></span>
            </a>
        </div>
        <div class="col-es-10 text-right">
            <form class="form form-grey">
                <nav class="menu menu-horizontal">
                    <ul>
                        <li>
                            <span class="about mobile-hide">v: 1.0.0</span>
                        </li>
                        <li>
                            |
                        </li>
                        <li>
                            <span class="about mobile-hide"><?php echo $WBTranslation['language']; ?>:</span>
                        </li>
                        <li>
                            <select id="translation_select" aria-label="<?php echo $WBTranslation['language']; ?>">
                                <option value="en">English</option>
                                <option value="pt">Português</option>
                            </select>
                        </li>
                        <li>
                            <a href="https://github.com/winterjeferson/winter-back-php" target="_blank" rel="noopener" class="bt bt-re bt-green">
                                Download (Github)
                            </a>
                        </li>
                    </ul>
                </nav>
            </form>
        </div>
    </div>
</header>
    <section id="main_menu" class="grid-menu">
        

<div class="row">
    <div class="col-es-12">
        <button type="button" class="bt bt-re bt-toggle bt-grey" aria-label="<?php echo $WBTranslation['menu']; ?>">
            <span class="fa fa-bars" aria-hidden="true"></span>
        </button>
        <nav class="menu menu-vertical text-center menu-drop-down">
            <ul>
                
                <li>
                    <a href="<?php echo $objWBUrl->getUrlPage(); ?>admin/" data-id="admin" class="bt bt-sm bt-fu bt-blue">
                        <?php echo $WBTranslation['administrative_panel']; ?>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objWBUrl->getUrlPage(); ?>blog/" data-id="blog" class="bt bt-sm bt-fu bt-blue">
                        <?php echo $WBTranslation['blog']; ?>
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</div>
    </section>
    <section id="main_content" class="grid-content">
        <article class="row">
            <div class="col-es-12">
                <div class="container">
                    <h1 class="page-title">
                        <?php
                        $objWBBlog = new WBBlog();
                        $post = $objWBBlog->getPost();
                        echo utf8_encode($post['title_' .  $objWBTranslation->getLanguage()]);
                        ?>
                    </h1>
                </div>
            </div>
            <div class="col-es-12">
                <div class="container">
                    <?php
                    echo utf8_encode($post['content_' .  $objWBTranslation->getLanguage()]);
                    ?>
                </div>
            </div>
            <div class="col-es-12">
                <div class="container padding-bi">
                    tags:
                    <?php
                    echo $objWBBlog->buildBlogTag(utf8_encode($post['tag_' .  $objWBTranslation->getLanguage()]));
                    ?>
                </div>
            </div>
        </article>
    </section>
    <footer id="footer" class="grid-footer">
    <div class="row">
        <div class="col-es-12">
            <span class="about"><?php echo $WBTranslation['developed_by']; ?>:</span>
            <a href="https://www.jefersonwinter.com" target="_blank" rel="noopener" class="bt bt-sm bt-grey">
                Jeferson Winter
            </a>
        </div>
    </div>
</footer>
</main>