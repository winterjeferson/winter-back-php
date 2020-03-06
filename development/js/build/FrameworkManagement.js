class FrameworkAdminManagement {
    verifyLoad() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        // console.log('verifyLoad');
        window.onload = function () {
        //     console.log('loaded');
        //     self.applyClass();
        // }
        // $.when(objFrameworkTranslation.loadFile()).then(function () {
            self.applyClass();

        // if (objFrameworkGeneric.verifyHasFodler('admin')) {
            // console.log('aaaaa');

        }
        // });
        // });

        // window.addEventListener('load', this.applyClass());
    }

    applyClass() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        // console.log('applyClass');
        objFrameworkLogin.build();
        objFrameworkAdmin.applyClass();
        objFrameworkAdminBlog.applyClass();
        objFrameworkAdminPage.applyClass();
    }
}