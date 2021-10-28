<div class="carousel" data-current-slide="0" data-style="slide" data-autoplay="true"><ul class="carousel__list"> <?php
        $arr = [
            ['color' => 'cyan', 'translation' => 'pageInitialLanguage'],
            ['color' => 'orange', 'translation' => 'blog'],
            ['color' => 'red', 'translation' => 'friendlyUrl'],
        ];
        $string = '';

        foreach ($arr as $key => &$value) {
            $string .= '
                    <li class="carousel__item background--' . $value['color'] . '">
                        <span class="carousel__content">
                            ' . $translation[$value['translation']] . '
                        </span>
                    </li>
                    ';
        }

        echo removeLineBreak($string);
        ?> </ul><div class="navigation-change button-wrapper row center"><button type="button" class="button button--big" data-id="previous" aria-label="<?php echo $translation['previous']; ?>"><svg class="icon icon--extra-big"><use xlink:href="./assets/img/icon.svg#previous"></use></svg></button> <button type="button" class="button button--big" data-id="next" aria-label="<?php echo $translation['next']; ?>"><svg class="icon icon--extra-big rotate-180"><use xlink:href="./assets/img/icon.svg#previous"></use></svg></button></div><div class="carousel__controller carousel__controller--over button-wrapper row center"></div></div>