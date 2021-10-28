<article class="container">
    <div class="row">
        <h1 class="page__title"><?php echo $arrContent['post']['postTitle']; ?></h1>
        <?php echo $arrContent['post']['postContent']; ?>
        <h4 class="author"><?php echo $translation['author'] . ': ' . $arrContent['post']['postAuthor']; ?></h4>
    </div>
    <?php
    $tag = $arrContent['post']['postTag'];

    if (!is_null($tag) && $tag !== '') {
        $explode = explode('#', $tag);
        $length = count($explode);
        $string = '
            <div class="row">
                tags: <div class="row tag-wrapper">
        ';

        for ($i = 0; $i < $length; $i++) {
            if ($explode[$i] !== '') {
                $string .= '
                    <div class="tag tag--black tag--small">
                        <a href="' . $arrContent['post']['tagLink'] . 'blog/tag/' . $explode[$i] . '" class="link link-grey">
                            <span class="text">' . $explode[$i] . '</span>
                        </a>
                    </div>
                    ';
            }
        }

        $string .= '
            </div>
        </div>
        ';

        echo removeLineBreak($string);
    }
    ?>
</article>