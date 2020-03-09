{% include "include/head.php" %}
{% include "include/loading_main.php" %}

<main class="grid">
    {% include "include/template_header.php" %}
    <section id="main_menu" class="grid-menu">
        {% include "include/template_menu.php" %}
    </section>
    <section id="main_content" class="grid-content">
        <?php
        $objWBPBlog = new WBPBlog();
        $objWBPTemplate = new WBPTemplate();
        ?>
        <article class="row">
            <div class="col-es-12">
                <div class="container">
                    <h1 class="page-title">
                        <?php
                        echo $objWBPBlog->getPost('title');
                        ?>
                    </h1>
                </div>
            </div>
            <div class="col-es-12">
                <div class="container">
                    <?php
                    echo $objWBPBlog->getPost('content');
                    ?>
                </div>
            </div>
            <div class="col-es-12">
                <div class="container">
                    tags:
                    <?php
                    echo $objWBPTemplate->buildBlogTag($objWBPBlog->getPost('tag'));
                    ?>
                </div>
            </div>
        </article>
    </section>
    {% include "include/template_footer.php" %}
</main>
{% include "include/analytics.php" %}
{% include "include/footer.php" %}