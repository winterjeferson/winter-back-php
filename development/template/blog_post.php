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
        ?>
        <article class="row">
            <div class="col-es-12">
                <div class="container">
                    <h1 class="page-title">
                        <?php
                        echo $objWBPBlog->getPost('title_' . $objWBPTranslation->getLanguage());
                        ?>
                    </h1>
                </div>
            </div>
            <div class="col-es-12">
                <div class="container">
                    <?php
                    echo $objWBPBlog->getPost('content_' . $objWBPTranslation->getLanguage());
                    ?>
                </div>
            </div>
            <div class="col-es-12">
                <div class="container padding-bi">
                    tags:
                    <?php
                    echo $objWBPBlog->buildBlogTag($objWBPBlog->getPost('tag_' . $objWBPTranslation->getLanguage()));
                    ?>
                </div>
            </div>
        </article>
    </section>
    {% include "include/template_footer.php" %}
</main>