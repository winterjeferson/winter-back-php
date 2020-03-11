class WBPManagement {
    verifyLoad() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        window.onload = function () {
            self.applyClass();
        }
    }

    applyClass() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        objWBPTranslation.build();
        objWBPLogin.build();
        objWBPAdmin.build();
        objWBPAdminBlog.build();
    }
}