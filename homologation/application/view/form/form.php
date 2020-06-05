<div class="container">
    <div class="row">
        <div class="col-es-12">
            <h1 class="page-title"><?php echo $arrContent['head']['translation']['form'] ?></h1>
        </div>
        <div class="col-es-12">
            <form class="row form form-grey">
                <div class="col-es-12 form-field">
                    <label><?php echo $arrContent['head']['translation']['email'] ?></label>
                    <input type="text" value="" required aria-label="<?php echo $arrContent['head']['translation']['email'] ?>" />
                </div>
                <div class="col-es-12 form-field">
                    <div class="checkbox" tabindex="0">
                        <input id="checkbox1" name="checkbox" type="checkbox" tabindex="-1">
                        <label for="checkbox1" class="checkbox-label">Checkbox 1</label>
                    </div>
                    <div class="checkbox" tabindex="0">
                        <input id="checkbox2" name="checkbox" type="checkbox" tabindex="-1">
                        <label for="checkbox2" class="checkbox-label">Checkbox 2</label>
                    </div>
                    <div class="checkbox">
                        <input id="checkbox3" name="checkbox" type="checkbox" tabindex="-1">
                        <label for="checkbox3" class="checkbox-label">Checkbox 3</label>
                    </div>
                </div>
                <div class="col-es-12 form-field">
                    <label><?php echo $arrContent['head']['translation']['message'] ?></label>
                    <textarea aria-label="textarea" required></textarea>
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