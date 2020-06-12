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