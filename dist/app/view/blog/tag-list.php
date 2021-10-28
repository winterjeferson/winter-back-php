<?php
$classDisplay = count($arrContent['blog']['listTag']) === 0 ? 'display-none' : '';
?> <div id="pageBlogTag" class="<?php echo $classDisplay; ?>"><h1 class="page__title"><?php echo $translation['tags']; ?></h1><div class="row tag-wrapper"> <?php
        $string = '';

        foreach ($arrContent['blog']['listTag'] as $value => $key) {
            $string .= '
                <div class="tag tag--black tag--small">
                    <a href="' . $arrContent['head']['urlMain'] . $lang . '/blog/tag/' . $value . '" class="link link-grey">
                        <span class="text">' . $value . '</span>
                    </a>
                    <button type="button" class="button button--small button--small--proportional button--transparent button__close" aria-label="close">
                        <svg class="icon icon--small rotate-45"><use xlink:href="./assets/img/icon.svg#plus"></use></svg>
                    </button>
                </div>
            ';
        }

        echo removeLineBreak($string);
        ?> </div></div>