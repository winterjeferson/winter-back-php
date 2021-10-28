class Form {
    constructor() {
        this.cssDisabled = 'button--blue--disabled';
    }

    build() {
        if (!window.helper.getUrlWord('form')) return;

        this.update();
        this.buildMenu();
    }

    update() {
        this.elPage = document.querySelector('#pageForm');
        this.elForm = this.elPage.querySelector('.form');
        this.elFormFieldEmail = this.elForm.querySelector('[data-id="email"]');
        this.elFormFieldMessage = this.elForm.querySelector('[data-id="message"]');
        this.elButtonSend = this.elPage.querySelector('#pageFormBtSend');
    }

    buildMenu() {
        this.elButtonSend.addEventListener('click', () => {
            if (window.form.validateEmpty([this.elFormFieldEmail, this.elFormFieldMessage])) {
                this.send();
            }
        });
    }

    send() {
        const getData = JSON.stringify(this.getData());
        const controller = window.wbUrl.getController({
            'folder': 'form',
            'file': 'FormAjax'
        });
        const parameter =
            '&method=sendForm' +
            `&data=${getData}`;
        const obj = {
            controller,
            parameter
        };
        let data = wbHelper.ajax(obj);

        this.elButtonSend.classList.add(this.cssDisabled);

        data.then((result) => {
            this.sendSuccess(result);
        });
    }

    sendSuccess(data) {
        let response = '';
        let color = '';

        this.elButtonSend.classList.remove(this.cssDisabled);

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

        window.notification.add({
            'text': response,
            'color': color
        });
    }

    getData() {
        let arr = [];

        arr.push(this.elForm.querySelector('[data-id="email"]').value);
        arr.push(this.elForm.querySelector('[data-id="message"]').value);

        return arr;
    }
}

export {
    Form
};