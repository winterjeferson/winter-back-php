{% include "include/head.php" %}
{% include "include/loading_main.php" %}
{% include "include/template_header.php" %}
<main class="row" id="main_wrapper">
    <?php
    $objFrameworkAdminBlog = new FrameworkAdminBlog();
    ?>
    <div class="container">
        <section class="row">
            <div class="col-es-12">
                <h2 class="page-title">
                    Cadastrar Blog
                </h2>
            </div>
            <form class="row form form-grey" data-id="form_register">
                <div class="col-es-6 form-field">
                    <label>Title</label>
                    <input type="text" data-id="field_title" aria-label="Title">
                </div>
                <div class="col-es-6 form-field">
                    <label>Friendly URL</label>
                    <input type="text" data-id="field_url" aria-label="Friendly URL">
                </div>
                <div class="col-es-12 form-field">
                    <label>Content</label>
                    <textarea data-id="field_content" aria-label="Content"></textarea>
                </div>
                <div class="col-es-12 form-field">
                    <label>Tags</label>
                    <input type="text" data-id="field_tag" aria-label="Tags" placeholder="separar por /">
                </div>
                <div class="col-es-12 form-field">
                    <nav class="menu menu-horizontal text-right">
                        <ul>
                            <li>
                                <button type="button" class="bt bt-re bt-green" data-id="bt_register">
                                    Cadastrar
                                </button>
                            </li>
                        </ul>
                    </nav>
                </div>
            </form>
        </section>
    </div>
    <section class="row">
        <div class="col-es-12">
            <h2 class="page-title">
                Conteúdo Ativo
            </h2>
        </div>
        <div class="col-es-12">
            <div class="row">
                <div class="col-es-12">
                    <h2 class="page-title">
                        {{title}}
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-es-12">
                    <table class="table table-grey" data-id="table_active">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>URL</th>
                                <th>Tags</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $objFrameworkAdminBlog->buildReport('active'); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="row">
        <div class="col-es-12">
            <h2 class="page-title">
                Conteúdo Inativo
            </h2>
        </div>
        <div class="col-es-12">
            <div class="row">
                <div class="col-es-12">
                    <h2 class="page-title">
                        {{title}}
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-es-12">
                    <table class="table table-grey" data-id="table_inactive">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>URL</th>
                                <th>Tags</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $objFrameworkAdminBlog->buildReport('inactive'); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
{% include "include/template_footer.php" %}
{% include "include/analytics.php" %}
{% include "include/footer.php" %}