<?php
$objWbSession = new WbSession();
$objWbBlogList = new WbBlogList();
$objWbBlogTag = new WbBlogTag();
$objWbBlogSearch = new WbBlogSearch();

$objWbBlogList->resetSession();
$metaDataCustom = [
    'title' => $objWbSession->getArray('translation', 'metaTitle') . ': ' . $objWbSession->getArray('translation', 'blog'),
    'keywords' => $objWbSession->getArray('translation', 'metaKeywords'),
    'description' => $objWbSession->getArray('translation', 'metaDescription'),
];
?>

{% include "include/head.php" %}
{% include "include/loading-main.php" %}
<main class="grid">
    {% include "include/template-header.php" %}
    <section id="mainMenu" class="grid-menu">
        {% include "include/template-menu.php" %}
    </section>
    <section id="mainContent" class="grid-content">
        <div id="pageBlog" class="row">
            <div class="col-es-12">
                <div class="container">
                    <div class="row">
                        <section class="col-es-12 col-bi-7 col-first" id="pageBlogLastPost">
                            <h1 class="page-title">
                                <?php echo $WbTranslation['searchResult']; ?>
                            </h1>
                            <div class="row blog-list">
                                <?php
                                echo $list = $objWbBlogSearch->search();
                                ?>
                            </div>
                        </section>
                        <section class="col-es-12 col-bi-5" id="pageBlogMostViewed">
                            <div id="pageBlogMostViewed">
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
                            </div>
                            <div id="pageBlogTag">
                                <h1 class="page-title">
                                    <?php echo $WbTranslation['tags']; ?>
                                </h1>
                                <ul class="tag-list">
                                    <?php
                                    echo $objWbBlogTag->getList();
                                    ?>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {% include "include/template-footer.php" %}
</main>