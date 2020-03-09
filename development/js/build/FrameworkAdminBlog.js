class FrameworkAdminBlog {
    constructor() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
    }

    applyClass() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        this.updateVariable();
        this.buildMenu();
        this.buildMenuTable();
        this.watchTitle();
    }

    updateVariable() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        this.isEdit = false;
        this.editId = 0;
        this.$page = $('#page_admin_blog');
        this.$table = $(this.$page).find('.table');
        this.$tableActive = $(this.$page).find('[data-id="table_active"]');
        this.$tableInactive = $(this.$page).find('[data-id="table_inactive"]');
        this.$btRegister = $(this.$page).find('[data-id="bt_register"]');
        this.$formRegister = $(this.$page).find('[data-id="form_register"]');
        this.$formFieldTitle = $(this.$page).find('[data-id="field_title"]');
        this.$formFieldUrl = $(this.$page).find('[data-id="field_url"]');
        this.$formFieldContent = $(this.$page).find('[data-id="field_content"]');
        this.$formFieldTag = $(this.$page).find('[data-id="field_tag"]');
    }

    buildMenu() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        this.$btRegister.on('click', function () {
            if (self.isEdit) {
                self.editSave();
            } else {
                self.registerContent();
            }
        });
    }

    buildMenuTable() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        this.$table.find('.bt').unbind();

        this.$tableActive.find('[data-action="inactivate"]').on('click', function () {
            objWFModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
            objWFModal.buildContentConfirmationAction('objFrameworkAdminBlog.modify(' + $(this).attr('data-id') + ', "inactivate")');
        });

        this.$tableInactive.find('[data-action="activate"]').on('click', function () {
            self.modify($(this).attr('data-id'), 'activate');
        });

        this.$table.find('[data-action="edit"]').on('click', function () {
            self.editId = $(this).attr('data-id');
            self.editLoadData(self.editId);
        });

        this.$table.find('[data-action="delete"]').on('click', function () {
            objWFModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
            objWFModal.buildContentConfirmationAction('objFrameworkAdminBlog.delete(' + $(this).attr('data-id') + ')');
        });
    }

    editSave() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        if (this.validateForm()) {
            $.ajax({
                url: objFrameworkUrl.getController(),
                data:
                    '&c=FrameworkAdminBlog' +
                    '&m=doUpdate' +
                    '&title=' + this.$formFieldTitle.val() +
                    '&url=' + this.$formFieldUrl.val() +
                    '&content=' + this.$formFieldContent.val() +
                    '&tag=' + this.$formFieldTag.val() +
                    '&id=' + self.editId,
                type: 'POST',
                success: function (data) {
                    self.showResponse(data);
                }
            });
        }
    }

    editLoadData(id) {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        $.ajax({
            url: objFrameworkUrl.getController(),
            data:
                '&c=FrameworkAdminBlog' +
                '&m=editLoadData' +
                '&id=' + id,
            type: 'POST',
            success: function (data) {
                let obj = $.parseJSON(data);

                // objTheme.doSlide(self.$formRegister);
                // var target = self.$formRegister;
                // self.scrollTo(document.scrollingElement || document.documentElement, "scrollTop", "", 0, target.offsetTop, 2000, true);
                self.isEdit = true;
                self.editFillField(obj);
            }
        });
    }

    // scrollTo(elem, style, unit, from, to, time, prop) {
    //     if (!elem) {
    //         return;
    //     }
    //     var start = new Date().getTime(),
    //         timer = setInterval(function () {
    //             var step = Math.min(1, (new Date().getTime() - start) / time);
    //             if (prop) {
    //                 elem[style] = (from + step * (to - from)) + unit;
    //             } else {
    //                 elem.style[style] = (from + step * (to - from)) + unit;
    //             }
    //             if (step === 1) {
    //                 clearInterval(timer);
    //             }
    //         }, 25);
    //     if (prop) {
    //         elem[style] = from + unit;
    //     } else {
    //         elem.style[style] = from + unit;
    //     }
    // }

    editFillField(json) {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$formFieldTitle.val(json['title']);
        this.$formFieldUrl.val(json['url']);
        this.$formFieldContent.val(json['content']);
        this.$formFieldTag.val(json['tag']);

        this.editId = json['id'];
    }

    modify(id, status) {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        $.ajax({
            url: objFrameworkUrl.getController(),
            data:
                '&c=FrameworkAdminBlog' +
                '&m=doModify' +
                '&s=' + status +
                '&id=' + Number(id),
            type: 'POST',
            success: function (data) {

                self.showResponse(data);
            }
        });
    }

    delete(id) {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        $.ajax({
            url: objFrameworkUrl.getController(),
            data:
                '&c=FrameworkAdminBlog' +
                '&m=doDelete' +
                '&id=' + Number(id),
            type: 'POST',
            success: function (data) {
                self.showResponse(data);
            }
        });
    }

    validateForm() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        let arrField = [this.$formFieldTitle, this.$formFieldUrl, this.$formFieldContent, this.$formFieldTag];

        return objFrameworkForm.validateEmpty(arrField);
    }

    registerContent() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        if (this.validateForm()) {
            $.ajax({
                url: objFrameworkUrl.getController(),
                data:
                    '&c=FrameworkAdminBlog' +
                    '&m=doRegister' +
                    '&title=' + this.$formFieldTitle.val() +
                    '&url=' + this.$formFieldUrl.val() +
                    '&content=' + this.$formFieldContent.val() +
                    '&tag=' + this.$formFieldTag.val(),
                type: 'POST',
                success: function (data) {
                    self.showResponse(data);
                }
            });
        }
    }

    showResponse(data) {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
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

        objFrameworkNotification.addNotification(response, color);
    }

    watchTitle() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        this.$formFieldTitle.on('focusout', function () {
            let url = objFrameworkUrl.buildSEO(self.$formFieldTitle.val());

            self.$formFieldUrl.val(url);
        });
    }
}