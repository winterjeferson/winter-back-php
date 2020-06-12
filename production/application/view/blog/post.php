<article class="row">
    <div class="col-es-12">
        <div class="container">
            <h1 class="page-title">
                <?php
                echo $arrContent['post']['postTitle'];
                ?>
            </h1>
        </div>
    </div>
    <div class="col-es-12">
        <div class="container">
            <?php
            echo $arrContent['post']['postContent'];
            $tag = $arrContent['post']['postTag'];
            
            if (!is_null($tag)) {
                $explode = explode('#', $tag);
                $length = count($explode);

                $string = '<div class="col-es-12">';
                $string .= '     <div class="container padding-bi">';
                $string .= '     tags: ';
                $string = '         <ul class="tag-list">';

                for ($i = 0; $i < $length; $i++) {
                    if ($explode[$i] !== '') {
                        $string .= '
                        <li>
                            <div class="tag-item tag-grey">
                                <a href="' . $GLOBALS['globalUrl'] . 'blog-search/&q=' . $explode[$i] . '" class="link link-grey">
                                    <span class="text">' . $explode[$i] . '</span>
                                </a>
                            </div>
                        </li>
                    ';
                    }
                }

                $string .= '        </ul>';
                $string .= '     </div>';
                $string .= '</div>';

                echo $string;
            }
            ?>
        </div>
    </div>
</article>