<div class="row">
    <div class="col-es-12">
        <button type="button" class="bt bt-re bt-toggle bt-grey" aria-label="<?php echo $arrContent['head']['translation']['menu']; ?>">
            <span class="fa fa-bars" aria-hidden="true"></span>
        </button>
        <nav class="menu menu-vertical text-center menu-drop-down">
            <ul>

                <?php
                $arr = [
                    ['id' => 'admin', 'translation' => 'administrativePanel'],
                    ['id' => 'blog', 'translation' => 'blog'],
                    ['id' => 'form', 'translation' => 'form'],
                ];
                $string = '';

                foreach ($arr as $key => &$value) {
                    $string .= '
                    <li>
                        <a href="' . $arrContent['head']['urlMainLanguage'] . $value['id'] . '/" data-id="' . $value['id'] . '" class="bt bt-sm bt-fu bt-blue">
                            ' . $arrContent['head']['translation'][$value['translation']] . '
                        </a>
                    </li>
                    ';
                }

                echo removeLineBreak($string);
                ?>

            </ul>
        </nav>
    </div>
</div>