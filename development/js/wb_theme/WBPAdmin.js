class WBPAdmin {
    constructor() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
        this.pageCurrent = '';
    }

    build() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('admin')) {
            return;
        }
        
        this.updateVariable();
        this.buildMenuDifeneActive();
        this.builTableTdWrapper();
    }

    updateVariable() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$page = document.querySelector('#page_admin');

        if (!document.contains(this.$page)) {
            return;
        }

        this.$btBlog = this.$page.querySelector('[data-id="bt_blog"]');
        this.$btLogout = this.$page.querySelector('[data-id="bt_logout"]');
    }

    buildMenuChangePage(page) {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        this.buildMenuDifeneActive(page);

        if (page !== 'admin-logout') {
            window.location.href = page + '/';
        }
    }

    buildMenuDifeneActive() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let classActive = 'menu-tab-active';
        let href = window.location.href;
        let split = href.split('/');
        let length = split.length;
        let target = split[length - 2];
        let selector = document.querySelector('#page_admin_menu [data-id="' + target + '"]');

        if (selector === null) {
            return;
        }

        selector.parentNode.classList.add(classActive);
    }

    buildLogout() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let ajax = new XMLHttpRequest();
        let param = '&c=WBPLogin' + '&m=doLogout';

        ajax.open('POST', objWBPUrl.getController(), true);
        ajax.send(param);
    }

    builTableTdWrapper() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
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