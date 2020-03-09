class WBPAdminManagement {
    verifyLoad() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        window.onload = function () {
            self.applyClass();
        }
    }

    applyClass() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        objWBPkLogin.build();
        objWBPkAdmin.build();
        objWBPkAdminBlog.build();
    }
}