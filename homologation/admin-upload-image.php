<?php
$objWBAdminUploadImageList = new WBAdminUploadImageList();
$objWbSession = new WbSession();
$metaDataCustom = [
    'title' => $objWbSession->getArray('translation', 'metaTitle') . ': ' . $objWbSession->getArray('translation', 'administrativePanel') . ' - ' . $objWbSession->getArray('translation', 'uploadImage')
];
?>

<?php

$objWbLogin = new WbLogin();
$objWbLogin->verifyLogin();
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
                <span class="fa fa-home" aria-hidden="true"></span>
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
                
            </ul>
        </nav>
    </div>
</div>
    </section>
    <section id="mainContent" class="grid-content">
        <div id="pageAdminBlog" class="row">
            <div class="col-es-12">
                

<div class="padding-re">
    <nav class="menu-tab menu-tab-orange text-center menu menu-horizontal menu-drop-down" id="pageAdminMenu">
        <ul>
            
            <li>
                <a href="<?php echo $objWbUrl->getUrlPage(); ?>admin-blog/" data-id="admin-blog" class="menu-tab-bt bt-re bt">
                    <?php echo $WbTranslation['blogAdmin']; ?>
                </a>
            </li>
            
            <li>
                <a href="<?php echo $objWbUrl->getUrlPage(); ?>admin-upload-image/" data-id="admin-upload-image" class="menu-tab-bt bt-re bt">
                    <?php echo $WbTranslation['uploadImage']; ?>
                </a>
            </li>
            
            <li>
                <a href="<?php echo $objWbUrl->getUrlPage(); ?>admin-logout/" data-id="admin-logout" class="menu-tab-bt bt-re bt">
                    <?php echo $WbTranslation['logout']; ?>
                </a>
            </li>
            
        </ul>
    </nav>
</div>
            </div>

            

            
            <div class="col-es-12 col-eb-6">
                <div class="padding-bi">
                    <div class="card card-es card-grey">
                        <header>
                            <h4>
                                <?php echo $WbTranslation['thumbnail']; ?>
                            </h4>
                        </header>
                        <div class="row card-body">
                            <div class="col-es-12">
                                <div class="padding-re">
                                    <form class="row form form-grey text-left" data-id="formRegister">
                                        <div class="col-es-12 form-field">
                                            <label><?php echo $WbTranslation['recommendedSize150']; ?></label>
                                            <input class="custom-file-input" type="file">
                                        </div>
                                        <div class="col-es-12 form-field">
                                            <nav class="menu menu-horizontal text-right">
                                                <ul>
                                                    <li>
                                                        <button type="button" class="bt bt-re bt-green" data-id="btUploadThumbnail">
                                                            <?php echo $WbTranslation['send']; ?>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-es-12">
                                <div class="padding-bi">
                                    <div class="table-wrapper">
                                        <table class="table table-grey thumbnail-table" data-path="blog/thumbnail">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $WbTranslation['image']; ?></th>
                                                    <th><?php echo $WbTranslation['name']; ?></th>
                                                    <th><?php echo $WbTranslation['menu']; ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                echo $objWBAdminUploadImageList->buildList('blog/thumbnail');
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer>
                        </footer>
                    </div>
                </div>
            </div>
            
            <div class="col-es-12 col-eb-6">
                <div class="padding-bi">
                    <div class="card card-es card-grey">
                        <header>
                            <h4>
                                <?php echo $WbTranslation['banner']; ?>
                            </h4>
                        </header>
                        <div class="row card-body">
                            <div class="col-es-12">
                                <div class="padding-re">
                                    <form class="row form form-grey text-left" data-id="formRegister">
                                        <div class="col-es-12 form-field">
                                            <label><?php echo $WbTranslation['recommendedSize1300']; ?></label>
                                            <input class="custom-file-input" type="file">
                                        </div>
                                        <div class="col-es-12 form-field">
                                            <nav class="menu menu-horizontal text-right">
                                                <ul>
                                                    <li>
                                                        <button type="button" class="bt bt-re bt-green" data-id="btUploadBanner">
                                                            <?php echo $WbTranslation['send']; ?>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-es-12">
                                <div class="padding-bi">
                                    <div class="table-wrapper">
                                        <table class="table table-grey thumbnail-table" data-path="blog/banner">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $WbTranslation['image']; ?></th>
                                                    <th><?php echo $WbTranslation['name']; ?></th>
                                                    <th><?php echo $WbTranslation['menu']; ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                echo $objWBAdminUploadImageList->buildList('blog/banner');
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer>
                        </footer>
                    </div>
                </div>
            </div>
            

    </section>
    <footer id="footer" class="grid-footer">
    <div class="row">
        <div class="col-es-12">
            <span class="about"><?php echo $WbTranslation['developedBy']; ?>:</span>
            <a href="https://www.jefersonwinter.com" target="_blank" rel="noopener" class="bt bt-sm bt-grey">
                Jeferson Winter
            </a>
        </div>
    </div>
</footer>
</main>