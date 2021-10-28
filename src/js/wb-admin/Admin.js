class Admin {
    constructor() {
        this.pageCurrent = '';
        this.cssActive = 'tab--active';
        this.cssWrapper = 'table-td-wrapper';
        this.idPage = 'mainContent';
        this.idButton = 'button_admin_';
    }

    build() {
        if (!window.helper.getUrlWord('admin')) return;

        this.update();
        this.buildMenuActive();
        this.wrappTable();
    }

    buildMenuActive() {
        const href = window.location.href;
        const split = href.split('/');
        const length = split.length;
        const target = split[length - 2];
        const el = this.elPage.querySelector(`[data-id="${this.idButton + target}"]`);

        if (el === null) return;

        el.classList.add(this.cssActive);
    }

    setCKEditor() {
        CKEDITOR.replace('fieldContent', {});
        CKEDITOR.config.basicEntities = false;
        CKEDITOR.config.entities_greek = false;
        CKEDITOR.config.entities_latin = false;
        CKEDITOR.config.entities_additional = '';
    }

    showResponse(data) {
        let color = '';
        let response = '';

        switch (data) {
            case 'done':
                location.reload();
                break;
            case 'problemPermission':
                color = 'red';
                response = globalTranslation.problemPermission;
            default:
                color = 'red';
                response = globalTranslation.errorAdministrator;
                break;
        }

        window.notification.add({
            'text': response,
            'color': color
        });
    }

    update() {
        this.elPage = document.querySelector(`#${this.idPage}`);
    }

    wrappTable() {
        const el = document.querySelectorAll(`.${this.cssWrapper}`);

        Array.prototype.forEach.call(el, (item) => {
            item.onclick = () => {
                if (item.classList.contains(this.cssWrapper)) {
                    item.classList.remove(this.cssWrapper);
                } else {
                    item.classList.add(this.cssWrapper);
                }
            };
        });
    }
}

export {
    Admin
};