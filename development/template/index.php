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

{% include "include/loading_main.php" %}
<header id="header">
    {% include "include/template_header.php" %}
</header>
<main>
    <div class="row" id="main_wrapper">
        <section id="main_menu" class="col-es-12 col-bi-2">
            {% include "include/template_menu.php" %}
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
    {% include "include/template_footer.php" %}
</footer>
{% include "include/analytics.php" %}
<?php
echo $objFrameworkHtml->buildFooter();
?>