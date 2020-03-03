{% include "include/head.php" %}
{% include "include/loading_main.php" %}
<main class="grid">
    {% include "include/template_header.php" %}
    <section id="main_menu" class="grid-menu">
        {% include "include/template_menu.php" %}
    </section>
    <section id="main_content" class="grid-content">
        <div id="page_home" class="row">
            <div class="col-es-12">
                {% include "include/template_carousel.php" %}
            </div>
        </div>
    </section>
    {% include "include/template_footer.php" %}
</main>
{% include "include/analytics.php" %}
{% include "include/footer.php" %}