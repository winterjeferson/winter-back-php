class WBPAdminBlog {
    constructor() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
    }

    build() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('admin-blog')) {
            return;
        }

        this.updateVariable();
        this.buildMenu();
        this.buildMenuTable();
        this.watchTitle();
    }

    updateVariable() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        this.isEdit = false;
        this.editId = 0;
        this.$page = document.querySelector('#page_admin_blog');
        this.$formRegister = this.$page.querySelector('[data-id="form_register"]');
        this.$formFieldTitle = this.$page.querySelector('[data-id="field_title"]');
        this.$formFieldUrl = this.$page.querySelector('[data-id="field_url"]');
        this.$formFieldContent = this.$page.querySelector('[data-id="field_content"]');
        this.$formFieldTag = this.$page.querySelector('[data-id="field_tag"]');
    }

    buildMenu() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
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
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let $table = this.$page.querySelectorAll('.table');
        let $tableActive = this.$page.querySelectorAll('[data-id="table_active"]');
        let $tableInactive = this.$page.querySelectorAll('[data-id="table_inactive"]');

        Array.prototype.forEach.call($tableActive, function (table) {
            let $button = table.querySelectorAll('[data-action="inactivate"]');

            Array.prototype.forEach.call($button, function (item) {
                item.onclick = function () {
                    objWFModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
                    objWFModal.buildContentConfirmationAction('objWBPAdminBlog.modify(' + item.getAttribute('data-id') + ', "inactivate")');
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
                    objWFModal.buildContentConfirmationAction('objWBPAdminBlog.delete(' + item.getAttribute('data-id') + ')');
                }
            });
        });
    }

    editSave() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWBPUrl.getController();
        let param = '&c=WBPAdminBlog' + '&m=doUpdate' + '&title=' + this.$formFieldTitle.value + '&url=' + this.$formFieldUrl.value + '&content=' + this.$formFieldContent.value + '&tag=' + this.$formFieldTag.value + '&id=' + self.editId;

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
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWBPUrl.getController();
        let param = '&c=WBPAdminBlog' + '&m=editLoadData' + '&id=' + id;

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

    editFillField(json) {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$formFieldTitle.value = json['title'];
        this.$formFieldUrl.value = json['url'];
        this.$formFieldContent.value = json['content'];
        this.$formFieldTag.value = json['tag'];
        this.editId = json['id'];
    }

    modify(id, status) {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWBPUrl.getController();
        let param = '&c=WBPAdminBlog' + '&m=doModify' + '&status=' + status + '&id=' + id;

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
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWBPUrl.getController();
        let param = '&c=WBPAdminBlog' + '&m=doDelete' + '&id=' + id;

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
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let arrField = [this.$formFieldTitle, this.$formFieldUrl, this.$formFieldContent, this.$formFieldTag];

        return objWFForm.validateEmpty(arrField);
    }

    registerContent() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        if (!this.validateForm()) {
            return;
        }

        let ajax = new XMLHttpRequest();
        let url = objWBPUrl.getController();
        let param = '&c=WBPAdminBlog' + '&m=doRegister' + '&title=' + this.$formFieldTitle.value + '&url=' + this.$formFieldUrl.value + '&content=' + this.$formFieldContent.value + '&tag=' + this.$formFieldTag.value;

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
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
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

        objWBPNotification.addNotification(response, color);
    }

    watchTitle() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        this.$formFieldTitle.addEventListener('focusout', function () {
            let url = objWBPUrl.buildSEO(self.$formFieldTitle.value);

            self.$formFieldUrl.value = url;
        });
    }
}