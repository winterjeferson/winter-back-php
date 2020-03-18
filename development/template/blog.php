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
                        <section class="col-es-12 col-bi-7 col-first" id="page_blog_last_post">
                            <h1 class="page-title">
                                <?php echo $WBTranslation['last_post']; ?>
                            </h1>
                            <div class="row blog-list">
                                <?php
                                $objWBBlog = new WBBlog();
                                echo $objWBBlog->buildBlogPost('lastPost');
                                ?>
                            </div>
                            <?php
                            echo $objWBBlog->buildLoadMoreButton('lastPost');
                            ?>
                        </section>
                        <section class="col-es-12 col-bi-5" id="page_blog_most_viewed">
                            <h1 class="page-title">
                                <?php echo $WBTranslation['most_viewed']; ?>
                            </h1>
                            <div class="row blog-list">
                                <?php
                                echo $objWBBlog->buildBlogPost('mostViewed');
                                ?>
                            </div>
                            <?php
                            echo $objWBBlog->buildLoadMoreButton('mostViewed');
                            ?>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {% include "include/template_footer.php" %}
</main>