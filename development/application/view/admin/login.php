<div class="login-wrapper col-middle">
    <form class="row form form-grey">
        <div class="col-es-12 form-field">
            <label for="pageAdminLoginUser">E-mail</label>
            <input class="input input-email" type="text" value="email@email.com" id="pageAdminLoginUser" maxlength="40" placeholder="E-mail">
        </div>
        <div class="col-es-12 form-field">
            <label for="pageAdminLoginPassword"><?php echo $arrContent['head']['translation']['password']; ?></label>
            <input class="input input-password" type="password" value="123456" maxlength="20" id="pageAdminLoginPassword" placeholder="<?php echo $arrContent['head']['translation']['password']; ?>">
        </div>
        <div class="col-es-12 form-field text-right">
            <button type="button" class="bt bt-re bt-blue" id="pageAdminLoginBt">
                Login
            </button>
        </div>
    </form>
</div>