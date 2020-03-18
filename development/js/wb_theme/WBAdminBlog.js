class WBAdminBlog {
    constructor() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
    }

    build() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('admin-blog')) {
            return;
        }

        this.updateVariable();
        this.buildMenu();
        this.buildMenuTable();
        this.watchTitle();
    }

    updateVariable() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        this.isEdit = false;
        this.editId = 0;
        this.$page = document.querySelector('#page_admin_blog');
        this.$formRegister = this.$page.querySelector('[data-id="form_register"]');
        this.$formFieldTitlePt = this.$page.querySelector('[data-id="field_title_pt"]');
        this.$formFieldTitleEn = this.$page.querySelector('[data-id="field_title_en"]');
        this.$formFieldUrlPt = this.$page.querySelector('[data-id="field_url_pt"]');
        this.$formFieldUrlEn = this.$page.querySelector('[data-id="field_url_en"]');
        this.$formFieldContentPt = this.$page.querySelector('[data-id="field_content_pt"]');
        this.$formFieldContentEn = this.$page.querySelector('[data-id="field_content_en"]');
        this.$formFieldTagPt = this.$page.querySelector('[data-id="field_tag_pt"]');
        this.$formFieldTagEn = this.$page.querySelector('[data-id="field_tag_en"]');
        this.$formFieldDatePostPt = this.$page.querySelector('[data-id="field_date_post_pt"]');
        this.$formFieldDatePostEn = this.$page.querySelector('[data-id="field_date_post_en"]');
        this.$formFieldDateEditPt = this.$page.querySelector('[data-id="field_date_edit_pt"]');
        this.$formFieldDateEditEn = this.$page.querySelector('[data-id="field_date_edit_en"]');
        this.$formFieldTagEn = this.$page.querySelector('[data-id="field_tag_en"]');
    }

    buildMenu() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let $btRegister = this.$page.querySelector('[data-id="bt_register"]');

        $btRegister.onclick = function () {
            if (self.isEdit) {
                self.editSave();
            } else {
                self.registerContent();
            }
        }
    }

    buildMenuTable() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let $table = this.$page.querySelectorAll('.table');
        let $tableActive = this.$page.querySelectorAll('[data-id="table_active"]');
        let $tableInactive = this.$page.querySelectorAll('[data-id="table_inactive"]');

        Array.prototype.forEach.call($tableActive, function (table) {
            let $button = table.querySelectorAll('[data-action="inactivate"]');

            Array.prototype.forEach.call($button, function (item) {
                item.onclick = function () {
                    objWFModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
                    objWFModal.buildContentConfirmationAction('objWBAdminBlog.modify(' + item.getAttribute('data-id') + ', "inactivate")');
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
                    objWFModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
                    objWFModal.buildContentConfirmationAction('objWBAdminBlog.delete(' + item.getAttribute('data-id') + ')');
                }
            });
        });
    }

    editSave() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWBUrl.getController();
        let param =
            '&c=WBAdminBlog' +
            '&m=doUpdate' +
            '&titlePt=' + this.$formFieldTitlePt.value +
            '&titleEn=' + this.$formFieldTitleEn.value +
            '&urlPt=' + this.$formFieldUrlPt.value +
            '&urlEn=' + this.$formFieldUrlEn.value +
            '&contentPt=' + this.$formFieldContentPt.value +
            '&contentEn=' + this.$formFieldContentEn.value +
            '&tagPt=' + this.$formFieldTagPt.value +
            '&tagEn=' + this.$formFieldTagEn.value +
            '&datePostPt=' + this.$formFieldDatePostPt.value +
            '&datePostEn=' + this.$formFieldDatePostEn.value +
            '&dateEditPt=' + this.$formFieldDateEditPt.value +
            '&dateEditEn=' + this.$formFieldDateEditEn.value +
            '&id=' + self.editId;

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

        ajax.send(param);
    }

    editLoadData(id) {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWBUrl.getController();
        let param = '&c=WBAdminBlog' + '&m=editLoadData' + '&id=' + id;

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

        ajax.send(param);
    }

    editFillField(obj) {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$formFieldTitlePt.value = obj['title_pt'];
        this.$formFieldTitleEn.value = obj['title_en'];
        this.$formFieldUrlPt.value = obj['url_pt'];
        this.$formFieldUrlEn.value = obj['url_en'];
        this.$formFieldContentPt.value = obj['content_pt'];
        this.$formFieldContentEn.value = obj['content_en'];
        this.$formFieldTagPt.value = obj['tag_pt'];
        this.$formFieldTagEn.value = obj['tag_en'];
        this.$formFieldDatePostPt.value = obj['date_post_pt'].substring(0, 10);
        this.$formFieldDatePostEn.value = obj['date_post_en'].substring(0, 10);
        this.$formFieldDateEditPt.value = obj['date_edit_pt'].substring(0, 10);
        this.$formFieldDateEditEn.value = obj['date_edit_en'].substring(0, 10);
        this.editId = obj['id'];
        this.$formFieldTagEn.value = obj['tag_en'];
    }

    modify(id, status) {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWBUrl.getController();
        let param = '&c=WBAdminBlog' + '&m=doModify' + '&status=' + status + '&id=' + id;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.showResponse(ajax.responseText);
            }
        }

        ajax.send(param);
    }

    delete(id) {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWBUrl.getController();
        let param = '&c=WBAdminBlog' + '&m=doDelete' + '&id=' + id;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.showResponse(ajax.responseText);
            }
        }

        ajax.send(param);
    }

    validateForm() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        let arrField = [
            this.$formFieldTitlePt,
            this.$formFieldTitleEn,
            this.$formFieldUrlPt,
            this.$formFieldUrlEn,
            this.$formFieldContentPt,
            this.$formFieldContentEn
        ];

        return objWFForm.validateEmpty(arrField);
    }

    registerContent() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        if (!this.validateForm()) {
            return;
        }

        let ajax = new XMLHttpRequest();
        let url = objWBUrl.getController();
        let param =
            '&c=WBAdminBlog' +
            '&m=doRegister' +
            '&titlePt=' + this.$formFieldTitlePt.value +
            '&titleEn=' + this.$formFieldTitleEn.value +
            '&urlPt=' + this.$formFieldUrlPt.value +
            '&urlEn=' + this.$formFieldUrlEn.value +
            '&contentPt=' + this.$formFieldContentPt.value +
            '&contentEn=' + this.$formFieldContentEn.value +
            '&datePostPt=' + this.$formFieldDatePostPt.value +
            '&datePostEn=' + this.$formFieldDatePostEn.value +
            '&dateEditPt=' + this.$formFieldDateEditPt.value +
            '&dateEditEn=' + this.$formFieldDateEditEn.value +
            '&tagPt=' + this.$formFieldTagPt.value +
            '&tagEn=' + this.$formFieldTagEn.value;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.showResponse(ajax.responseText);
            }
        }

        ajax.send(param);
    }

    showResponse(data) {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
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

        objWFNotification.add(response, color);
    }

    watchTitle() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        this.$formFieldTitlePt.addEventListener('focusout', function () {
            let url = objWBUrl.buildSEO(self.$formFieldTitlePt.value);

            self.$formFieldUrlPt.value = url;
        });

        this.$formFieldTitleEn.addEventListener('focusout', function () {
            let url = objWBUrl.buildSEO(self.$formFieldTitleEn.value);

            self.$formFieldUrlEn.value = url;
        });
    }
}