<?php
include_once 'php/autoload.php';

$objWbSession = new WbSession();
$objWbAdminUploadImageList = new WbAdminUploadImageList();
?>
<div class="row">
    <div class="col-es-12">
        <h1 class="text-center"> <?php echo $objWbSession->getArray('translation', 'selectImage'); ?></h1>
    </div>
</div>
<div class="row">
    <?php
    echo $objWbAdminUploadImageList->buildGallery('blog/thumbnail');
    ?>
</div>