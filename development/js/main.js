/*removeIf(production)*/
var objFrameworkDebug = new FrameworkDebug();
/*endRemoveIf(production)*/
var objFrameworkAdminManagement = new FrameworkAdminManagement();

if (objFrameworkLayout.verifyHasFodler('admin')) {
    var objFrameworkAdmin = new FrameworkAdmin();
    var objFrameworkAdminBlog = new FrameworkAdminBlog();
    var objFrameworkAdminPage = new FrameworkAdminPage();
    var objFrameworkLogin = new FrameworkLogin();
}


objFrameworkAdminManagement.verifyLoad();