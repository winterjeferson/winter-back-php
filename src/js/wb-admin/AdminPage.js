class AdminPage {
    build() {
        if (!window.helper.getUrlWord('admin/page')) return;

        admin.setCKEditor();
        this.update();
        this.buildMenu();
        this.buildMenuTable();
        window.wbUrl.watch(this.elFormFieldTitle, this.elFormFieldUrl);
    }

    buildMenu() {
        this.elButtonRegister.onclick = () => {
            if (!this.validateForm()) return;
            this.isEdit ? this.editSave() : this.saveContent();
        };
    }

    buildMenuTable() {
        const elTable = this.elContentList.querySelectorAll('.table');
        const elTableActive = this.elContentList.querySelectorAll('[data-id="tableActive"]');
        const elTableInactive = this.elContentList.querySelectorAll('[data-id="tableInactive"]');

        Array.prototype.forEach.call(elTableActive, (table) => {
            this.buildMenuTableActive(table);
        });

        Array.prototype.forEach.call(elTableInactive, (table) => {
            this.buildMenuTableInactive(table);
        });

        Array.prototype.forEach.call(elTable, (table) => {
            this.buildMenuTableDefault(table);
        });
    }

    buildMenuTableActive(table) {
        let elButton = table.querySelectorAll('[data-action="inactivate"]');

        Array.prototype.forEach.call(elButton, (item) => {
            item.onclick = () => {
                window.modal.buildModal({
                    'kind': 'confirmation',
                    'content': globalTranslation.confirmationInactivate,
                    'size': 'small',
                    'click': `window.adminPage.modify(${item.getAttribute('data-id')}, "inactivate")`
                });
            };
        });
    }

    buildMenuTableInactive(table) {
        let elButton = table.querySelectorAll('[data-action="activate"]');

        Array.prototype.forEach.call(elButton, (item) => {
            item.onclick = () => {
                this.modify(item.getAttribute('data-id'), 'activate');
            };
        });
    }

    buildMenuTableDefault(table) {
        let elButtonEdit = table.querySelectorAll('[data-action="edit"]');
        let elButtonDelete = table.querySelectorAll('[data-action="delete"]');

        Array.prototype.forEach.call(elButtonEdit, (item) => {
            item.onclick = () => {
                this.editId = item.getAttribute('data-id');
                this.editLoadData(this.editId);
            };
        });

        Array.prototype.forEach.call(elButtonDelete, (item) => {
            item.onclick = () => {
                window.modal.buildModal({
                    'kind': 'confirmation',
                    'content': globalTranslation.confirmationDelete,
                    'size': 'small',
                    'click': `window.adminPage.delete(${item.getAttribute('data-id')})`
                });
            };
        });
    }

    buildParameter() {
        const parameter =
            `&title=${this.elFormFieldTitle.value}` +
            `&url=${this.elFormFieldUrl.value}` +
            `&menu=${this.elFormFieldMenu.value}` +
            `&content=${this.elCkEditor.getData()}`;

        return parameter;
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
        this.isEdit = true;
        this.editFillField(obj);
    }

    editFillField(obj) {
        this.elFormFieldTitle.value = obj[`title_${globalLanguage}`];
        this.elFormFieldUrl.value = obj[`url_${globalLanguage}`];
        this.elFormFieldMenu.value = obj[`menu_${globalLanguage}`];
        this.editId = obj['id'];

        this.elCkEditor.setData(obj[`content_${globalLanguage}`], () => {
            this.elCkEditor.checkDirty();
        });
    }

    getController() {
        const controller = wbUrl.getController({
            'folder': 'admin',
            'file': 'PageAjax'
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

    update() {
        this.elPage = document.querySelector('#pageAdminPageEdit');
        this.elCkEditor = CKEDITOR.instances.fieldContent;
        this.elContentList = document.querySelector('#pageAdminPageList');
        this.elFormFieldMenu = this.elPage.querySelector('[data-id="formFieldMenu"]');
        this.elFormFieldTitle = this.elPage.querySelector('[data-id="formFieldTitle"]');
        this.elFormFieldUrl = this.elPage.querySelector('[data-id="formFieldUrl"]');
        this.elButtonRegister = this.elPage.querySelector('#btRegister');

        this.isEdit = false;
        this.editId = 0;
    }

    validateForm() {
        let arrField = [
            this.elFormFieldMenu,
            this.elFormFieldTitle
        ];

        return window.form.validateEmpty(arrField);
    }
}

export {
    AdminPage
};