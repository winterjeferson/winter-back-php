class AdminUser {
    build() {
        if (!window.helper.getUrlWord('admin/user')) return;

        this.updateVariable();
        this.buildMenu();
    }

    buildParameter() {
        const parameter =
            `&name=${this.elFormFieldName.value}` +
            `&email=${this.elFormFieldEmail.value}` +
            `&permission=${this.elFormFieldPermission.value}` +
            `&password=${this.elFormFieldPassword.value}`;

        return parameter;
    }

    buildMenu() {
        let elTable = this.elPage.querySelectorAll('.table');
        let elTableActive = this.elPage.querySelectorAll('[data-id="tableActive"]');
        let elTableInactive = this.elPage.querySelectorAll('[data-id="tableInactive"]');

        this.elFormSend.onclick = () => {
            if (!this.validateForm()) return;
            this.isEdit ? this.editSave() : this.saveContent();
        };

        Array.prototype.forEach.call(elTable, (item) => {
            this.buildMenuEdit(item);
            this.buildMenuDelete(item);
        });

        Array.prototype.forEach.call(elTableActive, (item) => {
            this.buildMenuInactivate(item);
        });

        Array.prototype.forEach.call(elTableInactive, (item) => {
            this.buildMenuActivate(item);
        });
    }

    buildMenuActivate(table) {
        const elButton = table.querySelectorAll('[data-action="activate"]');

        Array.prototype.forEach.call(elButton, (item) => {
            item.onclick = () => {
                this.modify(item.getAttribute('data-id'), 'activate');
            };
        });
    }

    buildMenuInactivate(table) {
        const elButton = table.querySelectorAll('[data-action="inactivate"]');

        Array.prototype.forEach.call(elButton, (item) => {
            item.onclick = () => {
                window.modal.buildModal({
                    'kind': 'confirmation',
                    'content': globalTranslation.confirmationInactivate,
                    'size': 'small',
                    'click': `window.adminUser.modify(${item.getAttribute('data-id')}, 'inactivate')`
                });
            };
        });
    }

    buildMenuEdit(table) {
        const elButtonEdit = table.querySelectorAll('[data-action="edit"]');

        Array.prototype.forEach.call(elButtonEdit, (item) => {
            item.onclick = () => {
                this.editId = item.getAttribute('data-id');
                this.editLoadData(this.editId);
            };
        });
    }

    buildMenuDelete(table) {
        const elButtonDelete = table.querySelectorAll('[data-action="delete"]');

        Array.prototype.forEach.call(elButtonDelete, (item) => {
            item.onclick = () => {
                window.modal.buildModal({
                    'kind': 'confirmation',
                    'content': globalTranslation.confirmationDelete,
                    'size': 'small',
                    'click': `window.adminUser.delete(${item.getAttribute('data-id')})`
                });
            };
        });
    }

    delete(id) {
        const parameter =
            '&action=doDelete' +
            `&id=${id}`;
        const obj = {
            controller: this.getController(),
            parameter
        };
        let data = wbHelper.ajax(obj);

        data.then((result) => {
            admin.showResponse(result);
        });
    }

    editLoadData(id) {
        const parameter =
            '&action=editLoadData' +
            `&id=${id}`;
        const obj = {
            controller: this.getController(),
            parameter
        };
        let data = wbHelper.ajax(obj);

        data.then((result) => {
            this.editLoadDataSuccess(result);
        });
    }

    editLoadDataSuccess(data) {
        let obj = JSON.parse(data);

        document.documentElement.scrollTop = 0;
        this.editFillField(obj);
    }

    editFillField(obj) {
        this.isEdit = true;
        this.elFormFieldName.value = obj['name'];
        this.elFormFieldEmail.value = obj['email'];
        this.elFormFieldPassword.value = '';
        this.editId = obj['id'];
        this.elFormFieldPermission.value = obj['permission'];
    }

    editSave() {
        const parameter =
            '&action=doUpdate' +
            `&id=${this.editId}` +
            this.buildParameter();
        const obj = {
            controller: this.getController(),
            parameter
        };
        let data = wbHelper.ajax(obj);

        data.then((result) => {
            admin.showResponse(result);
        });
    }

    getController() {
        const controller = wbUrl.getController({
            'folder': 'admin',
            'file': 'UserAjax'
        });

        return controller;
    }

    modify(id, status) {
        const parameter =
            '&action=doModify' +
            `&status=${status}` +
            `&id=${id}`;
        const obj = {
            controller: this.getController(),
            parameter
        };
        let data = wbHelper.ajax(obj);

        data.then((result) => {
            admin.showResponse(result);
        });
    }

    saveContent() {
        const parameter =
            '&action=doSave' +
            this.buildParameter();
        const obj = {
            controller: this.getController(),
            parameter
        };
        let data = wbHelper.ajax(obj);

        data.then((result) => {
            admin.showResponse(result);
        });
    }

    updateVariable() {
        this.isEdit = false;
        this.editId = 0;

        this.elPage = document.querySelector('#pageAdminUser');
        this.elForm = document.querySelector('#form');
        this.elFormFieldName = document.querySelector('#form_name');
        this.elFormFieldEmail = document.querySelector('#form_email');
        this.elFormFieldPassword = document.querySelector('#form_password');
        this.elFormFieldPermission = document.querySelector('#form_permission');
        this.elFormSend = document.querySelector('#form_button_send');
    }

    validateForm() {
        let arrField = [
            this.elFormFieldEmail,
            this.elFormFieldPassword
        ];

        return window.form.validateEmpty(arrField);
    }
}

export {
    AdminUser
};