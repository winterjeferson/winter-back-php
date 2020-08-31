class WbManagementAdmin {
    verifyLoad() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        window.addEventListener('load', this.applyClass(), { once: true });
    }

    applyClass() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        objWbLogin.build();
        objWbAdmin.build();
        objWbAdminBlog.build();
        objWbAdminUploadImage.build();
        objWbAdminUser.build();
        objWbAdminPage.build();
    }
}