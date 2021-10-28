<?php
$listThumbnail = $arrContent['image']['listThumbnail'];
$listBanner = $arrContent['image']['listBanner'];
?> <div class="row"> <?php
    $temp = 'thumbnail';
    include __DIR__ . '/image-list.php';
    $temp = 'banner';
    include __DIR__ . '/image-list.php';
    ?> </div>