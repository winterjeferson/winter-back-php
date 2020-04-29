<?php
$objWbAdminBlog = new WbAdminBlog();
$objWbSession = new WbSession();
$metaDataCustom = [
    'title' => $objWbSession->getArray('translation', 'metaTitle') . ': ' . $objWbSession->getArray('translation', 'administrativePanel') . ' - ' . $objWbSession->getArray('translation', 'blog')
];
?>
{% include "include/verify-login.php" %}
{% include "include/head.php" %}
{% include "include/loading-main.php" %}
<main class="grid">
    {% include "include/template-header.php" %}
    <section id="mainMenu" class="grid-menu">
        {% include "include/template-menu.php" %}
    </section>
    <section id="mainContent" class="grid-content">
        <div id="pageAdminBlog" class="row">
            <div class="col-es-12">
                {% include "include/template-menu-admin.php" %}
            </div>
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
                                        <?php echo $WbTranslation['pageAdminBlogTitle']; ?> ({{i.language}})
                                    </h4>
                                </header>
                                <div class="row card-body">
                                    <div class="col-es-12">
                                        <div class="padding-re">
                                            <form class="row form form-grey" data-id="formRegister">
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['title']; ?></label>
                                                    <input type="text" data-id="fieldTitle{{i.language}}" aria-label="<?php echo $WbTranslation['title']; ?>">
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['friendlyUrl']; ?></label>
                                                    <input type="text" data-id="fieldUrl{{i.language}}" aria-label="<?php echo $WbTranslation['pageAdminBlogTitle']; ?>">
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['content']; ?></label>
                                                    <textarea id="fieldContent{{i.language}}" data-id="fieldContent{{i.language}}" aria-label="<?php echo $WbTranslation['content']; ?>"></textarea>
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['tags']; ?></label>
                                                    <input type="text" data-id="fieldTag{{i.language}}" aria-label="<?php echo $WbTranslation['pageAdminBlogTagsSeparator']; ?>" placeholder="<?php echo $WbTranslation['pageAdminBlogTagsSeparator']; ?>">
                                                </div>
                                                <div class="col-es-6 form-field text-left">
                                                    <label><?php echo $WbTranslation['datePost']; ?></label>
                                                    <input type="date" data-id="fieldDatePost{{i.language}}" aria-label="<?php echo $WbTranslation['datePost']; ?>">
                                                </div>
                                                <div class="col-es-6 form-field text-left">
                                                    <label><?php echo $WbTranslation['dateEdit']; ?></label>
                                                    <input type="date" data-id="fieldDateEdit{{i.language}}" aria-label="<?php echo $WbTranslation['dateEdit']; ?>">
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
                                        <?php echo $WbTranslation['thumbnail']; ?>
                                    </h4>
                                </header>
                                <div class="row card-body">
                                    <div class="col-es-12">
                                        <div class="padding-re">
                                            <table class="table table-grey thumbnail-table">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo $WbTranslation['image']; ?></th>
                                                        <th><?php echo $WbTranslation['name']; ?></th>
                                                        <th><?php echo $WbTranslation['menu']; ?></th>
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
                                                                        <button type="button" class="bt bt-sm bt-blue" data-action="edit" data-tooltip="true" data-tooltip-color="black" title="<?php echo $WbTranslation['edit']; ?>">
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
                                        <?php echo $WbTranslation['save']; ?>
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
                            <?php echo $WbTranslation['listing']; ?>
                            (<?php echo $WbTranslation['{{i.translation | safe}}']; ?>)
                        </h2>
                    </div>
                    <div class="col-es-12">
                        <div class="padding-bi">
                            <table class="table table-grey" data-id="table{{i.id | safe}}">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th><?php echo $WbTranslation['thumbnail']; ?></th>
                                        <th><?php echo $WbTranslation['title']; ?></th>
                                        <th><?php echo $WbTranslation['content']; ?></th>
                                        <th><?php echo $WbTranslation['friendlyUrl']; ?></th>
                                        <th><?php echo $WbTranslation['tags']; ?></th>
                                        <th><?php echo $WbTranslation['datePost']; ?></th>
                                        <th><?php echo $WbTranslation['dateEdit']; ?></th>
                                        <th><?php echo $WbTranslation['actions']; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo $objWbAdminBlog->buildReport('{{i.php | safe}}'); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {% endfor %}
                </section>

            </div>
        </div>
    </section>
    <link href="https://winterjeferson.github.io/winter-front/production/css/plugin.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    {% include "include/template-footer.php" %}
</main>