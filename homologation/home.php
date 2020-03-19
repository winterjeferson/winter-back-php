<?php
echo $objWbHtml->buildHeader();
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
                            <select id="translation_select" aria-label="<?php echo $WbTranslation['language']; ?>">
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
        <button type="button" class="bt bt-re bt-toggle bt-grey" aria-label="<?php echo $WbTranslation['menu']; ?>">
            <span class="fa fa-bars" aria-hidden="true"></span>
        </button>
        <nav class="menu menu-vertical text-center menu-drop-down">
            <ul>
                
                <li>
                    <a href="<?php echo $objWbUrl->getUrlPage(); ?>admin/" data-id="admin" class="bt bt-sm bt-fu bt-blue">
                        <?php echo $WbTranslation['administrative_panel']; ?>
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
    <section id="main_content" class="grid-content">
        <div id="page_home" class="row">
            <div class="col-es-12">
                <div class="carousel" data-current-slide="0">
    <div class="row carousel-slide">
        <div class="col-es-12">
            <ul class="carousel-list">
                
                
                <li>
                    <div class="slide bg-cyan">
                        <div class="col-middle slide-content">
                            <?php echo $WbTranslation['page_initial_language']; ?>
                        </div>
                    </div>
                </li>
                
                <li>
                    <div class="slide bg-orange">
                        <div class="col-middle slide-content">
                            <?php echo $WbTranslation['blog']; ?>
                        </div>
                    </div>
                </li>
                
                <li>
                    <div class="slide bg-red">
                        <div class="col-middle slide-content">
                            <?php echo $WbTranslation['friendly_url']; ?>
                        </div>
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
    <div class="menu-horizontal carousel-disabled">
        <ul class="navigation-arrow">
            <li>
                <button type="button" class="bt bt-big" data-id="nav-left" aria-label="<?php echo $WbTranslation['previous']; ?>">
                    <span class="fa fa-angle-left fa-4x" aria-hidden="true"></span>
                </button>
            </li>
            <li>
                <button type="button" class="bt bt-big" data-id="nav-right" aria-label="<?php echo $WbTranslation['next']; ?>">
                    <span class="fa fa-angle-right fa-4x" aria-hidden="true"></span>
                </button>
            </li>
        </ul>
    </div>
    <div class="menu-horizontal text-center carousel-controller-over">
        <ul class="carousel-controller carousel-controller-white">
        </ul>
    </div>
</div>
            </div>
        </div>
    </section>
    <footer id="footer" class="grid-footer">
    <div class="row">
        <div class="col-es-12">
            <span class="about"><?php echo $WbTranslation['developed_by']; ?>:</span>
            <a href="https://www.jefersonwinter.com" target="_blank" rel="noopener" class="bt bt-sm bt-grey">
                Jeferson Winter
            </a>
        </div>
    </div>
</footer>
</main>