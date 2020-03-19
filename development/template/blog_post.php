{% include "include/head.php" %}
{% include "include/loading_main.php" %}
<main class="grid">
    {% include "include/template_header.php" %}
    <section id="main_menu" class="grid-menu">
        {% include "include/template_menu.php" %}
    </section>
    <section id="main_content" class="grid-content">
        <article class="row">
            <div class="col-es-12">
                <div class="container">
                    <h1 class="page-title">
                        <?php
                        $objWbBlog = new WbBlog();
                        $post = $objWbBlog->getPost();
                        echo utf8_encode($post['title_' .  $objWbTranslation->getLanguage()]);
                        ?>
                    </h1>
                </div>
            </div>
            <div class="col-es-12">
                <div class="container">
                    <?php
                    echo utf8_encode($post['content_' .  $objWbTranslation->getLanguage()]);
                    ?>
                </div>
            </div>
            <div class="col-es-12">
                <div class="container padding-bi">
                    tags:
                    <?php
                    echo $objWbBlog->buildBlogTag(utf8_encode($post['tag_' .  $objWbTranslation->getLanguage()]));
                    ?>
                </div>
            </div>
        </article>
    </section>
    {% include "include/template_footer.php" %}
</main>