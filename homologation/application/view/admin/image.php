<?php
// $objWBAdminUploadImageList = new WBAdminUploadImageList();
// $objWbSession = new WbSession();
// $metaDataCustom = [
//     'title' => $objWbSession->getArray('translation', 'metaTitle') . ': ' . $objWbSession->getArray('translation', 'administrativePanel') . ' - ' . $objWbSession->getArray('translation', 'uploadImage')
// ];

$listThumbnail = $arrContent['image']['listThumbnail'];
$listBanner = $arrContent['image']['listBanner'];
?>

<!-- {% include "include/verify-login.php" %} -->
<div class="row">
    <?php
    $temp = 'thumbnail';
    include __DIR__ . '/image-list.php';
    $temp = 'banner';
    include __DIR__ . '/image-list.php';
    ?>
</div>