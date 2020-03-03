{% include "include/verify_login.php" %}
{% include "include/head.php" %}
{% include "include/loading_main.php" %}

<main class="grid">
    {% include "include/template_header.php" %}
    <section id="main_menu" class="grid-menu">
        {% include "include/template_menu_admin.php" %}
    </section>
    <section id="main_content" class="grid-content">
        <div id="page_admin" class="row">
            <div class="col-es-12">
                <h1 class="page-title">wellcome to admin</h1>
            </div>
        </div>
    </section>
    {% include "include/template_footer.php" %}
</main>
<link href="css/admin.css" rel="stylesheet">
<script src="js/admin.js"></script>
{% include "include/analytics.php" %}
{% include "include/footer.php" %}