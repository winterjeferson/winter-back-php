class WBManagement {
    verifyLoad() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        window.onload = function () {
            self.applyClass();
        }
    }

    applyClass() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        objWBTranslation.build();
        objWBLogin.build();
        objWBAdmin.build();
        objWBAdminBlog.build();
        objWBBlog.build();
    }
}