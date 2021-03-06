<div class="container">
    <div class="row">
        <div class="col-es-12">
            <h1 class="page-title"><?php echo $arrContent['head']['translation']['form'] ?></h1>
        </div>
        <div class="col-es-12">
            <form class="row form form-grey">
                <div class="col-es-12 form-field">
                    <label><?php echo $arrContent['head']['translation']['email'] ?></label>
                    <input data-id="email" type="text" value="" required aria-label="<?php echo $arrContent['head']['translation']['email'] ?>" />
                </div>
                <div class="col-es-12 form-field">
                    <label><?php echo $arrContent['head']['translation']['message'] ?></label>
                    <textarea data-id="message" aria-label="textarea" required></textarea>
                </div>
                <div class="col-es-12 form-field text-right">
                    <button type="button" class="bt bt-re bt-blue" id="pageFormBtSend">
                        <?php echo $arrContent['head']['translation']['send'] ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>