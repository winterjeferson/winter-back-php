<div class="col-es-12">
    <h2 class="page-title">
        <?php
        echo $arrContent['head']['translation']['register'];
        ?>
    </h2>
    <form class="row form form-grey" data-id="formRegister">
        <div class="col-es-12">
            <div class="padding-re">
                <div class="row">
                    <div class="col-es-12 col-eb-4 form-field text-left">
                        <label><?php echo $arrContent['head']['translation']['menu']; ?></label>
                        <input class="input" type="text" value="" maxlength="100" data-id="formFieldMenu">
                    </div>
                    <div class="col-es-12 col-eb-4 form-field text-left">
                        <label><?php echo $arrContent['head']['translation']['title']; ?></label>
                        <input class="input" type="text" value="" maxlength="100" data-id="formFieldTitle">
                    </div>
                    <div class="col-es-12 col-eb-4 form-field text-left">
                        <label><?php echo $arrContent['head']['translation']['url']; ?></label>
                        <input class="input" type="text" value="" maxlength="100" data-id="formFieldUrl">
                    </div>
                    <div class="col-es-12 form-field text-left">
                        <label><?php echo $arrContent['head']['translation']['content']; ?></label>
                        <textarea id="fieldContent" data-id="fieldContent" aria-label="<?php echo $arrContent['page']['page']['content']; ?>"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>