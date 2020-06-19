<div class="carousel" data-current-slide="0">
    <div class="row carousel-slide">
        <div class="col-es-12">
            <ul class="carousel-list">
                <?php
                $arr = [
                    ['color' => 'cyan', 'translation' => 'pageInitialLanguage'],
                    ['color' => 'orange', 'translation' => 'blog'],
                    ['color' => 'red', 'translation' => 'friendlyUrl'],
                ];
                $string = '';

                foreach ($arr as $key => &$value) {
                    $string .= '
                    <li>
                        <div class="slide bg-' . $value['color'] . '">
                            <div class="col-middle slide-content">
                                ' . $arrContent['head']['translation'][$value['translation']] . '
                            </div>
                        </div>
                    </li>
                    ';
                }

                echo removeLineBreak($string);
                ?>
            </ul>
        </div>
    </div>
    <div class="menu-horizontal carousel-disabled">
        <ul class="navigation-arrow">
            <li>
                <button type="button" class="bt bt-big" data-id="navLeft" aria-label="<?php echo $arrContent['head']['translation']['previous']; ?>">
                    <span class="fa fa-angle-left fa-4x" aria-hidden="true"></span>
                </button>
            </li>
            <li>
                <button type="button" class="bt bt-big" data-id="navRight" aria-label="<?php echo $arrContent['head']['translation']['next']; ?>">
                    <span class="fa fa-angle-right fa-4x" aria-hidden="true"></span>
                </button>
            </li>
        </ul>
    </div>
    <div class="menu-horizontal text-center carousel-controller-over">
        <ul class="carousel-controller carousel-controller-white">
        </ul>
    </div>
</div>