<?php
$objWbBlogList = new WbBlogList();
$objWbBlogList->resetSession();
?>

{% include "include/head.php" %}
{% include "include/loading_main.php" %}
<main class="grid">
    {% include "include/template_header.php" %}
    <section id="mainMenu" class="grid-menu">
        {% include "include/template_menu.php" %}
    </section>
    <section id="mainContent" class="grid-content">
        <div id="pageBlog" class="row">
            <div class="col-es-12">
                <div class="container">
                    <div class="row">
                        <section class="col-es-12 col-bi-7 col-first" id="pageBlogLastPost">
                            <h1 class="page-title">
                                <?php echo $WbTranslation['lastPost']; ?>
                            </h1>
                            <div class="row blog-list">
                                <?php
                                $list = $objWbBlogList->getList('lastPost');
                                $json = json_decode($list, true);
                                echo $json['html'];
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-es-12">
                                    <?php
                                    echo $objWbBlogList->buildLoadMoreButton('lastPost');
                                    ?>
                                </div>
                            </div>
                        </section>
                        <section class="col-es-12 col-bi-5" id="pageBlogMostViewed">
                            <h1 class="page-title">
                                <?php echo $WbTranslation['mostViewed']; ?>
                            </h1>
                            <div class="row blog-list">
                                <?php
                                $list = $objWbBlogList->getList('mostViewed');
                                $json = json_decode($list, true);
                                echo $json['html'];
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-es-12">
                                    <?php
                                    echo $objWbBlogList->buildLoadMoreButton('mostViewed');
                                    ?>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {% include "include/template_footer.php" %}
</main>