class WBPLogin {
    constructor() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/

    }

    build() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('admin-login')) {
            return;
        }

        this.update();
        this.buildMenu();
    }

    update() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        this.isSignUp = false;

        this.$page = document.querySelector('#page_admin_login');
        this.$buttonLogin = document.querySelector('#page_admin_login_bt');
        this.$fielEmail = document.querySelector('#page_admin_login_user');
        this.$fieldPassword = document.querySelector('#page_admin_login_password');
    }

    buildMenu() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        this.$buttonLogin.addEventListener('click', function (event) {
            self.buildLogin();
        });
    }

    validate() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
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
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWBPUrl.getController();
        let param = '&c=WBPLogin' + '&m=doLogin' + '&email=' + this.$fielEmail.value + '&password=' + this.$fieldPassword.value;

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

        ajax.send(param);
    }

    buildLoginResponse(data) {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let response = '';
        let $responseElement = this.$page.querySelector('.form');

        switch (data) {
            case 'inactive':
                response = 'precisa traduzir - cadastro inativo';
                // response = globalTranslation.template.login_inactive;
                break;
            case 'problem':
                response = 'precisa traduzir - erro de login';
                // response = globalTranslation.template.login_wrong_email;
                this.$fielEmail.focus();
                break;
            case 'empty_email':
                response = 'precisa traduzir - e-mail vazio';
                // response = globalTranslation.template.login_empty;
                this.$fielEmail.focus();
                break;
            case 'empty_password':
                response = 'precisa traduzir - senha vazia';
                // response = globalTranslation.template.login_empty;
                this.$fieldPassword.focus();
                break;
            default:
                objWBPUrl.build('admin');
                break;
        }

        objWFNotification.add(response, 'red', $responseElement);
    }
}