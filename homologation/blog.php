<?php
$objWbBlogList = new WbBlogList();
$objWbBlogList->resetSession();
?>

<?php
echo $objWbHtml->buildHeader();
?>
<div id="loadingMain" class="bg-grey">
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
$objWbUrl = new WbUrl();
?>

<header id="header" class="grid-header">
    <div class="row">
        <div class="col-es-2 text-left">
            <a href="<?php echo $objWbUrl->getUrlPage(); ?>home/" class="bt bt-re bt-grey" aria-label="<?php echo $WbTranslation['home']; ?>">
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
                            <span class="about mobile-hide"><?php echo $WbTranslation['language']; ?>:</span>
                        </li>
                        <li>
                            <select id="translationSelect" aria-label="<?php echo $WbTranslation['language']; ?>">
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
    <section id="mainMenu" class="grid-menu">
        

<div class="row">
    <div class="col-es-12">
        <button type="button" class="bt bt-re bt-toggle bt-grey" aria-label="<?php echo $WbTranslation['menu']; ?>">
            <span class="fa fa-bars" aria-hidden="true"></span>
        </button>
        <nav class="menu menu-vertical text-center menu-drop-down">
            <ul>
                
                <li>
                    <a href="<?php echo $objWbUrl->getUrlPage(); ?>admin/" data-id="admin" class="bt bt-sm bt-fu bt-blue">
                        <?php echo $WbTranslation['administrativePanel']; ?>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objWbUrl->getUrlPage(); ?>blog/" data-id="blog" class="bt bt-sm bt-fu bt-blue">
                        <?php echo $WbTranslation['blog']; ?>
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</div>
    </section>
    <section id="mainContent" class="grid-content">
        <div id="pageBlog" class="row">
            <div class="col-es-12">
                <div class="container">
                    <div class="row">
                        <section class="col-es-12 col-bi-7 col-first" id="pageBlogLastPost">
                            <h1 class="page-title">
                                <?php echo $WbTranslation['lastPost']; ?>
                            </h1>
                            <div class="row blog-list">
                                <?php
                                $list = $objWbBlogList->getList('lastPost');
                                $json = json_decode($list, true);
                                echo $json['html'];
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-es-12">
                                    <?php
                                    echo $objWbBlogList->buildLoadMoreButton('lastPost');
                                    ?>
                                </div>
                            </div>
                        </section>
                        <section class="col-es-12 col-bi-5" id="pageBlogMostViewed">
                            <h1 class="page-title">
                                <?php echo $WbTranslation['mostViewed']; ?>
                            </h1>
                            <div class="row blog-list">
                                <?php
                                $list = $objWbBlogList->getList('mostViewed');
                                $json = json_decode($list, true);
                                echo $json['html'];
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-es-12">
                                    <?php
                                    echo $objWbBlogList->buildLoadMoreButton('mostViewed');
                                    ?>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer" class="grid-footer">
    <div class="row">
        <div class="col-es-12">
            <span class="about"><?php echo $WbTranslation['developedBy']; ?>:</span>
            <a href="https://www.jefersonwinter.com" target="_blank" rel="noopener" class="bt bt-sm bt-grey">
                Jeferson Winter
            </a>
        </div>
    </div>
</footer>
</main>