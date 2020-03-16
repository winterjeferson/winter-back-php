{% include "include/head.php" %}
{% include "include/loading_main.php" %}
<main class="grid">
    {% include "include/template_header.php" %}
    <section id="main_menu" class="grid-menu">
        {% include "include/template_menu.php" %}
    </section>
    <section id="main_content" class="grid-content">
        <div id="page_blog" class="row">
            <div class="col-es-12">
                <div class="container">
                    <div class="row">
                        <div class="col-es-12 col-bi-7 col-first">
                            <h1 class="page-title">
                                <?php echo $WBPTranslation['last_post']; ?>
                            </h1>
                            <div class="row blog-list">
                                <?php
                                $objWBPBlog = new WBPBlog();
                                echo $objWBPBlog->buildBlogPost('lastPost');
                                ?>
                            </div>
                        </div>
                        <div class="col-es-12 col-bi-5">
                            <h1 class="page-title">
                                <?php echo $WBPTranslation['most_viewed']; ?>
                            </h1>
                            <div class="row blog-list">
                                <?php
                                $objWBPBlog = new WBPBlog();
                                echo $objWBPBlog->buildBlogPost('mostViewed');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {% include "include/template_footer.php" %}
</main>