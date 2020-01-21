<?php
//
//EDIT META TAGS AT JSON FILE
//

$isAdmin = false;
$parentFolder = '';

if (!file_exists('php/autoload.php')) {
    $isAdmin = true;
    $parentFolder = '../';
}

include $parentFolder . 'php/autoload.php';

$objFrameworkTranslation = new FrameworkTranslation();
$objFrameworkLayout = new FrameworkLayout();
$objFrameworkHtml = new FrameworkHtml();
$objFrameworkUrl = new FrameworkUrl();

$frameworkTranslation = $objFrameworkTranslation->translateContent();
echo $objFrameworkHtml->buildHeader($isAdmin);
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
<main>
    <div class="row" id="main_wrapper">
        <section id="main_menu" class="col-es-12 col-bi-2">
            

<div class="row">
    <div class="col-es-12">
        <button type="button" class="bt bt-re bt-toggle bt-grey" aria-label="<?php echo $frameworkTranslation['default']['menu']; ?>">
            <span class="fa fa-bars" aria-hidden="true"></span>
        </button>
        <nav class="menu menu-vertical text-center menu-drop-down">
            <ul>
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>admin/" class="bt bt-sm bt-fu bt-blue" target="_blank">
                        Admin
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>blog/" data-id="blog" class="bt bt-sm bt-fu bt-blue">
                        blog
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>button/" data-id="button" class="bt bt-sm bt-fu bt-blue">
                        button
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>card/" data-id="card" class="bt bt-sm bt-fu bt-blue">
                        card
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>carousel/" data-id="carousel" class="bt bt-sm bt-fu bt-blue">
                        carousel
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>form/" data-id="form" class="bt bt-sm bt-fu bt-blue">
                        form
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>gallery/" data-id="gallery" class="bt bt-sm bt-fu bt-blue">
                        gallery
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>icon/" data-id="icon" class="bt bt-sm bt-fu bt-blue">
                        icon
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>loading/" data-id="loading" class="bt bt-sm bt-fu bt-blue">
                        loading
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>menu/" data-id="menu" class="bt bt-sm bt-fu bt-blue">
                        menu
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>modal/" data-id="modal" class="bt bt-sm bt-fu bt-blue">
                        modal
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>notification/" data-id="notification" class="bt bt-sm bt-fu bt-blue">
                        notification
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>palette/" data-id="palette" class="bt bt-sm bt-fu bt-blue">
                        palette
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>progress/" data-id="progress" class="bt bt-sm bt-fu bt-blue">
                        progress
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>responsive/" data-id="responsive" class="bt bt-sm bt-fu bt-blue">
                        responsive
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>scroll/" data-id="scroll" class="bt bt-sm bt-fu bt-blue">
                        scroll
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>table/" data-id="table" class="bt bt-sm bt-fu bt-blue">
                        table
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>tag/" data-id="tag" class="bt bt-sm bt-fu bt-blue">
                        tag
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>text/" data-id="text" class="bt bt-sm bt-fu bt-blue">
                        text
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>tooltip/" data-id="tooltip" class="bt bt-sm bt-fu bt-blue">
                        tooltip
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</div>
        </section>
        <section id="main_content" class="col-es-12 col-bi-10">
            <?php
            $consult = $objFrameworkLayout->buildPage();
            include $consult;
            ?>    
        </section>
    </div>
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