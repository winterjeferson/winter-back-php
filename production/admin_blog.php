<?php

$objWBPLogin = new WBPLogin();
$objWBPLogin->verifyLogin();
?> <?php
echo $objWBPHtml->buildHeader();
?> <div id="loading_main" class="bg-grey"><div class="col-middle"><div class="row"><div class="col-es-2 col-es-off-5"><div class="progress progress-style-red progress-es"><div class="progress-bar"></div></div></div></div></div></div> <?php
$objWBPAdminBlog = new WBPAdminBlog();
?> <main class="grid"> <?php
$objWBPUrl = new WBPUrl();
?> <header id="header" class="grid-header"><div class="row"><div class="col-es-2 text-left"><a href="<?php echo $objWBPUrl->getUrlPage(); ?>home/" class="bt bt-re bt-grey" aria-label="<?php echo $WBPTranslation['home']; ?>"><span class="fa fa-home" aria-hidden="true"></span></a></div><div class="col-es-10 text-right"><form class="form form-grey"><nav class="menu menu-horizontal"><ul><li><span class="about mobile-hide">v: 1.0.0</span></li><li>|</li><li><span class="about mobile-hide"><?php echo $WBPTranslation['language']; ?>:</span></li><li><select id="translation_select" aria-label="<?php echo $WBPTranslation['language']; ?>"><option value="en">English</option><option value="pt">Português</option></select></li><li><a href="https://github.com/winterjeferson/winter-back-php" target="_blank" rel="noopener" class="bt bt-re bt-green">Download (Github)</a></li></ul></nav></form></div></div></header><section id="main_menu" class="grid-menu"><div class="row"><div class="col-es-12"><button type="button" class="bt bt-re bt-toggle bt-grey" aria-label="<?php echo $WBPTranslation['menu']; ?>"><span class="fa fa-bars" aria-hidden="true"></span></button><nav class="menu menu-vertical text-center menu-drop-down"><ul><li><a href="<?php echo $objWBPUrl->getUrlPage(); ?>admin/" data-id="admin" class="bt bt-sm bt-fu bt-blue"> <?php echo $WBPTranslation['administrative_panel']; ?> </a></li><li><a href="<?php echo $objWBPUrl->getUrlPage(); ?>blog/" data-id="blog" class="bt bt-sm bt-fu bt-blue"> <?php echo $WBPTranslation['blog']; ?> </a></li></ul></nav></div></div></section><section id="main_content" class="grid-content"><div id="page_admin_blog" class="row"><div class="col-es-12"><div class="padding-re"><nav class="menu-tab menu-tab-orange text-center menu menu-horizontal menu-drop-down" id="page_admin_menu"><ul><li><a href="<?php echo $objWBPUrl->getUrlPage(); ?>admin-blog/" data-id="admin-blog" class="menu-tab-bt bt-re bt"> <?php echo $WBPTranslation['blog_admin']; ?> </a></li><li><a href="<?php echo $objWBPUrl->getUrlPage(); ?>admin-logout/" data-id="admin-logout" class="menu-tab-bt bt-re bt"> <?php echo $WBPTranslation['logout']; ?> </a></li></ul></nav></div></div><div class="col-es-12"><section class="row"><div class="col-es-6"><div class="padding-bi"><div class="card card-es card-grey"><header><h4> <?php echo $WBPTranslation['page_admin_blog_title']; ?> (pt)</h4></header><div class="row card-body"><div class="col-es-12"><div class="padding-re"><form class="row form form-grey" data-id="form_register"><div class="col-es-12 form-field text-left"><label><?php echo $WBPTranslation['title']; ?></label> <input type="text" data-id="field_title_pt" aria-label="<?php echo $WBPTranslation['title']; ?>"></div><div class="col-es-12 form-field text-left"><label><?php echo $WBPTranslation['friendly_url']; ?></label> <input type="text" data-id="field_url_pt" aria-label="<?php echo $WBPTranslation['page_admin_blog_title']; ?>"></div><div class="col-es-12 form-field text-left"><label><?php echo $WBPTranslation['content']; ?></label> <textarea data-id="field_content_pt" aria-label="<?php echo $WBPTranslation['content']; ?>"></textarea></div><div class="col-es-12 form-field text-left"><label><?php echo $WBPTranslation['tags']; ?></label> <input type="text" data-id="field_tag_pt" aria-label="<?php echo $WBPTranslation['page_admin_blog_tags_separator']; ?>" placeholder="<?php echo $WBPTranslation['page_admin_blog_tags_separator']; ?>"></div><div class="col-es-6 form-field text-left"><label><?php echo $WBPTranslation['date_post']; ?></label> <input type="date" data-id="field_date_post_pt" aria-label="<?php echo $WBPTranslation['date_post']; ?>"></div><div class="col-es-6 form-field text-left"><label><?php echo $WBPTranslation['date_edit']; ?></label> <input type="date" data-id="field_date_edit_pt" aria-label="<?php echo $WBPTranslation['date_edit']; ?>"></div></form></div></div></div><footer></footer></div></div></div><div class="col-es-6"><div class="padding-bi"><div class="card card-es card-grey"><header><h4> <?php echo $WBPTranslation['page_admin_blog_title']; ?> (en)</h4></header><div class="row card-body"><div class="col-es-12"><div class="padding-re"><form class="row form form-grey" data-id="form_register"><div class="col-es-12 form-field text-left"><label><?php echo $WBPTranslation['title']; ?></label> <input type="text" data-id="field_title_en" aria-label="<?php echo $WBPTranslation['title']; ?>"></div><div class="col-es-12 form-field text-left"><label><?php echo $WBPTranslation['friendly_url']; ?></label> <input type="text" data-id="field_url_en" aria-label="<?php echo $WBPTranslation['page_admin_blog_title']; ?>"></div><div class="col-es-12 form-field text-left"><label><?php echo $WBPTranslation['content']; ?></label> <textarea data-id="field_content_en" aria-label="<?php echo $WBPTranslation['content']; ?>"></textarea></div><div class="col-es-12 form-field text-left"><label><?php echo $WBPTranslation['tags']; ?></label> <input type="text" data-id="field_tag_en" aria-label="<?php echo $WBPTranslation['page_admin_blog_tags_separator']; ?>" placeholder="<?php echo $WBPTranslation['page_admin_blog_tags_separator']; ?>"></div><div class="col-es-6 form-field text-left"><label><?php echo $WBPTranslation['date_post']; ?></label> <input type="date" data-id="field_date_post_en" aria-label="<?php echo $WBPTranslation['date_post']; ?>"></div><div class="col-es-6 form-field text-left"><label><?php echo $WBPTranslation['date_edit']; ?></label> <input type="date" data-id="field_date_edit_en" aria-label="<?php echo $WBPTranslation['date_edit']; ?>"></div></form></div></div></div><footer></footer></div></div></div><div class="col-es-12 form-field"><nav class="menu menu-horizontal text-right"><ul><li><button type="button" class="bt bt-re bt-green" data-id="bt_register"> <?php echo $WBPTranslation['save']; ?> </button></li></ul></nav></div></section><div class="row"><div class="col-es-12"><h2 class="page-title"> <?php echo $WBPTranslation['listing']; ?> (<?php echo $WBPTranslation['actives']; ?>)</h2></div></div><div class="row"><div class="col-es-12"><table class="table table-grey" data-id="table_active"><thead><tr><th>Id</th><th><?php echo $WBPTranslation['title']; ?> (PT)</th><th><?php echo $WBPTranslation['title']; ?> (EN)</th><th><?php echo $WBPTranslation['content']; ?> (PT)</th><th><?php echo $WBPTranslation['content']; ?> (EN)</th><th><?php echo $WBPTranslation['friendly_url']; ?> (PT)</th><th><?php echo $WBPTranslation['friendly_url']; ?> (EN)</th><th><?php echo $WBPTranslation['tags']; ?> (PT)</th><th><?php echo $WBPTranslation['tags']; ?> (EN)</th><th><?php echo $WBPTranslation['date_post']; ?> (PT)</th><th><?php echo $WBPTranslation['date_post']; ?> (EN)</th><th><?php echo $WBPTranslation['date_edit']; ?> (PT)</th><th><?php echo $WBPTranslation['date_edit']; ?> (EN)</th><th><?php echo $WBPTranslation['actions']; ?></th></tr></thead><tbody> <?php echo $objWBPAdminBlog->buildReport('active'); ?> </tbody></table></div></div><div class="row"><div class="col-es-12"><h2 class="page-title"> <?php echo $WBPTranslation['listing']; ?> (<?php echo $WBPTranslation['inactives']; ?>)</h2></div></div><div class="row"><div class="col-es-12"><table class="table table-grey" data-id="table_inactive"><thead><tr><th>Id</th><th><?php echo $WBPTranslation['title']; ?> (PT)</th><th><?php echo $WBPTranslation['title']; ?> (EN)</th><th><?php echo $WBPTranslation['content']; ?> (PT)</th><th><?php echo $WBPTranslation['content']; ?> (EN)</th><th><?php echo $WBPTranslation['friendly_url']; ?> (PT)</th><th><?php echo $WBPTranslation['friendly_url']; ?> (EN)</th><th><?php echo $WBPTranslation['tags']; ?> (PT)</th><th><?php echo $WBPTranslation['tags']; ?> (EN)</th><th><?php echo $WBPTranslation['date_post']; ?> (PT)</th><th><?php echo $WBPTranslation['date_post']; ?> (EN)</th><th><?php echo $WBPTranslation['date_edit']; ?> (PT)</th><th><?php echo $WBPTranslation['date_edit']; ?> (EN)</th><th><?php echo $WBPTranslation['actions']; ?></th></tr></thead><tbody> <?php echo $objWBPAdminBlog->buildReport('inactive'); ?> </tbody></table></div></div></div></div></section><footer id="footer" class="grid-footer"><div class="row"><div class="col-es-12"><span class="about"><?php echo $WBPTranslation['developed_by']; ?>:</span> <a href="https://www.jefersonwinter.com" target="_blank" rel="noopener" class="bt bt-sm bt-grey">Jeferson Winter</a></div></div></footer></main>>
                                                    <label><?php echo $WBPTranslation['title']; ?></label>
                                                    <input type="text" data-id="field_title_en" aria-label="<?php echo $WBPTranslation['title']; ?>">
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WBPTranslation['friendly_url']; ?></label>
                                                    <input type="text" data-id="field_url_en" aria-label="<?php echo $WBPTranslation['page_admin_blog_title']; ?>">
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WBPTranslation['content']; ?></label>
                                                    <textarea data-id="field_content_en" aria-label="<?php echo $WBPTranslation['content']; ?>"></textarea>
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WBPTranslation['tags']; ?></label>
                                                    <input type="text" data-id="field_tag_en" aria-label="<?php echo $WBPTranslation['page_admin_blog_tags_separator']; ?>" placeholder="<?php echo $WBPTranslation['page_admin_blog_tags_separator']; ?>">
                                                </div>
                                                <div class="col-es-6 form-field text-left">
                                                    <label><?php echo $WBPTranslation['date_post']; ?></label>
                                                    <input type="date" data-id="field_date_post_en" aria-label="<?php echo $WBPTranslation['date_post']; ?>">
                                                </div>
                                                <div class="col-es-6 form-field text-left">
                                                    <label><?php echo $WBPTranslation['date_edit']; ?></label>
                                                    <input type="date" data-id="field_date_edit_en" aria-label="<?php echo $WBPTranslation['date_edit']; ?>">
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

                    

                    <div class="col-es-12 form-field">
                        <nav class="menu menu-horizontal text-right">
                            <ul>
                                <li>
                                    <button type="button" class="bt bt-re bt-green" data-id="bt_register">
                                        <?php echo $WBPTranslation['save']; ?>
                                    </button>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </section>

                

                
                <div class="row">
                    <div class="col-es-12">
                        <h2 class="page-title">
                            <?php echo $WBPTranslation['listing']; ?>
                            (<?php echo $WBPTranslation['actives']; ?>)
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-es-12">
                        <table class="table table-grey" data-id="table_active">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th><?php echo $WBPTranslation['title']; ?> (PT)</th>
                                    <th><?php echo $WBPTranslation['title']; ?> (EN)</th>
                                    <th><?php echo $WBPTranslation['content']; ?> (PT)</th>
                                    <th><?php echo $WBPTranslation['content']; ?> (EN)</th>
                                    <th><?php echo $WBPTranslation['friendly_url']; ?> (PT)</th>
                                    <th><?php echo $WBPTranslation['friendly_url']; ?> (EN)</th>
                                    <th><?php echo $WBPTranslation['tags']; ?> (PT)</th>
                                    <th><?php echo $WBPTranslation['tags']; ?> (EN)</th>
                                    <th><?php echo $WBPTranslation['date_post']; ?> (PT)</th>
                                    <th><?php echo $WBPTranslation['date_post']; ?> (EN)</th>
                                    <th><?php echo $WBPTranslation['date_edit']; ?> (PT)</th>
                                    <th><?php echo $WBPTranslation['date_edit']; ?> (EN)</th>
                                    <th><?php echo $WBPTranslation['actions']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $objWBPAdminBlog->buildReport('active'); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-es-12">
                        <h2 class="page-title">
                            <?php echo $WBPTranslation['listing']; ?>
                            (<?php echo $WBPTranslation['inactives']; ?>)
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-es-12">
                        <table class="table table-grey" data-id="table_inactive">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th><?php echo $WBPTranslation['title']; ?> (PT)</th>
                                    <th><?php echo $WBPTranslation['title']; ?> (EN)</th>
                                    <th><?php echo $WBPTranslation['content']; ?> (PT)</th>
                                    <th><?php echo $WBPTranslation['content']; ?> (EN)</th>
                                    <th><?php echo $WBPTranslation['friendly_url']; ?> (PT)</th>
                                    <th><?php echo $WBPTranslation['friendly_url']; ?> (EN)</th>
                                    <th><?php echo $WBPTranslation['tags']; ?> (PT)</th>
                                    <th><?php echo $WBPTranslation['tags']; ?> (EN)</th>
                                    <th><?php echo $WBPTranslation['date_post']; ?> (PT)</th>
                                    <th><?php echo $WBPTranslation['date_post']; ?> (EN)</th>
                                    <th><?php echo $WBPTranslation['date_edit']; ?> (PT)</th>
                                    <th><?php echo $WBPTranslation['date_edit']; ?> (EN)</th>
                                    <th><?php echo $WBPTranslation['actions']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $objWBPAdminBlog->buildReport('inactive'); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                

            </div>
        </div>
    </section>
    <footer id="footer" class="grid-footer">
    <div class="row">
        <div class="col-es-12">
            <span class="about"><?php echo $WBPTranslation['developed_by']; ?>:</span>
            <a href="https://www.jefersonwinter.com" target="_blank" rel="noopener" class="bt bt-sm bt-grey">
                Jeferson Winter
            </a>
        </div>
    </div>
</footer>
</main>