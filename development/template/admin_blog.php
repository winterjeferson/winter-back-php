{% include "include/verify_login.php" %}
{% include "include/head.php" %}
{% include "include/loading_main.php" %}
<?php
$objWBPAdminBlog = new WBPAdminBlog();
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
                    <div class="col-es-12">
                        <h2 class="page-title">
                            <?php echo $WBPTranslation['page_admin_blog_title']; ?>
                        </h2>
                    </div>
                    <form class="row form form-grey" data-id="form_register">
                        <div class="col-es-6 form-field">
                            <label><?php echo $WBPTranslation['title']; ?></label>
                            <input type="text" data-id="field_title" aria-label="<?php echo $WBPTranslation['title']; ?>">
                        </div>
                        <div class="col-es-6 form-field">
                            <label><?php echo $WBPTranslation['friendly_url']; ?></label>
                            <input type="text" data-id="field_url" aria-label="<?php echo $WBPTranslation['page_admin_blog_title']; ?>">
                        </div>
                        <div class="col-es-12 form-field">
                            <label><?php echo $WBPTranslation['content']; ?></label>
                            <textarea data-id="field_content" aria-label="<?php echo $WBPTranslation['content']; ?>"></textarea>
                        </div>
                        <div class="col-es-12 form-field">
                            <label><?php echo $WBPTranslation['tags']; ?></label>
                            <input type="text" data-id="field_tag" aria-label="<?php echo $WBPTranslation['page_admin_blog_tags_separator']; ?>" placeholder="<?php echo $WBPTranslation['page_admin_blog_tags_separator']; ?>">
                        </div>
                        <div class="col-es-12 form-field">
                            <nav class="menu menu-horizontal text-right">
                                <ul>
                                    <li>
                                        <button type="button" class="bt bt-re bt-green" data-id="bt_register">
                                            <?php echo $WBPTranslation['save']; ?>
                                        </button>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </form>
                </section>

                {% set arr = [
                    {id: 'active', translation: 'actives'},
                    {id: 'inactive', translation: 'inactives'}
                 ] %}


                {% for i in arr %}
                <section class="row">
                    <div class="col-es-12">
                        <h2 class="page-title">
                            <?php echo $WBPTranslation['{{i.translation | safe}}']; ?>
                        </h2>
                    </div>
                    <div class="col-es-12">
                        <table class="table table-grey" data-id="table_{{i.id | safe}}">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th><?php echo $WBPTranslation['title']; ?></th>
                                    <th><?php echo $WBPTranslation['content']; ?></th>
                                    <th><?php echo $WBPTranslation['friendly_url']; ?></th>
                                    <th><?php echo $WBPTranslation['tags']; ?></th>
                                    <th><?php echo $WBPTranslation['actions']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $objWBPAdminBlog->buildReport('{{i.id | safe}}'); ?>
                            </tbody>
                        </table>
                    </div>
                </section>
                {% endfor %}

            </div>
        </div>
    </section>
    {% include "include/template_footer.php" %}
</main>