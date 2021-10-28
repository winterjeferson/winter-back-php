class Login {
    build() {
        if (!window.helper.getUrlWord('login')) return;

        this.update();
        this.buildMenu();
    }

    update() {
        this.isSignUp = false;

        this.elPage = document.querySelector('#pageAdminLogin');
        this.elButtonLogin = document.querySelector('#pageAdminLoginBt');
        this.elFieldLogin = document.querySelector('#pageAdminLoginUser');
        this.elFieldPassword = document.querySelector('#pageAdminLoginPassword');
    }

    buildMenu() {
        this.elButtonLogin.addEventListener('click', () => {
            this.buildLogin();
        });
    }

    validate() {
        const arrField = [this.elFieldLogin, this.elFieldPassword];
        const validate = window.FormData.validateEmpty(arrField);

        if (validate) {
            return true;
        }
    }

    buildLogin() {
        const controller = wbUrl.getController({
            'folder': 'admin',
            'file': 'LoginAjax'
        });
        const parameter =
            `&email=${this.elFieldLogin.value}` +
            `&password=${this.elFieldPassword.value}`;
        const obj = {
            controller,
            parameter
        };
        let data = wbHelper.ajax(obj);

        data.then((result) => {
            this.buildLoginSuccess(result);
        });
    }

    buildLoginSuccess(data) {
        let response = '';

        this.elButtonLogin.removeAttribute('disabled');

        switch (data) {
            case 'inactive':
                response = globalTranslation.loginInactive;
                break;
            case 'problem':
                response = globalTranslation.loginFail;
                this.elFieldLogin.focus();
                break;
            case 'empty_email':
                response = globalTranslation.emptyField;
                this.elFieldLogin.focus();
                break;
            case 'empty_password':
                response = globalTranslation.emptyField;
                this.elFieldPassword.focus();
                break;
            default:
                wbUrl.buildUrl('admin');
                break;
        }

        window.notification.add({
            'text': response,
            'color': 'red'
        });
    }
}

export {
    Login
};