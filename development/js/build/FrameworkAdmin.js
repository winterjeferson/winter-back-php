class FrameworkAdmin {
    constructor() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
        this.pageCurrent = '';
    }

    applyClass() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        this.updateVariable();
        // this.buildMenu();
        this.buildMenuDifeneActive();
        this.builTableTdWrapper();
    }

    updateVariable() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$page = $('#admin');
        this.$menuMain = $('#main_menu');
        this.$btPage = this.$page.find('[data-id="bt_page"]');
        this.$btBlog = this.$page.find('[data-id="bt_blog"]');
        this.$btLogout = this.$page.find('[data-id="bt_logout"]');
    }

    buildMenu() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        // let self = this;


        // this.$menuMain.find('.bt').on('click', function () {
        //     console.log(top.location);
        //     return;
        //     let dataId = $(this).attr('data-id');
        //     // console.log('aaaaaaa');

        //     self.buildMenuChangePage(dataId);
        // });

        // this.$btLogout.on('click', function () {
        //     self.buildLogout();
        // });
    }

    buildMenuChangePage(page) {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        this.buildMenuDifeneActive(page);

        if (page !== 'admin-logout') {
            window.location.href = page + '/';
        }
    }

    buildMenuDifeneActive() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        let classActive = 'menu-tab-active';
        let target = '';

        if (window.location.href.indexOf('admin-blog') > -1) {
            target = $('#page_admin_blog').find('.menu-tab').find('[data-id="admin-blog"]');
        }

        $(target).parent().addClass(classActive);
    }

    buildLogout() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        $.ajax({
            url: objFrameworkUrl.getController(),
            data:
                '&c=FrameworkLogin' +
                '&m=doLogout',
            success: function (data) {
                switch (data) {
                    case '1':
                        window.location = 'admin/index.php';
                        break;
                }
            }
        });
    }

    builTableTdWrapper() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        $('.td-wrapper').unbind().on('click', function () {
            $(this).toggleClass('td-wrapper-auto');
        });
    }
}