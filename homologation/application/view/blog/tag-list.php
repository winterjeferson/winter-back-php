<?php
$classDisplay = count($arrContent['blog']['listTag']) === 0 ? 'display-none' : '';
?>
<div id="pageBlogTag" class="<?php echo $classDisplay; ?>">
    <h1 class="page-title">
        <?php echo $arrContent['head']['translation']['tags']; ?>
    </h1>
    <ul class="tag-list">
        <?php
        $string = '';

        foreach ($arrContent['blog']['listTag'] as $value => $key) {
            $string .= '
                <li>
                    <div class="tag-item tag-grey">
                        <a href="' . $arrContent['head']['urlMain'] . $arrContent['head']['lang'] . '/blog/tag/' . $value . '" class="link link-grey">
                            <span class="text">' . $value . '</span>
                        </a>
                    </div>
                </li>
            ';
        }

        echo removeLineBreak($string);
        ?>
    </ul>
</div>