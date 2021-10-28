class AdminUploadImage {
    constructor() {
        this.deleteElement = '';
    }

    build() {
        if (!window.helper.getUrlWord('admin/image')) return;

        this.updateVariable();
        this.buildMenu();
    }

    updateVariable() {
        this.elButtonUploadThumbnail = document.querySelector('[data-id="btUploadThumbnail"]');
        this.elButtonUploadBanner = document.querySelector('[data-id="btUploadBanner"]');
    }

    buildMenu() {
        let elButtonDelete = document.querySelectorAll('[data-action="delete"]');

        this.elButtonUploadThumbnail.addEventListener('click', () => {
            this.upload(this.elButtonUploadThumbnail, 'blog/thumbnail/');
        });

        this.elButtonUploadBanner.addEventListener('click', () => {
            this.upload(this.elButtonUploadBanner, 'blog/banner/');
        });

        Array.prototype.forEach.call(elButtonDelete, (item) => {
            item.onclick = () => {
                this.deleteImage(item);
            };
        });
    }

    deleteImage(button) {
        this.deleteElement = button;

        window.modal.buildModal({
            'kind': 'confirmation',
            'content': globalTranslation.confirmationDelete,
            'size': 'small',
            'click': 'window.adminUploadImage.deleteImageAjax()'
        });
    }

    deleteImageAjax() {
        const data = new FormData();
        const ajax = new XMLHttpRequest();
        const el = this.deleteElement.parentNode.parentNode.parentNode;
        let file = el.querySelector('[data-id="fileName"]').innerText;
        let path = el.parentNode.parentNode.getAttribute('data-path');
        let elReturn = el.parentNode.parentNode.parentNode.parentNode.parentNode;

        data.append('f', file);
        data.append('p', path);
        data.append('token', globalToken);

        ajax.open('POST', window.wbUrl.getController({
            'folder': 'admin',
            'file': 'ImageDelete'
        }));

        ajax.onreadystatechange = () => {
            if (ajax.readyState === 4 && ajax.status === 200) {
                this.buildResponse(ajax.responseText, elReturn);
                window.modal.closeModal();
            }
        };

        ajax.send(data);
    }

    upload(target, path) {
        const elForm = target.parentNode.parentNode.parentNode;
        const elFile = elForm.querySelector('[type=file]');
        const file = elFile.files[0];
        const url = window.wbUrl.getController({
            'folder': 'admin',
            'file': 'ImageUpload'
        });
        let data = new FormData();
        let ajax = new XMLHttpRequest();

        if (elFile.files.length === 0) {
            elFile.click();
            return;
        }

        data.append('p', path);
        data.append('f', file);
        data.append('token', globalToken);

        this.elButtonUploadThumbnail.setAttribute('disabled', 'disabled');
        ajax.open('POST', url);

        ajax.onreadystatechange = () => {
            if (ajax.readyState === 4 && ajax.status === 200) {
                this.uploadSuccess(ajax.responseText);
            }
        };

        ajax.send(data);
    }

    uploadSuccess(data) {
        this.elButtonUploadThumbnail.removeAttribute('disabled');
        this.buildResponse(data);
    }

    buildResponse(response) {
        let color;

        switch (response) {
            case 'fileDeleted':
            case 'uploadDone':
                color = 'green';
                document.location.reload();
                break;
            default:
                color = 'red';
                break;
        }

        window.notification.add({
            'text': globalTranslation[response],
            color
        });
    }
}

export {
    AdminUploadImage
};