<?php

$objWbLogin = new WbLogin();
$objWbLogin->verifyLogin();
?>
<?php
echo $objWbHtml->buildHeader();
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
<?php
$objWbAdminBlog = new WbAdminBlog();
?>

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
            <div class="col-es-12">
                <section class="row">
                    

                    
                    <div class="col-es-12 col-eb-6">
                        <div class="padding-bi">
                            <div class="card card-es card-grey">
                                <header>
                                    <h4>
                                        <?php echo $WbTranslation['pageAdminBlogTitle']; ?> (Pt)
                                    </h4>
                                </header>
                                <div class="row card-body">
                                    <div class="col-es-12">
                                        <div class="padding-re">
                                            <form class="row form form-grey" data-id="formRegister">
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['title']; ?></label>
                                                    <input type="text" data-id="fieldTitlePt" aria-label="<?php echo $WbTranslation['title']; ?>">
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['friendlyUrl']; ?></label>
                                                    <input type="text" data-id="fieldUrlPt" aria-label="<?php echo $WbTranslation['pageAdminBlogTitle']; ?>">
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['content']; ?></label>
                                                    <textarea id="fieldContentPt" data-id="fieldContentPt" aria-label="<?php echo $WbTranslation['content']; ?>"></textarea>
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['tags']; ?></label>
                                                    <input type="text" data-id="fieldTagPt" aria-label="<?php echo $WbTranslation['pageAdminBlogTagsSeparator']; ?>" placeholder="<?php echo $WbTranslation['pageAdminBlogTagsSeparator']; ?>">
                                                </div>
                                                <div class="col-es-6 form-field text-left">
                                                    <label><?php echo $WbTranslation['datePost']; ?></label>
                                                    <input type="date" data-id="fieldDatePostPt" aria-label="<?php echo $WbTranslation['datePost']; ?>">
                                                </div>
                                                <div class="col-es-6 form-field text-left">
                                                    <label><?php echo $WbTranslation['dateEdit']; ?></label>
                                                    <input type="date" data-id="fieldDateEditPt" aria-label="<?php echo $WbTranslation['dateEdit']; ?>">
                                                </div>
                                            </form>
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
                                        <?php echo $WbTranslation['pageAdminBlogTitle']; ?> (En)
                                    </h4>
                                </header>
                                <div class="row card-body">
                                    <div class="col-es-12">
                                        <div class="padding-re">
                                            <form class="row form form-grey" data-id="formRegister">
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['title']; ?></label>
                                                    <input type="text" data-id="fieldTitleEn" aria-label="<?php echo $WbTranslation['title']; ?>">
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['friendlyUrl']; ?></label>
                                                    <input type="text" data-id="fieldUrlEn" aria-label="<?php echo $WbTranslation['pageAdminBlogTitle']; ?>">
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['content']; ?></label>
                                                    <textarea id="fieldContentEn" data-id="fieldContentEn" aria-label="<?php echo $WbTranslation['content']; ?>"></textarea>
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['tags']; ?></label>
                                                    <input type="text" data-id="fieldTagEn" aria-label="<?php echo $WbTranslation['pageAdminBlogTagsSeparator']; ?>" placeholder="<?php echo $WbTranslation['pageAdminBlogTagsSeparator']; ?>">
                                                </div>
                                                <div class="col-es-6 form-field text-left">
                                                    <label><?php echo $WbTranslation['datePost']; ?></label>
                                                    <input type="date" data-id="fieldDatePostEn" aria-label="<?php echo $WbTranslation['datePost']; ?>">
                                                </div>
                                                <div class="col-es-6 form-field text-left">
                                                    <label><?php echo $WbTranslation['dateEdit']; ?></label>
                                                    <input type="date" data-id="fieldDateEditEn" aria-label="<?php echo $WbTranslation['dateEdit']; ?>">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <footer>
                                </footer>
                            </div>
                        </div>
                    </div>

                    

                    <div class="col-es-12" data-id="thumbnailWrapper">
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
                                            <table class="table table-grey thumbnail-table">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo $WbTranslation['image']; ?></th>
                                                        <th><?php echo $WbTranslation['menu']; ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="minimum">
                                                            <img src="img/blog/thumbnail/default.jpg" data-id="thumbnail">
                                                        </td>
                                                        <td>
                                                            <nav class="menu menu-horizontal text-right">
                                                                <ul>
                                                                    <li>
                                                                        <button type="button" class="bt bt-re bt-blue" data-id="btThumbnailEdit">
                                                                            <?php echo $WbTranslation['edit']; ?>
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" class="bt bt-re bt-red" data-id="btThumbnailDelete">
                                                                            <?php echo $WbTranslation['delete']; ?>
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <footer>
                                </footer>
                            </div>
                        </div>
                    </div>

                    <div class="col-es-12 form-field">
                        <nav class="menu menu-horizontal text-right">
                            <ul>
                                <li>
                                    <button type="button" class="bt bt-re bt-green" data-id="btRegister">
                                        <?php echo $WbTranslation['save']; ?>
                                    </button>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </section>

                

                
                <div class="container">
                    <div class="row">
                        <div class="col-es-12">
                            <h2 class="page-title">
                                <?php echo $WbTranslation['listing']; ?>
                                (<?php echo $WbTranslation['actives']; ?>)
                            </h2>
                        </div>
                        <div class="col-es-12 col-eb-12">
                            <table class="table table-grey" data-id="tableActive">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th><?php echo $WbTranslation['title']; ?> (PT)</th>
                                        <th><?php echo $WbTranslation['title']; ?> (EN)</th>
                                        <th><?php echo $WbTranslation['content']; ?> (PT)</th>
                                        <th><?php echo $WbTranslation['content']; ?> (EN)</th>
                                        <th><?php echo $WbTranslation['friendlyUrl']; ?> (PT)</th>
                                        <th><?php echo $WbTranslation['friendlyUrl']; ?> (EN)</th>
                                        <th><?php echo $WbTranslation['tags']; ?> (PT)</th>
                                        <th><?php echo $WbTranslation['tags']; ?> (EN)</th>
                                        <th><?php echo $WbTranslation['datePost']; ?> (PT)</th>
                                        <th><?php echo $WbTranslation['datePost']; ?> (EN)</th>
                                        <th><?php echo $WbTranslation['dateEdit']; ?> (PT)</th>
                                        <th><?php echo $WbTranslation['dateEdit']; ?> (EN)</th>
                                        <th><?php echo $WbTranslation['actions']; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo $objWbAdminBlog->buildReport('active'); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="col-es-12">
                            <h2 class="page-title">
                                <?php echo $WbTranslation['listing']; ?>
                                (<?php echo $WbTranslation['inactives']; ?>)
                            </h2>
                        </div>
                        <div class="col-es-12 col-eb-12">
                            <table class="table table-grey" data-id="tableInactive">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th><?php echo $WbTranslation['title']; ?> (PT)</th>
                                        <th><?php echo $WbTranslation['title']; ?> (EN)</th>
                                        <th><?php echo $WbTranslation['content']; ?> (PT)</th>
                                        <th><?php echo $WbTranslation['content']; ?> (EN)</th>
                                        <th><?php echo $WbTranslation['friendlyUrl']; ?> (PT)</th>
                                        <th><?php echo $WbTranslation['friendlyUrl']; ?> (EN)</th>
                                        <th><?php echo $WbTranslation['tags']; ?> (PT)</th>
                                        <th><?php echo $WbTranslation['tags']; ?> (EN)</th>
                                        <th><?php echo $WbTranslation['datePost']; ?> (PT)</th>
                                        <th><?php echo $WbTranslation['datePost']; ?> (EN)</th>
                                        <th><?php echo $WbTranslation['dateEdit']; ?> (PT)</th>
                                        <th><?php echo $WbTranslation['dateEdit']; ?> (EN)</th>
                                        <th><?php echo $WbTranslation['actions']; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo $objWbAdminBlog->buildReport('inactive'); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </section>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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