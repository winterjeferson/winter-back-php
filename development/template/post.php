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