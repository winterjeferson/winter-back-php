<div class="blog"><section id="pageBlogLastPost" class="blog__last-post"><div class="row"><h1 class="page__title"><?php echo $translation['lastPost']; ?></h1><div class="blog-list"> <?php
                if ($arrContent['blog']['listLastPost'] === '') {
                    echo '<p class="empty__list">' . $translation['emptyList'] . '</p>';
                } else {
                    echo $arrContent['blog']['listLastPost'];
                }
                ?> </div> <?php
            echo $arrContent['blog']['btLoadMore'];
            ?> </div></section><section id="pageBlogMostViewed" class="blog__most-viwed"><div class="row"><h1 class="page__title"><?php echo $translation['mostViewed']; ?></h1><div class="blog-list"> <?php
                if ($arrContent['blog']['listMostViewed'] === '') {
                    echo '<p class="empty__list">' . $translation['emptyList'] . '</p>';
                } else {
                    echo $arrContent['blog']['listMostViewed'];
                }
                ?> </div> <?php
            echo $arrContent['blog']['btMostViewed'];
            include __DIR__ . '/tag-list.php';
            ?> </div></section></div>