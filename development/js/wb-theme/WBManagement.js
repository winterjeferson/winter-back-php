class WbManagement {
    verifyLoad() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        window.addEventListener('load', self.applyClass(), { once: true });
    }

    applyClass() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        objWbTranslation.build();
        objWbLogin.build();
        objWbAdmin.build();
        objWbAdminBlog.build();
        objWbAdminUploadImage.build();
        objWbBlog.build();
        objWbForm.build();
    }
}