<div class="container">
    <div class="row">
        <section class="col-es-12 col-bi-7 col-first" id="pageBlogLastPost">
            <h1 class="page-title">
                <?php echo $arrContent['head']['translation']['lastPost']; ?>
            </h1>
            <div class="row blog-list">
                <?php
                if ($arrContent['blog']['listLasPost'] === '') {
                    echo '<p class="empty-list">' . $arrContent['head']['translation']['emptyList'] . '</p>';
                } else {
                    echo $arrContent['blog']['listLasPost'];
                }
                ?>
            </div>
            <div class="row">
                <div class="col-es-12">
                    <?php
                    echo $arrContent['blog']['btLoadMore'];
                    ?>
                </div>
            </div>
        </section>
        <section class="col-es-12 col-bi-5" id="pageBlogMostViewed">
            <div id="pageBlogMostViewed">
                <h1 class="page-title">
                    <?php echo $arrContent['head']['translation']['mostViewed']; ?>
                </h1>
                <div class="row blog-list">
                    <?php
                    if ($arrContent['blog']['listLasPost'] === '') {
                        echo '<p class="empty-list">' . $arrContent['head']['translation']['emptyList'] . '</p>';
                    } else {
                        echo $arrContent['blog']['listLasPost'];
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-es-12">
                        <?php
                        echo $arrContent['blog']['btMostViewed'];
                        ?>
                    </div>
                </div>
            </div>
            <?php include __DIR__ . '/tag-list.php'; ?>
        </section>
    </div>
</div>