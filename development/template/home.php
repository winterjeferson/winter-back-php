{% include "include/head.php" %}
{% include "include/loading_main.php" %}
<main class="grid">
    {% include "include/template_header.php" %}
    <section id="mainMenu" class="grid-menu">
        {% include "include/template_menu.php" %}
    </section>
    <section id="mainContent" class="grid-content">
        <div id="pageHome" class="row">
            <div class="col-es-12">
                {% include "include/template_carousel.php" %}
            </div>
        </div>
    </section>
    {% include "include/template_footer.php" %}
</main>