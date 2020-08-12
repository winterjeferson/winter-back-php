class WbLogin {
    build() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('login')) {
            return;
        }

        this.update();
        this.buildMenu();
    }

    update() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.isSignUp = false;

        this.$page = document.querySelector('#pageAdminLogin');
        this.$buttonLogin = document.querySelector('#pageAdminLoginBt');
        this.$fielEmail = document.querySelector('#pageAdminLoginUser');
        this.$fieldPassword = document.querySelector('#pageAdminLoginPassword');
    }

    buildMenu() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        this.$buttonLogin.addEventListener('click', function (event) {
            self.buildLogin();
        });
    }

    validate() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        if (this.$fielEmail.value === '') {
            this.$fielEmail.focus();
            this.buildLoginResponse('empty_email');
            return;
        }

        if (this.$fieldPassword.value === '') {
            this.$fieldPassword.focus();
            this.buildLoginResponse('empty_password');
            return;
        }

        return true;
    }

    buildLogin() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController({ 'folder': 'admin', 'file': 'LoginAjax' });
        let parameter =
            '&email=' + this.$fielEmail.value +
            '&password=' + this.$fieldPassword.value +
            '&token=' + globalToken;

        if (!this.validate()) {
            return;
        }

        this.$buttonLogin.setAttribute('disabled', 'disabled');
        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.$buttonLogin.removeAttribute('disabled');
                self.buildLoginResponse(ajax.responseText);
            }
        }

        ajax.send(parameter);
    }

    buildLoginResponse(data) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let response = '';
        let $responseElement = this.$page.querySelector('.form');

        switch (data) {
            case 'inactive':
                response = globalTranslation.loginInactive;
                break;
            case 'problem':
                response = globalTranslation.loginFail;
                this.$fielEmail.focus();
                break;
            case 'empty_email':
                response = globalTranslation.emptyField;
                this.$fielEmail.focus();
                break;
            case 'empty_password':
                response = globalTranslation.emptyField;
                this.$fieldPassword.focus();
                break;
            default:
                objWbUrl.build('admin');
                break;
        }

        objWfNotification.add(response, 'red', $responseElement);
    }
}