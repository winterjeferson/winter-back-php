{% include "include/head.php" %}
{% include "include/loading_main.php" %}
<main class="grid">
    {% include "include/template_header.php" %}
    <section id="main_menu" class="grid-menu">
        {% include "include/template_menu.php" %}
    </section>
    <section id="main_content" class="grid-content">
        <div id="page_admin_login">
            <div class="login-wrapper col-middle">
                <form class="row form form-grey">
                    <div class="col-es-12 form-field">
                        <label for="page_admin_login_user">E-mail</label>
                        <input class="input input-email" type="text" value="email@email.com" id="page_admin_login_user" maxlength="40" placeholder="E-mail">
                    </div>
                    <div class="col-es-12 form-field">
                        <label for="page_admin_login_password"><?php echo $WBTranslation['email']; ?></label>
                        <input class="input input-password" type="password" value="123456" maxlength="20" id="page_admin_login_password" placeholder="<?php echo $WBTranslation['password']; ?>">
                    </div>
                    <div class="col-es-12 form-field text-right">
                        <button type="button" class="bt bt-re bt-blue" id="page_admin_login_bt">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    {% include "include/template_footer.php" %}
</main>