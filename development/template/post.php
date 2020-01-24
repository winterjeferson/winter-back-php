{% include "include/head.php" %}
{% include "include/loading_main.php" %}
{% include "include/template_header.php" %}
<main class="row" id="main_wrapper">
    <section id="main_menu" class="col-es-12 col-bi-2">
        {% include "include/template_menu.php" %}
    </section>
    <section id="main_content" class="col-es-12 col-bi-10">
        <?php
        $objFrameworkBlog = new FrameworkBlog();
        $objFrameworkTemplate = new FrameworkTemplate();
        ?>
        <article class="row">
            <div class="col-es-12">
                <div class="container">
                    <h1 class="page-title">
                        <?php
                        echo $objFrameworkBlog->getPost('title');
                        ?>
                    </h1>
                </div>
            </div>
            <div class="col-es-12">
                <div class="container">
                    <?php
                    echo $objFrameworkBlog->getPost('content');
                    ?>
                </div>
            </div>
            <div class="col-es-12">
                <div class="container">
                    tags:
                    <?php
                    echo $objFrameworkTemplate->buildBlogTag($objFrameworkBlog->getPost('tag'));
                    ?>
                </div>
            </div>
        </article>
    </section>
</main>
{% include "include/template_footer.php" %}
{% include "include/analytics.php" %}
{% include "include/footer.php" %}