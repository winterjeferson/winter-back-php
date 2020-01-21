<?php
include '../php/autoload.php';

$objFrameworkTranslation = new FrameworkTranslation();
$objFrameworkHtml = new FrameworkHtml();

$frameworkTranslation = $objFrameworkTranslation->translateContent();
echo $objFrameworkHtml->buildHeader(true);
?>

{% include "include/loading_main.php" %}
<main id="page_login">
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
</main>
<?php
echo $objFrameworkHtml->buildFooter();