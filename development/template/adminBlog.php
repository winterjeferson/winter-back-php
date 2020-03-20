{% include "include/verify_login.php" %}
{% include "include/head.php" %}
{% include "include/loading_main.php" %}
<?php
$objWbAdminBlog = new WbAdminBlog();
?>

<main class="grid">
    {% include "include/template_header.php" %}
    <section id="mainMenu" class="grid-menu">
        {% include "include/template_menu.php" %}
    </section>
    <section id="mainContent" class="grid-content">
        <div id="pageAdminBlog" class="row">
            <div class="col-es-12">
                {% include "include/template_menu_admin.php" %}
            </div>
            <div class="col-es-12">
                <section class="row">

                    {% set arr = [
                        {language: 'Pt'},
                        {language: 'En'}
                    ] %}

                    {% for i in arr %}
                    <div class="col-es-6">
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
                                                    <textarea data-id="fieldContent{{i.language}}" aria-label="<?php echo $WbTranslation['content']; ?>"></textarea>
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

                {% set arr = [
                    {id: 'Active', php: 'active',translation: 'actives'},
                    {id: 'Inactive', php: 'inactive',translation: 'inactives'}
                ] %}

                {% for i in arr %}
                <div class="row">
                    <div class="col-es-12">
                        <h2 class="page-title">
                            <?php echo $WbTranslation['listing']; ?>
                            (<?php echo $WbTranslation['{{i.translation | safe}}']; ?>)
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-es-12">
                        <table class="table table-grey" data-id="table{{i.id | safe}}">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th><?php echo $WbTranslation['title']; ?> (PT)</th>
                                    <th><?php echo $WbTranslation['title']; ?> (EN)</th>
                                    <th><?php echo $WbTranslation['content']; ?> (PT)</th>
                                    <th><?php echo $WbTranslation['content']; ?> (EN)</th>
                                    <th><?php echo $WbTranslation['friendlyUrl']; ?> (PT)</th>
                                    <th><?php echo $WbTranslation['friendlyUrl']; ?> (EN)</th>
                                    <th><?php echo $WbTranslation['tags']; ?> (PT)</th>
                                    <th><?php echo $WbTranslation['tags']; ?> (EN)</th>
                                    <th><?php echo $WbTranslation['datePost']; ?> (PT)</th>
                                    <th><?php echo $WbTranslation['datePost']; ?> (EN)</th>
                                    <th><?php echo $WbTranslation['dateEdit']; ?> (PT)</th>
                                    <th><?php echo $WbTranslation['dateEdit']; ?> (EN)</th>
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

            </div>
        </div>
    </section>
    {% include "include/template_footer.php" %}
</main>