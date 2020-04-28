<?php
$objWbSession = new WbSession();
$metaDataCustom = [
    'title' => $objWbSession->getArray('translation', 'metaTitle') . ': ' . $objWbSession->getArray('translation', 'administrativePanel') . ' - ' . $objWbSession->getArray('translation', 'login')
];
?>

<?php
$metaData = isset($metaDataCustom) ? $metaDataCustom : '';
echo $objWbHtml->buildHeader($metaData);
?>
<div id="loadingMain" class="bg-grey">
    <div class="col-middle">
        <div class="row">
            <div class="col-es-2 col-es-off-5">
                <div class="progress progress-style-red progress-es">
                    <div class="progress-bar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="grid">
    <?php
$objWbUrl = new WbUrl();
?>

<header id="header" class="grid-header">
    <div class="row">
        <div class="col-es-2 text-left">
            <a href="<?php echo $objWbUrl->getUrlPage(); ?>home/" class="bt bt-re bt-grey" aria-label="<?php echo $WbTranslation['home']; ?>">
                <span aria-hidden="true">&#127968;</span>
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
                            <span class="about mobile-hide"><?php echo $WbTranslation['language']; ?>:</span>
                        </li>
                        <li>
                            <select id="translationSelect" aria-label="<?php echo $WbTranslation['language']; ?>">
                                <option value="en">English</option>
                                <option value="pt">Português</option>
                            </select>
                        </li>
                        <li>
                            <a href="https://github.com/winterjeferson/winter-back-php" target="_blank" rel="noopener" class="bt bt-re bt-green">
                                Download (Github)
                            </a>
                        </li>
                    </ul>
                </nav>
            </form>
        </div>
    </div>
</header>
    <section id="mainMenu" class="grid-menu">
        

<div class="row">
    <div class="col-es-12">
        <button type="button" class="bt bt-re bt-toggle bt-grey" aria-label="<?php echo $WbTranslation['menu']; ?>">
            <span class="fa fa-bars" aria-hidden="true"></span>
        </button>
        <nav class="menu menu-vertical text-center menu-drop-down">
            <ul>
                
                <li>
                    <a href="<?php echo $objWbUrl->getUrlPage(); ?>admin/" data-id="admin" class="bt bt-sm bt-fu bt-blue">
                        <?php echo $WbTranslation['administrativePanel']; ?>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objWbUrl->getUrlPage(); ?>blog/" data-id="blog" class="bt bt-sm bt-fu bt-blue">
                        <?php echo $WbTranslation['blog']; ?>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo $objWbUrl->getUrlPage(); ?>form/" data-id="form" class="bt bt-sm bt-fu bt-blue">
                        <?php echo $WbTranslation['form']; ?>
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</div>
    </section>
    <section id="mainContent" class="grid-content">
        <div id="pageAdminLogin">
            <div class="login-wrapper col-middle">
                <form class="row form form-grey">
                    <div class="col-es-12 form-field">
                        <label for="pageAdminLoginUser">E-mail</label>
                        <input class="input input-email" type="text" value="email@email.com" id="pageAdminLoginUser" maxlength="40" placeholder="E-mail">
                    </div>
                    <div class="col-es-12 form-field">
                        <label for="pageAdminLoginPassword"><?php echo $WbTranslation['email']; ?></label>
                        <input class="input input-password" type="password" value="123456" maxlength="20" id="pageAdminLoginPassword" placeholder="<?php echo $WbTranslation['password']; ?>">
                    </div>
                    <div class="col-es-12 form-field text-right">
                        <button type="button" class="bt bt-re bt-blue" id="pageAdminLoginBt">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer id="footer" class="grid-footer">
    <div class="row">
        <div class="col-es-12">
            <span class="about"><?php echo $WbTranslation['developedBy']; ?>:</span>
            <a href="https://www.jefersonwinter.com.br" target="_blank" rel="noopener" class="bt bt-sm bt-grey">
                Jeferson Winter
            </a>
        </div>
    </div>
</footer>
</main>