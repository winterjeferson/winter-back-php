class WbManagement {
    verifyLoad() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        window.onload = function () {
            self.applyClass();
        }
    }

    applyClass() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        objWbTranslation.build();
        objWbLogin.build();
        objWbAdmin.build();
        objWbAdminBlog.build();
        objWbBlog.build();
    }
}