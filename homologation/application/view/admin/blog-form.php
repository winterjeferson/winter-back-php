<div class="col-es-12 col-eb-6">
    <div class="padding-bi">
        <div class="card card-es card-grey">
            <header>
                <h4>
                    <?php echo $arrContent['head']['translation']['pageAdminBlogTitle'] . ' (' . $temp . ')' ?>
                </h4>
            </header>
            <div class="row card-body">
                <div class="col-es-12">
                    <div class="padding-re">
                        <form class="row form form-grey" data-id="formRegister">
                            <div class="col-es-12 form-field text-left">
                                <label><?php echo $arrContent['head']['translation']['title']; ?></label>
                                <input type="text" data-id="fieldTitle<?php echo $temp ?>" aria-label="<?php echo $arrContent['head']['translation']['title']; ?>">
                            </div>
                            <div class="col-es-12 form-field text-left">
                                <label><?php echo $arrContent['head']['translation']['friendlyUrl']; ?></label>
                                <input type="text" data-id="fieldUrl<?php echo $temp ?>" aria-label="<?php echo $arrContent['head']['translation']['pageAdminBlogTitle']; ?>">
                            </div>
                            <div class="col-es-12 form-field text-left">
                                <label><?php echo $arrContent['head']['translation']['content']; ?></label>
                                <textarea id="fieldContent<?php echo $temp ?>" data-id="fieldContent<?php echo $temp ?>" aria-label="<?php echo $arrContent['head']['translation']['content']; ?>"></textarea>
                            </div>
                            <div class="col-es-12 form-field text-left">
                                <label><?php echo $arrContent['head']['translation']['tags']; ?></label>
                                <input type="text" data-id="fieldTag<?php echo $temp ?>" aria-label="<?php echo $arrContent['head']['translation']['pageAdminBlogTagsSeparator']; ?>" placeholder="<?php echo $arrContent['head']['translation']['pageAdminBlogTagsSeparator']; ?>">
                            </div>
                            <div class="col-es-6 form-field text-left">
                                <label><?php echo $arrContent['head']['translation']['datePost']; ?></label>
                                <input type="date" data-id="fieldDatePost<?php echo $temp ?>" aria-label="<?php echo $arrContent['head']['translation']['datePost']; ?>">
                            </div>
                            <div class="col-es-6 form-field text-left">
                                <label><?php echo $arrContent['head']['translation']['dateEdit']; ?></label>
                                <input type="date" data-id="fieldDateEdit<?php echo $temp ?>" aria-label="<?php echo $arrContent['head']['translation']['dateEdit']; ?>">
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