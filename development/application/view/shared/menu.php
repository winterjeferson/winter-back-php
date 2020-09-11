<div class="row">
    <div class="col-es-12">
        <button type="button" class="bt bt-re bt-toggle bt-grey" aria-label="<?php echo $arrContent['head']['translation']['menu']; ?>">
            <svg class="icon icon-bi">
                <use xlink:href="./assets/img/icon.svg#menu"></use>
            </svg>
        </button>
        <nav class="menu menu-vertical text-center menu-drop-down">
            <ul>
                <?php
                $string = '';
                $arr = [
                    ['id' => 'admin', 'translation' => 'administrativePanel'],
                    ['id' => 'blog', 'translation' => 'blog'],
                    ['id' => 'form', 'translation' => 'form'],
                ];

                foreach ($arr as $key => &$value) {
                    $href = $arrContent['head']['urlMain'] . $arrContent['head']['lang'] . '/' . $value['id'] . '/';
                    $name = $arrContent['head']['translation'][$value['translation']];
                    $string .= '
                    <li>
                        <a href="' . $href . '" data-id="' . $value['id'] . '" class="bt bt-sm bt-fu bt-blue">
                            ' . $name . '
                        </a>
                    </li>
                    ';
                }
                
                foreach ($arrContent['head']['menuMain'] as $key => &$value) {
                    $href = $arrContent['head']['urlMain'] . $arrContent['head']['lang'] . '/page/content/' . $value['id'] . '/' . $value['url'] . '/';
                    $name = $value['menu'];
                    if ($name != '') {
                        $string .= '
                        <li>
                            <a href="' . $href . '" data-id="' . $value['id'] . '" class="bt bt-sm bt-fu bt-purple">
                                ' . $name . '
                            </a>
                        </li>
                        ';
                    }
                }

                echo removeLineBreak($string);
                ?>
            </ul>
        </nav>
    </div>
</div>