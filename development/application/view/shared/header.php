<header id="header" class="grid-header">
    <div class="row">
        <div class="col-es-2 text-left">
            <a href="<?php echo $arrContent['head']['urlMain'] . $arrContent['head']['lang'] . '/'; ?>home/" class="bt bt-re bt-grey" aria-label="<?php echo $arrContent['head']['translation']['home']; ?>">
                <svg class="icon icon-bi">
                    <use xlink:href="./assets/img/icon.svg#home"></use>
                </svg>
            </a>
        </div>
        <div class="col-es-10 text-right">
            <form class="form form-grey">
                <nav class="menu menu-horizontal">
                    <ul>
                        <li>
                            <span class="about mobile-hide">v: 1.0.0</span>
                        </li>
                        <li>
                            <span class="mobile-hide">|</span>
                        </li>
                        <li>
                            <span class="about mobile-hide"><?php echo $arrContent['head']['translation']['language']; ?>:</span>
                        </li>
                        <li>
                            <select id="translationSelect" aria-label="<?php echo $arrContent['head']['translation']['language']; ?>">
                                <?php
                                $string = '';
                                foreach (getUrArrLanguage() as $key => &$valeu) {
                                    $lang = $valeu['lang'];
                                    $string .= '<option value="' . $lang . '" data-url="' . $arrContent['head']['url' . ucfirst($lang)] . '">' . $arrContent['head']['translation'][$lang] . '</option>';
                                }
                                echo $string;
                                ?>
                            </select>
                        </li>
                        <li>
                            <a href="<?php echo $arrContent['head']['urlBackEnd']; ?>" target="_blank" rel="noopener" class="bt bt-re bt-green">
                                Download (Github)
                            </a>
                        </li>
                    </ul>
                </nav>
            </form>
        </div>
    </div>
</header>