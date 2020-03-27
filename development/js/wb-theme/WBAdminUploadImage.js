class WBAdminUploadImage {
    constructor() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
    }

    build() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('admin-upload-image')) {
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

        this.$btUploadThumbnail.addEventListener('click', function (event) {
            self.upload(this, 'blog/thumbnail/');
        });

        this.$btUploadBanner.addEventListener('click', function (event) {
            self.upload(this, 'blog/banner/');
        });
    }

    upload(target, path) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        const self = this;
        const $form = target.parentNode.parentNode.parentNode.parentNode.parentNode;
        const $file = $form.querySelector('[type=file]');
        const data = new FormData();
        const ajax = new XMLHttpRequest();
        const file = $file.files[0];
        const url = objWbUrl.getController();

        if ($file.files.length === 0) {
            $file.click();
            return;
        }

        data.append('c', 'WBAdminUploadImage');
        data.append('m', 'upload');
        data.append('p', path);
        data.append('f', file);

        this.$btUploadThumbnail.setAttribute('disabled', 'disabled');
        ajax.open('POST', url);

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.$btUploadThumbnail.removeAttribute('disabled');
                self.uploadResponse(ajax.responseText, $form);
            }
        }

        ajax.send(data);
    }

    uploadResponse(response, $form) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        switch (response) {
            case 'uploadImageDone':
                objWfNotification.add(globalTranslation[response], 'green', $form);
                document.location.reload();
                break;
            default:
                objWfNotification.add(globalTranslation[response], 'red', $form);
                break;
        }
    }
}