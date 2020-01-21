<?php
include '../php/autoload.php';

$objFrameworkLayout = new FrameworkLayout();
$objFrameworkLogin = new FrameworkLogin();
$objFrameworkHtml = new FrameworkHtml();

echo $objFrameworkLogin->verifyLogin();
echo $objFrameworkHtml->buildHeader(true);
?>

{% include "include/loading_main.php" %}
<main>
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
</main>
<?php
echo $objFrameworkHtml->buildFooter();
