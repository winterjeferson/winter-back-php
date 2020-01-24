<?php
$parentFolder = '';

include $parentFolder . 'php/autoload.php';

$objFrameworkTranslation = new FrameworkTranslation();
$objFrameworkLayout = new FrameworkLayout();
$objFrameworkHtml = new FrameworkHtml();

$frameworkTranslation = $objFrameworkTranslation->translateContent();
echo $objFrameworkHtml->buildHeader();
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
<?php
$objFrameworkUrl = new FrameworkUrl();
?>

<header id="header">
    <div class="row">
        <div class="col-es-12 col-sm-2 text-left mobile-hide">
            <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>home/" class="bt bt-re bt-grey" aria-label="<?php echo $frameworkTranslation['template']['home']; ?>">
                <span class="fa fa-home" aria-hidden="true"></span>
            </a>
        </div>
        <div class="col-es-12 col-sm-10 text-right">
            <form class="form form-grey">
                <nav class="menu menu-horizontal">
                    <ul>
                        <li>
                            <span class="about mobile-hide">v: 12.0.0</span>
                        </li>
                        <li>
                            <select id="page_language_select" aria-label="<?php echo $frameworkTranslation['template']['language']; ?>">
                                <option value=""><?php echo $frameworkTranslation['template']['language']; ?></option>
                                <option value="en">English</option>
                                <option value="pt">Português</option>
                            </select>
                        </li>
                        <li>
                            <a href="https://github.com/winterjeferson/winterstrap" target="_blank" rel="noopener" class="bt bt-re bt-green">
                                Download (Github)
                            </a>
                        </li>
                    </ul>
                </nav>
            </form>
        </div>
    </div>
</header>
<main class="row" id="main_wrapper">
    <?php
    $objFrameworkLogin = new FrameworkLogin();
    echo $objFrameworkLogin->verifyLogin();
    ?>
    <section id="main_menu" class="col-es-12 col-bi-2">
        

<div class="row">
    <div class="col-es-12">
        <button type="button" class="bt bt-re bt-toggle bt-grey" aria-label="<?php echo $frameworkTranslation['default']['menu']; ?>">
            <span class="fa fa-bars" aria-hidden="true"></span>
        </button>
        <nav class="menu menu-vertical text-center menu-drop-down">
            <ul>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>panel/" data-id="panel" class="bt bt-sm bt-fu bt-blue">
                        panel
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>blog/" data-id="blog" class="bt bt-sm bt-fu bt-blue">
                        blog
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</div>
    </section>
    <section id="main_content" class="col-es-12 col-bi-10">
        <div class="row" id="admin">
            <div class="col-es-12">
                <div class="container padding-bi">
                    <nav class="menu-tab menu-tab-blue text-center menu menu-horizontal menu-drop-down" data-id="menu_main">
                        <ul>
                            <li>
                                <button type="button" class="menu-tab-bt bt-re bt" data-id="bt_blog">Blog</button>
                            </li>
                            <li>
                                <button type="button" class="menu-tab-bt bt-re bt" data-id="bt_logout">Logout</button>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-es-12">
                <div class="padding-bi">
                    <?php
                    $consult = $objFrameworkLayout->buildPage('blog');
                    include $consult;
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>
<footer id="footer">
    <div class="row">
        <div class="col-es-12">
            <span class="about">By:</span>
            <a href="https://www.jefersonwinter.com" target="_blank" rel="noopener" class="bt bt-sm bt-grey">
                Jeferson Winter
            </a>
        </div>
    </div>
</footer>
<!--PLACE YOUR GOOGLE ANALYTICS CODE HERE-->
<?php
echo $objFrameworkHtml->buildFooter();
?>