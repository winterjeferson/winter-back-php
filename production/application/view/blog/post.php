<article class="row"><div class="col-es-12"><div class="container"><h1 class="page-title"> <?php
                echo $arrContent['post']['postTitle'];
                ?> </h1></div></div><div class="col-es-12"><div class="container"> <?php
            echo $arrContent['post']['postContent'];
            ?> <h4 class="author"> <?php
                echo $arrContent['head']['translation']['author'] . ': ' . $arrContent['post']['postAuthor'];
                ?> </h4> <?php
            $tag = $arrContent['post']['postTag'];

            if (!is_null($tag) && $tag !== '') {
                $explode = explode('#', $tag);
                $length = count($explode);

                $string = '
                    <div class="col-es-12">
                        <div class="container padding-bi">
                            tags:
                            <ul class="tag-list">
                        ';

                for ($i = 0; $i < $length; $i++) {
                    if ($explode[$i] !== '') {
                        $string .= '
                        <li>
                            <div class="tag-item tag-grey">
                                <a href="' . $arrContent['post']['tagLink'] . 'blog/tag/' . $explode[$i] . '" class="link link-grey">
                                    <span class="text">' . $explode[$i] . '</span>
                                </a>
                            </div>
                        </li>
                    ';
                    }
                }

                $string .= '
                            </ul>
                        </div>
                    </div>
                ';

                echo removeLineBreak($string);
            }
            ?> </div></div></article>