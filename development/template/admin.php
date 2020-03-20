{% include "include/verify_login.php" %}
{% include "include/head.php" %}
{% include "include/loading_main.php" %}
<main class="grid">
    {% include "include/template_header.php" %}
    <section id="mainMenu" class="grid-menu">
        {% include "include/template_menu.php" %}
    </section>
    <section id="mainContent" class="grid-content">
        <div id="pageAdmin" class="row">
            <div class="col-es-12">
                {% include "include/template_menu_admin.php" %}
            </div>
            <div class="col-es-12">
                <div class="container">
                    <h1 class="page-title"><?php echo $WbTranslation['administrativePanel'] ?></h1>
                    <p class="text-center"><?php echo $WbTranslation['administrativePanelText'] ?></p>
                </div>
            </div>
        </div>
    </section>
    {% include "include/template_footer.php" %}
</main>