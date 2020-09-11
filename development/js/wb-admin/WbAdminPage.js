class WbAdminPage {
    build() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('admin/page')) {
            return;
        }

        CKEDITOR.replace('fieldContent', {
        });

        CKEDITOR.config.basicEntities = false;
        CKEDITOR.config.entities_greek = false; 
        CKEDITOR.config.entities_latin = false; 
        CKEDITOR.config.entities_additional = '';

        this.update();
        this.buildMenu();
        this.buildMenuTable();
        objWbUrl.watch(this.$formFieldTitle, this.$formFieldUrl);
    }

    update() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.isEdit = false;
        this.editId = 0;
        this.$page = document.querySelector('#pageAdminPageEdit');
        this.$ckEditor = CKEDITOR.instances.fieldContent;
        this.$contentList = document.querySelector('#pageAdminPageList');
        this.$formFieldMenu = this.$page.querySelector('[data-id="formFieldMenu"]');
        this.$formFieldTitle = this.$page.querySelector('[data-id="formFieldTitle"]');
        this.$formFieldUrl = this.$page.querySelector('[data-id="formFieldUrl"]');
        this.$btRegister = this.$page.querySelector('[data-id="btRegister"]');
    }

    buildMenu() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        const self = this;

        this.$btRegister.onclick = function () {
            if (!self.validateForm()) {
                return;
            }

            if (self.isEdit) {
                self.editSave();
            } else {
                self.saveContent();
            }
        }
    }

    buildMenuTable() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        const self = this;
        const $table = this.$contentList.querySelectorAll('.table');
        const $tableActive = this.$contentList.querySelectorAll('[data-id="tableActive"]');
        const $tableInactive = this.$contentList.querySelectorAll('[data-id="tableInactive"]');

        Array.prototype.forEach.call($tableActive, function (table) {
            let $button = table.querySelectorAll('[data-action="inactivate"]');

            Array.prototype.forEach.call($button, function (item) {
                item.onclick = function () {
                    objWfModal.buildModal('confirmation', globalTranslation.confirmationInactivate);
                    objWfModal.buildContentConfirmationAction('objWbAdminPage.modify(' + item.getAttribute('data-id') + ', "inactivate")');
                }
            });
        });

        Array.prototype.forEach.call($tableInactive, function (table) {
            let $button = table.querySelectorAll('[data-action="activate"]');

            Array.prototype.forEach.call($button, function (item) {
                item.onclick = function () {
                    self.modify(item.getAttribute('data-id'), 'activate');
                }
            });
        });

        Array.prototype.forEach.call($table, function (table) {
            let $buttonEdit = table.querySelectorAll('[data-action="edit"]');
            let $buttonDelete = table.querySelectorAll('[data-action="delete"]');

            Array.prototype.forEach.call($buttonEdit, function (item) {
                item.onclick = function () {
                    self.editId = item.getAttribute('data-id');
                    self.editLoadData(self.editId);
                }
            });

            Array.prototype.forEach.call($buttonDelete, function (item) {
                item.onclick = function () {
                    objWfModal.buildModal('confirmation', globalTranslation.confirmationDelete);
                    objWfModal.buildContentConfirmationAction('objWbAdminPage.delete(' + item.getAttribute('data-id') + ')');
                }
            });
        });
    }

    validateForm() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let arrField = [
            this.$formFieldMenu,
            this.$formFieldTitle
        ];

        return objWfForm.validateEmpty(arrField);
    }

    saveContent() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController({ 'folder': 'admin', 'file': 'PageAjax' });
        let parameter =
            '&action=doSave' +
            this.buildParameter() +
            '&token=' + globalToken;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                objWbAdmin.showResponse(ajax.responseText);
            }
        }

        ajax.send(parameter);
    }

    editSave() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        const self = this;
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController({ 'folder': 'admin', 'file': 'PageAjax' });
        let parameter =
            '&action=doUpdate' +
            '&id=' + self.editId +
            this.buildParameter() +
            '&token=' + globalToken;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                objWbAdmin.showResponse(ajax.responseText);
            }
        }

        ajax.send(parameter);
    }

    editLoadData(id) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController({ 'folder': 'admin', 'file': 'PageAjax' });
        let parameter =
            '&action=' + 'editLoadData' +
            '&id=' + id +
            '&token=' + globalToken;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                let obj = JSON.parse(ajax.responseText);

                document.documentElement.scrollTop = 0;
                self.isEdit = true;
                self.editFillField(obj);
            }
        }

        ajax.send(parameter);
    }

    editFillField(obj) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$formFieldTitle.value = obj['title_' + globalLanguage];
        this.$formFieldUrl.value = obj['url_' + globalLanguage];
        this.$formFieldMenu.value = obj['menu_' + globalLanguage];
        this.editId = obj['id'];

        this.$ckEditor.setData(obj['content_' + globalLanguage], function () {
            this.checkDirty();
        });
    }

    buildParameter() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        return '' +
            '&title=' + this.$formFieldTitle.value +
            '&url=' + this.$formFieldUrl.value +
            '&menu=' + this.$formFieldMenu.value +
            '&content=' + this.$ckEditor.getData()
    }

    modify(id, status) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController({ 'folder': 'admin', 'file': 'PageAjax' });
        let parameter =
            '&action=doModify' +
            '&status=' + status +
            '&id=' + id +
            '&token=' + globalToken;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                objWbAdmin.showResponse(ajax.responseText);
            }
        }

        ajax.send(parameter);
    }

    delete(id) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController({ 'folder': 'admin', 'file': 'PageAjax' });
        let parameter =
            '&action=doDelete' +
            '&id=' + id +
            '&token=' + globalToken;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                objWbAdmin.showResponse(ajax.responseText);
            }
        }

        ajax.send(parameter);
    }
}