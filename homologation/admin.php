<?php
$objWBPLogin = new WBPLogin();
$objWBPLogin->verifyLogin();
?>
<?php
$parentFolder = '';

include $parentFolder . 'php/autoload.php';

$objWBPTranslation = new WBPTranslation();
$objWBPLayout = new WBPLayout();
$objWBPHtml = new WBPHtml();

$WBPTranslation = $objWBPTranslation->translateContent();
echo $objWBPHtml->buildHeader();
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
$objWBPUrl = new WBPUrl();
?>

<header id="header" class="grid-header">
    <div class="row">
        <div class="col-es-2 text-left">
            <a href="<?php echo $objWBPUrl->getUrlPage(); ?>home/" class="bt bt-re bt-grey" aria-label="<?php echo $WBPTranslation['template']['home']; ?>">
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
                            <select id="page_language_select" aria-label="<?php echo $WBPTranslation['template']['language']; ?>">
                                <option value=""><?php echo $WBPTranslation['template']['language']; ?></option>
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
        <button type="button" class="bt bt-re bt-toggle bt-grey" aria-label="<?php echo $WBPTranslation['default']['menu']; ?>">
            <span class="fa fa-bars" aria-hidden="true"></span>
        </button>
        <nav class="menu menu-vertical text-center menu-drop-down">
            <ul>
                
                <li>
                    <a href="<?php echo $objWBPUrl->getUrlPage(); ?>admin/" data-id="admin" class="bt bt-sm bt-fu bt-blue">
                        admin
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objWBPUrl->getUrlPage(); ?>blog/" data-id="blog" class="bt bt-sm bt-fu bt-blue">
                        blog
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</div>
    </section>
    <section id="main_content" class="grid-content">
        <div id="page_admin" class="row">
            <div class="col-es-12">
                

<div class="padding-re">
    <nav class="menu-tab menu-tab-blue text-center menu menu-horizontal menu-drop-down">
        <ul>
            
            <li>
                <a href="<?php echo $objWBPUrl->getUrlPage(); ?>admin-blog/" data-id="admin-blog" class="menu-tab-bt bt-re bt">
                    admin-blog
                </a>
            </li>
            
            <li>
                <a href="<?php echo $objWBPUrl->getUrlPage(); ?>admin-logout/" data-id="admin-logout" class="menu-tab-bt bt-re bt">
                    admin-logout
                </a>
            </li>
            
        </ul>
    </nav>
</div>
            </div>
            <div class="col-es-12">
                <h1 class="page-title">wellcome to admin</h1>
            </div>
        </div>
    </section>
    <footer id="footer" class="grid-footer">
    <div class="row">
        <div class="col-es-12">
            <span class="about">By:</span>
            <a href="https://www.jefersonwinter.com" target="_blank" rel="noopener" class="bt bt-sm bt-grey">
                Jeferson Winter
            </a>
        </div>
    </div>
</footer>
</main>
<!--PLACE YOUR GOOGLE ANALYTICS CODE HERE-->
<?php
echo $objWBPHtml->buildFooter();
?>