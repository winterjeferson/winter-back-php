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

<header id="header">
    <div class="row">
        <div class="col-es-12 col-sm-2 text-left mobile-hide">
            <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>home/" class="bt bt-re bt-grey" aria-label="<?php echo $frameworkTranslation['template']['home']; ?>">
                <span class="fa fa-home" aria-hidden="true"></span>
            </a>
        </div>
        <div class="col-es-12 col-sm-10 text-right">
            <form class="form form-grey">
                <nav class="menu menu-horizontal">
                    <ul>
                        <li>
                            <span class="about mobile-hide">v: 12.0.0</span>
                        </li>
                        <li>
                            <select id="page_language_select" aria-label="<?php echo $frameworkTranslation['template']['language']; ?>">
                                <option value=""><?php echo $frameworkTranslation['template']['language']; ?></option>
                                <option value="en">English</option>
                                <option value="pt">Português</option>
                            </select>
                        </li>
                        <li>
                            <a href="https://github.com/winterjeferson/winterstrap" target="_blank" rel="noopener" class="bt bt-re bt-green">
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
    <div id="page_login">
        <div class="login-wrapper col-middle">
            <form class="row form form-grey">
                <div class="col-es-12 form-field">
                    <label for="page_login_user">E-mail</label>
                    <input class="input input-email" type="text" value="email@email.com" id="page_login_user" maxlength="40" placeholder="E-mail">
                </div>
                <div class="col-es-12 form-field">
                    <label for="page_login_password"><?php echo $frameworkTranslation['default']['password']; ?></label>
                    <input class="input input-password" type="password" value="123456" maxlength="20" id="page_login_password" placeholder="<?php echo $frameworkTranslation['default']['password']; ?>">
                </div>
                <div class="col-es-12 form-field text-right">
                    <button type="button" class="bt bt-re bt-blue" id="page_login_bt">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
<footer id="footer">
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