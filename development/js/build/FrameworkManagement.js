class FrameworkAdminManagement {
    verifyLoad() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        // console.log('verifyLoad');
        // $('window').on('load', function () {
            // $.when(objFrameworkTranslation.loadFile()).then(function () {
            //     self.applyClass();

            // if (objFrameworkGeneric.verifyHasFodler('admin')) {
                self.applyClass();
            // }
            // });
        // });
    }

    applyClass() {
        /*removeIf(production)*/ objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName()); /*endRemoveIf(production)*/
        // console.log('applyClass');
        objFrameworkLogin.buildMenu();
        objFrameworkAdmin.applyClass();
        objFrameworkAdminBlog.applyClass();
        objFrameworkAdminPage.applyClass();
    }
}