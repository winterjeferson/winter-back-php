<div class="row">
    <div class="col-es-12">
        <h2 class="page-title">
            <?php echo $frameworkTranslation['template']['modal']; ?>
        </h2>
    </div>
    <div class="col-es-12">
        <div class="col-es-12 text-center">
            <nav class="menu menu-horizontal">
                <ul>
                    <li>
                        <button type="button" class="bt bt-re bt-fu bt-blue" onclick="objFrameworkModal.buildModal('ajax', 'modal_ajax.php');">
                            <?php echo $frameworkTranslation['template']['modal']; ?>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="bt bt-re bt-fu bt-blue" onclick="
                                objFrameworkModal.buildModal('confirmation', 'Lorem ipsum dolor sit amet, consecttur adipscing elit?');
                                objFrameworkModal.buildContentConfirmationAction('console.log(this)');
                                ">
                                    <?php echo $frameworkTranslation['template']['confirmation']; ?>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>