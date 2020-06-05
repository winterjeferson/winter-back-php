<?php
// $objWbAdminBlog = new WbAdminBlog();
// $objWbSession = new WbSession();
// $metaDataCustom = [
//     'title' => $objWbSession->getArray('translation', 'metaTitle') . ': ' . $objWbSession->getArray('translation', 'administrativePanel') . ' - ' . $objWbSession->getArray('translation', 'blog')
// ];
?>

<!-- {% include "include/verify-login.php" %} -->



<div class="col-es-12">
    <section id="pageAdminBlogEdit" class="row">
        {% set arr = [
                        {language: 'Pt'},
                        {language: 'En'}
                    ] %}

        {% for i in arr %}
        <div class="col-es-12 col-eb-6">
            <div class="padding-bi">
                <div class="card card-es card-grey">
                    <header>
                        <h4>
                            <?php echo $arrContent['head']['translation']['pageAdminBlogTitle']; ?> ({{i.language}})
                        </h4>
                    </header>
                    <div class="row card-body">
                        <div class="col-es-12">
                            <div class="padding-re">
                                <form class="row form form-grey" data-id="formRegister">
                                    <div class="col-es-12 form-field text-left">
                                        <label><?php echo $arrContent['head']['translation']['title']; ?></label>
                                        <input type="text" data-id="fieldTitle{{i.language}}" aria-label="<?php echo $arrContent['head']['translation']['title']; ?>">
                                    </div>
                                    <div class="col-es-12 form-field text-left">
                                        <label><?php echo $arrContent['head']['translation']['friendlyUrl']; ?></label>
                                        <input type="text" data-id="fieldUrl{{i.language}}" aria-label="<?php echo $arrContent['head']['translation']['pageAdminBlogTitle']; ?>">
                                    </div>
                                    <div class="col-es-12 form-field text-left">
                                        <label><?php echo $arrContent['head']['translation']['content']; ?></label>
                                        <textarea id="fieldContent{{i.language}}" data-id="fieldContent{{i.language}}" aria-label="<?php echo $arrContent['head']['translation']['content']; ?>"></textarea>
                                    </div>
                                    <div class="col-es-12 form-field text-left">
                                        <label><?php echo $arrContent['head']['translation']['tags']; ?></label>
                                        <input type="text" data-id="fieldTag{{i.language}}" aria-label="<?php echo $arrContent['head']['translation']['pageAdminBlogTagsSeparator']; ?>" placeholder="<?php echo $arrContent['head']['translation']['pageAdminBlogTagsSeparator']; ?>">
                                    </div>
                                    <div class="col-es-6 form-field text-left">
                                        <label><?php echo $arrContent['head']['translation']['datePost']; ?></label>
                                        <input type="date" data-id="fieldDatePost{{i.language}}" aria-label="<?php echo $arrContent['head']['translation']['datePost']; ?>">
                                    </div>
                                    <div class="col-es-6 form-field text-left">
                                        <label><?php echo $arrContent['head']['translation']['dateEdit']; ?></label>
                                        <input type="date" data-id="fieldDateEdit{{i.language}}" aria-label="<?php echo $arrContent['head']['translation']['dateEdit']; ?>">
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

        {% endfor %}

        <div class="col-es-12" data-id="thumbnailWrapper">
            <div class="padding-bi">
                <div class="card card-es card-grey">
                    <header>
                        <h4>
                            <?php echo $arrContent['head']['translation']['thumbnail']; ?>
                        </h4>
                    </header>
                    <div class="row card-body">
                        <div class="col-es-12">
                            <div class="padding-re">
                                <table class="table table-grey thumbnail-table">
                                    <thead>
                                        <tr>
                                            <th><?php echo $arrContent['head']['translation']['image']; ?></th>
                                            <th><?php echo $arrContent['head']['translation']['name']; ?></th>
                                            <th><?php echo $arrContent['head']['translation']['menu']; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="minimum">
                                                <img src="assets/img/blog/thumbnail/default.jpg" data-id="thumbnail">
                                            </td>
                                            <td data-id="name">
                                                default.jpg
                                            </td>
                                            <td class="minimum">
                                                <nav class="menu menu-horizontal text-right">
                                                    <ul>
                                                        <li>
                                                            <button type="button" class="bt bt-sm bt-blue" data-action="edit" data-tooltip="true" data-tooltip-color="black" title="<?php echo $arrContent['head']['translation']['edit']; ?>">
                                                                <span class="fa fa-pencil" aria-hidden="true"></span>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                        <button type="button" class="bt bt-re bt-green" data-id="btRegister">
                            <?php echo $arrContent['head']['translation']['save']; ?>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>

    </section>

    <section id="pageAdminBlogList" class="row">
        {% set arr = [
                            {id: 'Active', php: 'active',translation: 'actives'},
                            {id: 'Inactive', php: 'inactive',translation: 'inactives'}
                        ] %}

        {% for i in arr %}
        <div class="col-es-12">
            <h2 class="page-title">
                <?php echo $arrContent['head']['translation']['listing']; ?>
                (<?php echo $arrContent['head']['translation']['{{i.translation | safe}}']; ?>)
            </h2>
        </div>
        <div class="col-es-12">
            <div class="padding-bi">
                <table class="table table-grey" data-id="table{{i.id | safe}}">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th><?php echo $arrContent['head']['translation']['thumbnail']; ?></th>
                            <th><?php echo $arrContent['head']['translation']['title']; ?></th>
                            <th><?php echo $arrContent['head']['translation']['content']; ?></th>
                            <th><?php echo $arrContent['head']['translation']['friendlyUrl']; ?></th>
                            <th><?php echo $arrContent['head']['translation']['tags']; ?></th>
                            <th><?php echo $arrContent['head']['translation']['datePost']; ?></th>
                            <th><?php echo $arrContent['head']['translation']['dateEdit']; ?></th>
                            <th><?php echo $arrContent['head']['translation']['actions']; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //echo $objWbAdminBlog->buildReport('{{i.php | safe}}'); 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        {% endfor %}
    </section>
</div>