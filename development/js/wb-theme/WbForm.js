class WbForm {
    build() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('form')) {
            return;
        }

        this.update();
        this.buildMenu();
    }

    update() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$page = document.querySelector('#pageForm');
        this.$form = this.$page.querySelector('.form');
        this.$formFieldEmail = this.$form.querySelector('[data-id="email"]');
        this.$formFieldMessage = this.$form.querySelector('[data-id="message"]');
        this.$btSend = this.$page.querySelector('#pageFormBtSend');
    }

    buildMenu() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        const self = this;

        this.$btSend.addEventListener('click', function (event) {
            if (objWfForm.validateEmpty([self.$formFieldEmail, self.$formFieldMessage])) {
                self.send();
            }
        });
    }

    send() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        const self = this;
        const ajax = new XMLHttpRequest();
        const url = objWbUrl.getController({ 'folder': 'form', 'file': 'FormAjax' });
        let parameter =
            '&method=sendForm' +
            '&data=' + JSON.stringify(self.getData()) +
            '&token=' + globalToken;

        this.$btSend.setAttribute('disabled', 'disabled');
        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.$btSend.removeAttribute('disabled');
                self.response(ajax.responseText);
            }
        }

        ajax.send(parameter);
    }

    getData() {
         /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let arr = [];

        arr.push(this.$form.querySelector('[data-id="email"]').value);
        arr.push(this.$form.querySelector('[data-id="message"]').value);

        return arr;
    }

    response(data) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let response = '';
        let color = '';

        switch (data) {
            case 'ok':
                color = 'green';
                response = globalTranslation.formSent;
                break;
            default:
                color = 'red';
                response = globalTranslation.formProblemSend;
                break;
        }

        objWfNotification.add(response, color, this.$form);
    }
}