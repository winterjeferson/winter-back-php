{% include "include/verify_login.php" %}
{% include "include/head.php" %}
{% include "include/loading_main.php" %}
<?php
$objWbAdminBlog = new WbAdminBlog();
?>

<main class="grid">
    {% include "include/template_header.php" %}
    <section id="main_menu" class="grid-menu">
        {% include "include/template_menu.php" %}
    </section>
    <section id="main_content" class="grid-content">
        <div id="page_admin_blog" class="row">
            <div class="col-es-12">
                {% include "include/template_menu_admin.php" %}
            </div>
            <div class="col-es-12">
                <section class="row">

                    {% set arr = [
                        {language: 'pt'},
                        {language: 'en'}
                    ] %}

                    {% for i in arr %}
                    <div class="col-es-6">
                        <div class="padding-bi">
                            <div class="card card-es card-grey">
                                <header>
                                    <h4>
                                        <?php echo $WbTranslation['page_admin_blog_title']; ?> ({{i.language}})
                                    </h4>
                                </header>
                                <div class="row card-body">
                                    <div class="col-es-12">
                                        <div class="padding-re">
                                            <form class="row form form-grey" data-id="form_register">
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['title']; ?></label>
                                                    <input type="text" data-id="field_title_{{i.language}}" aria-label="<?php echo $WbTranslation['title']; ?>">
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['friendly_url']; ?></label>
                                                    <input type="text" data-id="field_url_{{i.language}}" aria-label="<?php echo $WbTranslation['page_admin_blog_title']; ?>">
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['content']; ?></label>
                                                    <textarea data-id="field_content_{{i.language}}" aria-label="<?php echo $WbTranslation['content']; ?>"></textarea>
                                                </div>
                                                <div class="col-es-12 form-field text-left">
                                                    <label><?php echo $WbTranslation['tags']; ?></label>
                                                    <input type="text" data-id="field_tag_{{i.language}}" aria-label="<?php echo $WbTranslation['page_admin_blog_tags_separator']; ?>" placeholder="<?php echo $WbTranslation['page_admin_blog_tags_separator']; ?>">
                                                </div>
                                                <div class="col-es-6 form-field text-left">
                                                    <label><?php echo $WbTranslation['date_post']; ?></label>
                                                    <input type="date" data-id="field_date_post_{{i.language}}" aria-label="<?php echo $WbTranslation['date_post']; ?>">
                                                </div>
                                                <div class="col-es-6 form-field text-left">
                                                    <label><?php echo $WbTranslation['date_edit']; ?></label>
                                                    <input type="date" data-id="field_date_edit_{{i.language}}" aria-label="<?php echo $WbTranslation['date_edit']; ?>">
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
                                    <button type="button" class="bt bt-re bt-green" data-id="bt_register">
                                        <?php echo $WbTranslation['save']; ?>
                                    </button>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </section>

                {% set arr = [
                    {id: 'active', translation: 'actives'},
                    {id: 'inactive', translation: 'inactives'}
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
                        <table class="table table-grey" data-id="table_{{i.id | safe}}">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th><?php echo $WbTranslation['title']; ?> (PT)</th>
                                    <th><?php echo $WbTranslation['title']; ?> (EN)</th>
                                    <th><?php echo $WbTranslation['content']; ?> (PT)</th>
                                    <th><?php echo $WbTranslation['content']; ?> (EN)</th>
                                    <th><?php echo $WbTranslation['friendly_url']; ?> (PT)</th>
                                    <th><?php echo $WbTranslation['friendly_url']; ?> (EN)</th>
                                    <th><?php echo $WbTranslation['tags']; ?> (PT)</th>
                                    <th><?php echo $WbTranslation['tags']; ?> (EN)</th>
                                    <th><?php echo $WbTranslation['date_post']; ?> (PT)</th>
                                    <th><?php echo $WbTranslation['date_post']; ?> (EN)</th>
                                    <th><?php echo $WbTranslation['date_edit']; ?> (PT)</th>
                                    <th><?php echo $WbTranslation['date_edit']; ?> (EN)</th>
                                    <th><?php echo $WbTranslation['actions']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $objWbAdminBlog->buildReport('{{i.id | safe}}'); ?>
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