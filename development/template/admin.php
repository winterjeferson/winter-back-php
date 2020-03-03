{% include "include/head.php" %}
{% include "include/loading_main.php" %}

<?php
$objFrameworkLogin = new FrameworkLogin();
echo $objFrameworkLogin->verifyLogin();
?>

<main class="grid">
    {% include "include/template_header.php" %}
    <section id="main_menu" class="grid-menu">
        {% include "include/template_menu_admin.php" %}
    </section>
    <section id="main_content" class="grid-content">
        <div id="page_home" class="row">
            <div class="col-es-12">
                <h1 class="page-title">wellcome to admin<h1>
            </div>
        </div>
    </section>
    {% include "include/template_footer.php" %}
</main>
{% include "include/analytics.php" %}
{% include "include/footer.php" %}