<?php
// $objWBAdminUploadImageList = new WBAdminUploadImageList();
// $objWbSession = new WbSession();
// $metaDataCustom = [
//     'title' => $objWbSession->getArray('translation', 'metaTitle') . ': ' . $objWbSession->getArray('translation', 'administrativePanel') . ' - ' . $objWbSession->getArray('translation', 'uploadImage')
// ];
?>

<!-- {% include "include/verify-login.php" %} -->

{% set arr = [
    {id: 'Thumbnail', translation: 'thumbnail', path: 'blog/thumbnail', label: 'file', labelRecommended: 'recommendedSize150'},
    {id: 'Banner', translation: 'banner', path: 'blog/banner', label: 'file', labelRecommended: 'recommendedSize1300'}
] %}

{% for i in arr %}
<div class="col-es-12 col-eb-6">
    <div class="padding-bi">
        <div class="card card-es card-grey">
            <header>
                <h4>
                    <?php echo $arrContent['head']['translation']['{{i.translation}}']; ?>
                </h4>
            </header>
            <div class="row card-body">
                <div class="col-es-12">
                    <div class="padding-re">
                        <form class="row form form-grey text-left" data-id="formRegister">
                            <div class="col-es-12 form-field">
                                <label><?php echo $arrContent['head']['translation']['{{i.labelRecommended | safe}}']; ?></label>
                                <input class="custom-file-input" type="file">
                            </div>
                            <div class="col-es-12 form-field">
                                <nav class="menu menu-horizontal text-right">
                                    <ul>
                                        <li>
                                            <button type="button" class="bt bt-re bt-green" data-id="btUpload{{i.id | safe}}">
                                                <?php echo $arrContent['head']['translation']['send']; ?>
                                            </button>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-es-12">
                    <div class="padding-bi">
                        <div class="table-wrapper">
                            <table class="table table-grey thumbnail-table" data-path="{{i.path}}">
                                <thead>
                                    <tr>
                                        <th><?php echo $arrContent['head']['translation']['image']; ?></th>
                                        <th><?php echo $arrContent['head']['translation']['name']; ?></th>
                                        <th><?php echo $arrContent['head']['translation']['menu']; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // echo $objWBAdminUploadImageList->buildList('{{i.path | safe}}');
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
            </footer>
        </div>
    </div>
</div>
{% endfor %}