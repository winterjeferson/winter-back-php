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
                <div class="container">
                    <h1 class="page-title">
                        <?php echo $frameworkTranslation['template']['blog']; ?>
                    </h1>
                    <nav class="menu menu-vertical">
                        <ul>
                            <?php
                            $objFrameworkTranslation = new FrameworkTranslation();
                            $objFrameworkBlog = new FrameworkBlog();
                            $query = $objFrameworkBlog->getPostList();
                            $string = '';

                            foreach ($query as $key => $value) {
                                $string .= '<li>';
                                $string .= '    <a href="' . $objFrameworkTranslation->getLanguage() . '/blog-post/' . $value['id'] . '/' . $value['url'] . '/" class="link link-blue">';
                                $string .= $value['title'];
                                $string .= '    </a>';
                                $string .= '</li>';
                            }

                            echo $string;
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    {% include "include/template_footer.php" %}
</main>
{% include "include/analytics.php" %}
{% include "include/footer.php" %}