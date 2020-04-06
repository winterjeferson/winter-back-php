<?php
$objWbBlogPost = new WbBlogPost();
$objWbSession = new WbSession();
$objWbHelp = new WbHelp();

$post = $objWbBlogPost->getPost();
$postTitle = $objWbHelp->encode($post['title_' .  $objWbTranslation->getLanguage()]);
$postContent = $objWbHelp->encode($post['content_' .  $objWbTranslation->getLanguage()]);
$postTag = $objWbBlogPost->buildTag($objWbHelp->encode($post['tag_' .  $objWbTranslation->getLanguage()]));

$metaDataCustom = [
    'title' => $objWbSession->getArray('translation', 'metaTitle') . ': ' . $objWbSession->getArray('translation', 'blog') . ' - ' . $postTitle
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
        <article class="row">
            <div class="col-es-12">
                <div class="container">
                    <h1 class="page-title">
                        <?php
                        echo $postTitle;
                        ?>
                    </h1>
                </div>
            </div>
            <div class="col-es-12">
                <div class="container">
                    <?php
                    echo $postContent;
                    ?>
                </div>
            </div>
            <div class="col-es-12">
                <div class="container padding-bi">
                    tags:
                    <?php
                    echo $postTag;
                    ?>
                </div>
            </div>
        </article>
    </section>
    {% include "include/template-footer.php" %}
</main>