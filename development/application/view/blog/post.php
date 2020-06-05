<?php
// $objWbBlogPost = new WbBlogPost();
// $objWbSession = new WbSession();
// $objWbHelp = new WbHelp();

// $post = $objWbBlogPost->getPost();
// $postTitle = $objWbHelp->encode($post['title_' .  $objWbTranslation->getLanguage()]);
// $postContent = $objWbHelp->encode($post['content_' .  $objWbTranslation->getLanguage()]);
// $postTag = $objWbBlogPost->buildTag($objWbHelp->encode($post['tag_' .  $objWbTranslation->getLanguage()]));

// $metaDataCustom = [
//     'title' => $objWbSession->getArray('translation', 'metaTitle') . ': ' . $objWbSession->getArray('translation', 'blog') . ' - ' . $postTitle
// ];
?>

<article class="row">
    <div class="col-es-12">
        <div class="container">
            <h1 class="page-title">
                post
                <?php
                // echo $postTitle;
                ?>
            </h1>
        </div>
    </div>
    <div class="col-es-12">
        <div class="container">
            <?php
            // echo $postContent;
            ?>
        </div>
    </div>
    <?php
    // if (!is_null($postTag)) {
    //     $string = '<div class="col-es-12">';
    //     $string .= '     <div class="container padding-bi">';
    //     $string .= '     tags: ';
    //     $string .= $postTag;
    //     $string .= '     </div>';
    //     $string .= '</div>';

    //     echo $string;
    // }
    ?>
</article>