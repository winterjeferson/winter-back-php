{% include "include/head.php" %}
{% include "include/loading_main.php" %}
{% include "include/template_header.php" %}
<main class="row" id="main_wrapper">
    <?php
    $objFrameworkLogin = new FrameworkLogin();
    echo $objFrameworkLogin->verifyLogin();
    ?>
    <section id="main_menu" class="col-es-12 col-bi-2">
        {% include "include/template_menu.php" %}
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
{% include "include/template_footer.php" %}
{% include "include/analytics.php" %}
{% include "include/footer.php" %}