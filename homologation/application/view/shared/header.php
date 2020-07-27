<header id="header" class="grid-header">
    <div class="row">
        <div class="col-es-2 text-left">
            <a href="<?php echo $arrContent['head']['urlMainLanguage']; ?>home/" class="bt bt-re bt-grey" aria-label="<?php echo $arrContent['head']['translation']['home']; ?>">
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
                            |
                        </li>
                        <li>
                            <span class="about mobile-hide"><?php echo $arrContent['head']['translation']['language']; ?>:</span>
                        </li>
                        <li>
                            <select id="translationSelect" aria-label="<?php echo $arrContent['head']['translation']['language']; ?>">
                                <option value="en">English</option>
                                <option value="pt">Português</option>
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