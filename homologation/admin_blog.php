<?php
$parentFolder = '';

include $parentFolder . 'php/autoload.php';

$objFrameworkTranslation = new FrameworkTranslation();
$objFrameworkLayout = new FrameworkLayout();
$objFrameworkHtml = new FrameworkHtml();

$frameworkTranslation = $objFrameworkTranslation->translateContent();
echo $objFrameworkHtml->buildHeader();
?>
<div id="loading_main" class="bg-grey">
    <div class="col-middle">
        <div class="row">
            <div class="col-es-2 col-es-off-5">
                <div class="progress progress-style-red progress-es">
                    <div class="progress-bar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$objFrameworkUrl = new FrameworkUrl();
?>

<header id="header" class="grid-header">
    <div class="row">
        <div class="col-es-2 text-left">
            <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>home/" class="bt bt-re bt-grey" aria-label="<?php echo $frameworkTranslation['template']['home']; ?>">
                <span class="fa fa-home" aria-hidden="true"></span>
            </a>
        </div>
        <div class="col-es-10 text-right">
            <form class="form form-grey">
                <nav class="menu menu-horizontal">
                    <ul>
                        <li>
                            <span class="about mobile-hide">v: 1.0.0</span>
                        </li>
                        <li>
                            <select id="page_language_select" aria-label="<?php echo $frameworkTranslation['template']['language']; ?>">
                                <option value=""><?php echo $frameworkTranslation['template']['language']; ?></option>
                                <option value="en">English</option>
                                <option value="pt">Português</option>
                            </select>
                        </li>
                        <li>
                            <a href="https://github.com/winterjeferson/winter-back-php" target="_blank" rel="noopener" class="bt bt-re bt-green">
                                Download (Github)
                            </a>
                        </li>
                    </ul>
                </nav>
            </form>
        </div>
    </div>
</header>
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
<footer id="footer" class="grid-footer">
    <div class="row">
        <div class="col-es-12">
            <span class="about">By:</span>
            <a href="https://www.jefersonwinter.com" target="_blank" rel="noopener" class="bt bt-sm bt-grey">
                Jeferson Winter
            </a>
        </div>
    </div>
</footer>
<!--PLACE YOUR GOOGLE ANALYTICS CODE HERE-->
<?php
echo $objFrameworkHtml->buildFooter();
?>