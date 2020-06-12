class WbAdmin {
    constructor() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
        this.pageCurrent = '';
    }
 
    build() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('admin')) {
            return;
        }

        this.updateVariable();
        this.buildMenuDifeneActive();
        this.builTableTdWrapper();
    }

    updateVariable() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$page = document.querySelector('#mainContent');

        if (!document.contains(this.$page)) {
            return;
        }

        this.$btBlog = this.$page.querySelector('[data-id="btAdminBlog"]');
        this.$btUpload = this.$page.querySelector('[data-id="btAdminImage"]');
        this.$btLogout = this.$page.querySelector('[data-id="btAdminLogout"]');
    }

    // buildMenuChangePage(page) {
    //     /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
    //     this.buildMenuDifeneActive(page);

    //     if (page !== 'admin-logout') {
    //         window.location.href = page + '/';
    //     }
    // }

    buildMenuDifeneActive() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let classActive = 'menu-tab-active';
        let href = window.location.href;
        let split = href.split('/');
        let length = split.length;
        let target = split[length - 2];
        let capitalized = target.charAt(0).toUpperCase() + target.slice(1);
        let selector = document.querySelector('#mainContent [data-id="btAdmin' + capitalized + '"]');

        if (selector === null) {
            return;
        }

        selector.parentNode.classList.add(classActive);
    }

    // buildLogout() {
    //     /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
    //     let ajax = new XMLHttpRequest();
    //     let parameter =
    //         '&c=WbLogin' +
    //         '&m=doLogout';

    //     ajax.open('POST', objWbUrl.getController(), true);
    //     ajax.send(parameter);
    // }

    builTableTdWrapper() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let td = document.querySelectorAll('.td-wrapper');
        let currentClass = 'td-wrapper-auto';

        Array.prototype.forEach.call(td, function (item) {
            item.onclick = function () {
                if (item.classList.contains(currentClass)) {
                    item.classList.remove(currentClass);
                } else {
                    item.classList.add(currentClass);
                }
            }
        });
    }
}
class WbAdminBlog {
    constructor() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
    }

    build() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('blog')) {
            return;
        }

        CKEDITOR.replace('fieldContentPt', {
            entities: false
        });
        CKEDITOR.replace('fieldContentEn', {
            entities: false
        });

        this.updateVariable();
        this.buildMenu();
        this.buildMenuTable();
        this.buildMenuThumbnail();
        this.watchTitle();
    }

    updateVariable() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.isEdit = false;
        this.editId = 0;
        this.$page = document.querySelector('#pageAdminBlog');
        this.$contentEdit = document.querySelector('#pageAdminBlogEdit');
        this.$contentEditThumbnail = this.$contentEdit.querySelector('[data-id="thumbnailWrapper"]');
        this.$contentList = document.querySelector('#pageAdminBlogList');
        this.$formRegister = this.$contentEdit.querySelector('[data-id="formRegister"]');
        this.$formFieldTitlePt = this.$contentEdit.querySelector('[data-id="fieldTitlePt"]');
        this.$formFieldTitleEn = this.$contentEdit.querySelector('[data-id="fieldTitleEn"]');
        this.$formFieldUrlPt = this.$contentEdit.querySelector('[data-id="fieldUrlPt"]');
        this.$formFieldUrlEn = this.$contentEdit.querySelector('[data-id="fieldUrlEn"]');
        this.$formFieldContentPt = this.$contentEdit.querySelector('[data-id="fieldContentPt"]');
        this.$formFieldContentEn = this.$contentEdit.querySelector('[data-id="fieldContentEn"]');
        this.$formFieldTagPt = this.$contentEdit.querySelector('[data-id="fieldTagPt"]');
        this.$formFieldTagEn = this.$contentEdit.querySelector('[data-id="fieldTagEn"]');
        this.$formFieldDatePostPt = this.$contentEdit.querySelector('[data-id="fieldDatePostPt"]');
        this.$formFieldDatePostEn = this.$contentEdit.querySelector('[data-id="fieldDatePostEn"]');
        this.$formFieldDateEditPt = this.$contentEdit.querySelector('[data-id="fieldDateEditPt"]');
        this.$formFieldDateEditEn = this.$contentEdit.querySelector('[data-id="fieldDateEditEn"]');
        this.$formFieldTagEn = this.$contentEdit.querySelector('[data-id="fieldTagEn"]');
        this.$thumbnailWrapper = this.$contentEdit.querySelector('[data-id="thumbnailWrapper"]');
        this.thumbnail = '';
        this.thumbnailDefault = 'default.jpg';
        this.thumbnailPath = 'assets/img/blog/thumbnail/';
        this.$ckEditorPt = CKEDITOR.instances.fieldContentPt;
        this.$ckEditorEn = CKEDITOR.instances.fieldContentEn;
    }

    buildMenu() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        const self = this;
        const $btRegister = this.$page.querySelector('[data-id="btRegister"]');

        $btRegister.onclick = function () {
            if (self.isEdit) {
                self.editSave();
            } else {
                self.saveContent();
            }
        }
    }

    buildMenuThumbnail() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        const $target = this.$contentEditThumbnail.querySelectorAll('.table');

        Array.prototype.forEach.call($target, function (table) {
            let $button = table.querySelectorAll('[data-action="edit"]');

            Array.prototype.forEach.call($button, function (item) {
                item.onclick = function () {
                    objWfModal.buildModal('ajax', objWbUrl.getController({ 'folder': 'admin', 'file': 'BlogThumbnail' }), 'eb');
                }
            });
        });

    }

    buildMenuTable() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let $table = this.$contentList.querySelectorAll('.table');
        let $tableActive = this.$contentList.querySelectorAll('[data-id="tableActive"]');
        let $tableInactive = this.$contentList.querySelectorAll('[data-id="tableInactive"]');

        Array.prototype.forEach.call($tableActive, function (table) {
            let $button = table.querySelectorAll('[data-action="inactivate"]');

            Array.prototype.forEach.call($button, function (item) {
                item.onclick = function () {
                    objWfModal.buildModal('confirmation', globalTranslation.confirmationInactivate);
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
                    objWfModal.buildContentConfirmationAction('objWbAdminBlog.delete(' + item.getAttribute('data-id') + ')');
                }
            });
        });
    }

    editSave() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController({ 'folder': 'admin', 'file': 'BlogEdit' });
        let parameter =
            '&action=doUpdate' +
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
        let url = objWbUrl.getController({ 'folder': 'admin', 'file': 'BlogEdit' });
        let parameter =
            '&action=' + 'editLoadData' +
            '&id=' + id;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                let obj = JSON.parse(ajax.responseText);

                document.documentElement.scrollTop = 0;
                self.isEdit = true;
                self.editFillField(obj);
                self.thumbnail = obj['thumbnail'];
                self.modifyThumbnail();
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
        let url = objWbUrl.getController({ 'folder': 'admin', 'file': 'BlogEdit' });
        let parameter =
            '&action=doModify' +
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
        let url = objWbUrl.getController({ 'folder': 'admin', 'file': 'BlogEdit' });
        let parameter =
            '&action=doDelete' +
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
            '&thumbnail=' + this.thumbnail +
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
        let url = objWbUrl.getController({ 'folder': 'admin', 'file': 'BlogEdit' });
        let parameter =
            '&action=doSave' +
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

        console.log(data);

        switch (data) {
            case 'done':
                location.reload();
                break;
            default:
                color = 'red';
                response = globalTranslation.error;
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

    selectImage(target) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let $card = target.parentNode.parentNode.parentNode.parentNode;
        let imageName = $card.querySelector('header').querySelector('[data-id="imageName"]').innerText;

        this.thumbnail = imageName;
        objWfModal.closeModal();
        this.modifyThumbnail();
    }

    modifyThumbnail() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let $image = this.$thumbnailWrapper.querySelector('table').querySelector('[data-id="thumbnail"]');
        let $name = this.$thumbnailWrapper.querySelector('table').querySelector('[data-id="name"]');

        if (this.thumbnail === '' || this.thumbnail === null) {
            this.thumbnail = this.thumbnailDefault;
        }

        $image.setAttribute('src', this.thumbnailPath + this.thumbnail);
        $name.innerHTML = this.thumbnail;
    }
}
class WbAdminUploadImage {
    constructor() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
        this.deleteElement = '';
    }

    build() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('image')) {
            return;
        }

        this.updateVariable();
        this.buildMenu();
    }

    updateVariable() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$btUploadThumbnail = document.querySelector('[data-id="btUploadThumbnail"]');
        this.$btUploadBanner = document.querySelector('[data-id="btUploadBanner"]');
    }

    buildMenu() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        const self = this;
        let $buttonDelete = document.querySelectorAll('[data-action="delete"]');

        this.$btUploadThumbnail.addEventListener('click', function (event) {
            self.upload(this, 'blog/thumbnail/');
        });

        this.$btUploadBanner.addEventListener('click', function (event) {
            self.upload(this, 'blog/banner/');
        });

        Array.prototype.forEach.call($buttonDelete, function (item) {
            item.onclick = function () {
                self.deleteImage(item);
            }
        });
    }

    deleteImage(button) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.deleteElement = button;

        objWfModal.buildModal('confirmation', globalTranslation.confirmationDelete);
        objWfModal.buildContentConfirmationAction('objWbAdminUploadImage.deleteImageAjax()');
    }

    deleteImageAjax() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        const self = this;
        const data = new FormData();
        const ajax = new XMLHttpRequest();
        let file = this.deleteElement.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector('[data-id="fileName"]').innerText;
        let path = this.deleteElement.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.getAttribute('data-path');
        let $return = this.deleteElement.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;

        data.append('f', file);
        data.append('p', path);

        ajax.open('POST', objWbUrl.getController({ 'folder': 'admin', 'file': 'ImageDelete' }));

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.buildResponse(ajax.responseText, $return);
                objWfModal.closeModal();
            }
        }

        ajax.send(data);
    }

    upload(target, path) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        const self = this;
        const $form = target.parentNode.parentNode.parentNode.parentNode.parentNode;
        const $file = $form.querySelector('[type=file]');
        const data = new FormData();
        const ajax = new XMLHttpRequest();
        const file = $file.files[0];
        const url = objWbUrl.getController({ 'folder': 'admin', 'file': 'ImageUpload' });

        if ($file.files.length === 0) {
            $file.click();
            return;
        }

        data.append('p', path);
        data.append('f', file);

        this.$btUploadThumbnail.setAttribute('disabled', 'disabled');
        ajax.open('POST', url);

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.$btUploadThumbnail.removeAttribute('disabled');
                self.buildResponse(ajax.responseText, $form);
            }
        }

        ajax.send(data);
    }

    buildResponse(response, $target) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        switch (response) {
            case 'fileDeleted':
            case 'uploadDone':
                objWfNotification.add(globalTranslation[response], 'green', $target);
                document.location.reload();
                break;
            default:
                objWfNotification.add(globalTranslation[response], 'red', $target);
                break;
        }
    }
}
class WbManagementAdmin {
    verifyLoad() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        window.addEventListener('load', this.applyClass(), { once: true });
    }

    applyClass() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        objWbLogin.build();
        objWbAdmin.build();
        objWbAdminBlog.build();
        objWbAdminUploadImage.build();
    }
}
/*removeIf(production)*/
var objWbDebug = new WbDebug();
/*endRemoveIf(production)*/

var objWbAdmin = new WbAdmin();
var objWbAdminBlog = new WbAdminBlog();
var objWbAdminUploadImage = new WbAdminUploadImage();
var objWbLogin = new WbLogin();
var objWbManagementAdmin = new WbManagementAdmin();

objWbManagementAdmin.verifyLoad();