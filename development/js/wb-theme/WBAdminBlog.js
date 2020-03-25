class WbAdminBlog {
    constructor() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
    }

    build() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('admin-blog')) {
            return;
        }

        CKEDITOR.replace('fieldContentPt');
        CKEDITOR.replace('fieldContentEn');

        this.updateVariable();
        this.buildMenu();
        this.buildMenuTable();
        this.watchTitle();
    }

    updateVariable() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.isEdit = false;
        this.editId = 0;
        this.$page = document.querySelector('#pageAdminBlog');
        this.$formRegister = this.$page.querySelector('[data-id="formRegister"]');
        this.$formFieldTitlePt = this.$page.querySelector('[data-id="fieldTitlePt"]');
        this.$formFieldTitleEn = this.$page.querySelector('[data-id="fieldTitleEn"]');
        this.$formFieldUrlPt = this.$page.querySelector('[data-id="fieldUrlPt"]');
        this.$formFieldUrlEn = this.$page.querySelector('[data-id="fieldUrlEn"]');
        this.$formFieldContentPt = this.$page.querySelector('[data-id="fieldContentPt"]');
        this.$formFieldContentEn = this.$page.querySelector('[data-id="fieldContentEn"]');
        this.$formFieldTagPt = this.$page.querySelector('[data-id="fieldTagPt"]');
        this.$formFieldTagEn = this.$page.querySelector('[data-id="fieldTagEn"]');
        this.$formFieldDatePostPt = this.$page.querySelector('[data-id="fieldDatePostPt"]');
        this.$formFieldDatePostEn = this.$page.querySelector('[data-id="fieldDatePostEn"]');
        this.$formFieldDateEditPt = this.$page.querySelector('[data-id="fieldDateEditPt"]');
        this.$formFieldDateEditEn = this.$page.querySelector('[data-id="fieldDateEditEn"]');
        this.$formFieldTagEn = this.$page.querySelector('[data-id="fieldTagEn"]');
        this.$ckEditorPt = CKEDITOR.instances.fieldContentPt;
        this.$ckEditorEn = CKEDITOR.instances.fieldContentEn;
    }

    buildMenu() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let $btRegister = this.$page.querySelector('[data-id="btRegister"]');

        $btRegister.onclick = function () {
            if (self.isEdit) {
                self.editSave();
            } else {
                self.saveContent();
            }
        }
    }

    buildMenuTable() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let $table = this.$page.querySelectorAll('.table');
        let $tableActive = this.$page.querySelectorAll('[data-id="tableActive"]');
        let $tableInactive = this.$page.querySelectorAll('[data-id="tableInactive"]');

        Array.prototype.forEach.call($tableActive, function (table) {
            let $button = table.querySelectorAll('[data-action="inactivate"]');

            Array.prototype.forEach.call($button, function (item) {
                item.onclick = function () {
                    objWfModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
                    objWfModal.buildContentConfirmationAction('objWbAdminBlog.modify(' + item.getAttribute('data-id') + ', "inactivate")');
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
                    objWfModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
                    objWfModal.buildContentConfirmationAction('objWbAdminBlog.delete(' + item.getAttribute('data-id') + ')');
                }
            });
        });
    }

    editSave() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController();
        let parameter =
            '&c=WbAdminBlog' +
            '&m=doUpdate' +
            '&id=' + self.editId +
            this.buildParameter();

        if (!this.validateForm()) {
            return;
        }

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.showResponse(ajax.responseText);
            }
        }

        ajax.send(parameter);
    }

    editLoadData(id) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController();
        let parameter =
            '&c=WbAdminBlog' +
            '&m=editLoadData' +
            '&id=' + id;

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
        this.$formFieldTitlePt.value = obj['title_pt'];
        this.$formFieldTitleEn.value = obj['title_en'];
        this.$formFieldUrlPt.value = obj['url_pt'];
        this.$formFieldUrlEn.value = obj['url_en'];
        this.$formFieldTagPt.value = obj['tag_pt'];
        this.$formFieldTagEn.value = obj['tag_en'];
        this.$formFieldDatePostPt.value = obj['date_post_pt'].substring(0, 10);
        this.$formFieldDatePostEn.value = obj['date_post_en'].substring(0, 10);
        this.$formFieldDateEditPt.value = obj['date_edit_pt'].substring(0, 10);
        this.$formFieldDateEditEn.value = obj['date_edit_en'].substring(0, 10);
        this.editId = obj['id'];
        this.$formFieldTagEn.value = obj['tag_en'];

        this.$ckEditorPt.setData(obj['content_pt'], function () {
            this.checkDirty();
        });

        this.$ckEditorEn.setData(obj['content_en'], function () {
            this.checkDirty();
        });
    }

    modify(id, status) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController();
        let parameter =
            '&c=WbAdminBlog' +
            '&m=doModify' +
            '&status=' + status +
            '&id=' + id;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.showResponse(ajax.responseText);
            }
        }

        ajax.send(parameter);
    }

    delete(id) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController();
        let parameter =
            '&c=WbAdminBlog' +
            '&m=doDelete' +
            '&id=' + id;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.showResponse(ajax.responseText);
            }
        }

        ajax.send(parameter);
    }

    validateForm() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let arrField = [
            this.$formFieldTitlePt,
            this.$formFieldTitleEn,
            this.$formFieldUrlPt,
            this.$formFieldUrlEn
        ];

        return objWfForm.validateEmpty(arrField);
    }

    buildParameter() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        return '' +
            '&titlePt=' + this.$formFieldTitlePt.value +
            '&titleEn=' + this.$formFieldTitleEn.value +
            '&urlPt=' + this.$formFieldUrlPt.value +
            '&urlEn=' + this.$formFieldUrlEn.value +
            '&contentPt=' + this.$ckEditorPt.getData() +
            '&contentEn=' + this.$ckEditorEn.getData() +
            '&datePostPt=' + this.$formFieldDatePostPt.value +
            '&datePostEn=' + this.$formFieldDatePostEn.value +
            '&dateEditPt=' + this.$formFieldDateEditPt.value +
            '&dateEditEn=' + this.$formFieldDateEditEn.value +
            '&tagPt=' + this.$formFieldTagPt.value +
            '&tagEn=' + this.$formFieldTagEn.value;
    }

    saveContent() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        if (!this.validateForm()) {
            return;
        }

        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController();
        let parameter =
            '&c=WbAdminBlog' +
            '&m=doSave' +
            this.buildParameter();

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.showResponse(ajax.responseText);
            }
        }

        ajax.send(parameter);
    }

    showResponse(data) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let color = '';
        let response = '';

        switch (data) {
            case '1':
                location.reload();
                break;
            default:
                color = 'red';
                response = 'Acorreu um erro. Contate o administrador.';
                break;
        }

        objWfNotification.add(response, color);
    }

    watchTitle() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        this.$formFieldTitlePt.addEventListener('focusout', function () {
            let url = objWbUrl.buildSEO(self.$formFieldTitlePt.value);

            self.$formFieldUrlPt.value = url;
        });

        this.$formFieldTitleEn.addEventListener('focusout', function () {
            let url = objWbUrl.buildSEO(self.$formFieldTitleEn.value);

            self.$formFieldUrlEn.value = url;
        });
    }
}