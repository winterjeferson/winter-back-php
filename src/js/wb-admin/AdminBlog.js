class AdminBlog {
    build() {
        if (!window.helper.getUrlWord('admin/blog')) return;

        admin.setCKEditor();
        this.update();
        this.buildMenu();
        this.buildMenuTable();
        this.buildMenuThumbnail();
        window.wbUrl.watch(this.elFormFieldTitle, this.elFormFieldUrl);
    }

    buildMenu() {
        this.elButtonRegister.onclick = () => {
            if (!this.validateForm()) return;
            this.isEdit ? this.editSave() : this.saveContent();
        };
    }

    buildMenuThumbnail() {
        const elTarget = this.elContentEditThumbnail.querySelectorAll('.table');

        Array.prototype.forEach.call(elTarget, (table) => {
            this.buildMenuThumbnailButton(table);
        });
    }

    buildMenuThumbnailButton(table) {
        const elButton = table.querySelectorAll('[data-action="edit"]');

        Array.prototype.forEach.call(elButton, (item) => {
            item.onclick = () => {
                const content = window.wbUrl.getController({
                    'folder': 'admin',
                    'file': 'BlogThumbnail'
                });

                window.modal.buildModal({
                    'kind': 'ajax',
                    content,
                    'size': 'extra-big'
                });
            };
        });
    }

    buildMenuTableActive(table) {
        const elButton = table.querySelectorAll('[data-action="inactivate"]');

        Array.prototype.forEach.call(elButton, (item) => {
            item.onclick = () => {
                window.modal.buildModal({
                    'kind': 'confirmation',
                    'content': globalTranslation.confirmationInactivate,
                    'size': 'small',
                    'click': `window.adminBlog.modify(${item.getAttribute('data-id')}, 'inactivate')`
                });
            };
        });
    }

    buildMenuTableInactive(table) {
        const elButton = table.querySelectorAll('[data-action="activate"]');

        Array.prototype.forEach.call(elButton, (item) => {
            item.onclick = () => {
                this.modify(item.getAttribute('data-id'), 'activate');
            };
        });
    }

    buildMenuTableDefault(table) {
        const elButtonEdit = table.querySelectorAll('[data-action="edit"]');
        const elButtonDelete = table.querySelectorAll('[data-action="delete"]');

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
                    'click': `window.adminBlog.delete(${item.getAttribute('data-id')})`
                });
            };
        });
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

    buildParameter() {
        const thumbnail = this.thumbnail === this.thumbnailDefault ? '' : this.thumbnail;
        const parameter =
            `&title=${this.elFormFieldTitle.value}` +
            `&url=${this.elFormFieldUrl.value}` +
            `&content=${this.elCkEditor.getData()}` +
            `&datePost=${this.elFormFieldDatePost.value}` +
            `&dateEdit=${this.elFormFieldDateEdit.value}` +
            `&authorId=${this.elFormFieldAuthor.value}` +
            `&thumbnail=${thumbnail}` +
            `&tag=${this.elFormFieldTag.value}`;

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
        this.thumbnail = obj['thumbnail'].trim();
        this.modifyThumbnail();
    }

    editFillField(obj) {
        const datePost = obj[`date_post_${globalLanguage}`];
        const dateEdit = obj[`date_edit_${globalLanguage}`];

        this.elFormFieldTitle.value = obj[`title_${globalLanguage}`];
        this.elFormFieldUrl.value = obj[`url_${globalLanguage}`];
        this.elFormFieldTag.value = obj[`tag_${globalLanguage}`];
        this.elFormFieldDatePost.value = datePost !== null ? datePost.substring(0, 10) : datePost;
        this.elFormFieldDateEdit.value = dateEdit !== null ? dateEdit.substring(0, 10) : dateEdit;
        this.editId = obj['id'];
        this.elFormFieldAuthor.value = obj['author_id'];

        this.elCkEditor.setData(obj[`content_${globalLanguage}`], () => {
            this.elCkEditor.checkDirty();
        });
    }

    getController() {
        const controller = wbUrl.getController({
            'folder': 'admin',
            'file': 'BlogAjax'
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

    modifyThumbnail() {
        const elTable = this.elThumbnailWrapper.querySelector('table');
        const elImage = elTable.querySelector('[data-id="thumbnail"]');
        const elName = elTable.querySelector('[data-id="name"]');

        if (this.thumbnail === '' || this.thumbnail === null) {
            this.thumbnail = this.thumbnailDefault;
            this.pathImage = '';
        } else {
            this.pathImage = this.pathThumbnail;
        }

        elImage.setAttribute('src', `assets/img/${this.pathImage + this.thumbnail}`);
        elName.innerHTML = this.thumbnail;
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

    selectImage(target) {
        const elCard = target.parentNode.parentNode;
        const imageName = elCard.querySelector('[data-id="imageName"]').innerText;

        this.thumbnail = imageName;
        window.modal.closeModal();
        this.modifyThumbnail();
    }

    update() {
        this.elPage = document.querySelector('#pageAdminBlog');
        this.elContentEdit = document.querySelector('#pageAdminBlogEdit');
        this.elContentEditThumbnail = this.elContentEdit.querySelector('[data-id="thumbnailWrapper"]');
        this.elContentList = document.querySelector('#pageAdminBlogList');
        this.elFormRegister = this.elContentEdit.querySelector('[data-id="formRegister"]');
        this.elFormFieldTitle = this.elContentEdit.querySelector('[data-id="fieldTitle"]');
        this.elFormFieldUrl = this.elContentEdit.querySelector('[data-id="fieldUrl"]');
        this.elFormFieldContent = this.elContentEdit.querySelector('[data-id="fieldContent"]');
        this.elFormFieldTag = this.elContentEdit.querySelector('[data-id="fieldTag"]');
        this.elFormFieldDatePost = this.elContentEdit.querySelector('[data-id="fieldDatePost"]');
        this.elFormFieldDateEdit = this.elContentEdit.querySelector('[data-id="fieldDateEdit"]');
        this.elThumbnailWrapper = this.elContentEdit.querySelector('[data-id="thumbnailWrapper"]');
        this.elFormFieldAuthor = document.querySelector('[data-id="author"]');
        this.elCkEditor = CKEDITOR.instances.fieldContent;
        this.elButtonRegister = this.elPage.querySelector('#btRegister');

        this.isEdit = false;
        this.editId = 0;
        this.thumbnail = '';
        this.thumbnailDefault = 'blog-thumbnail.jpg';
        this.pathImage = '';
        this.pathThumbnail = 'dynamic/blog/thumbnail/';
    }

    validateForm() {
        const arrField = [
            this.elFormFieldTitle,
            this.elFormFieldUrl
        ];

        return window.form.validateEmpty(arrField);
    }
}

export {
    AdminBlog
};