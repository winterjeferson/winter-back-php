/*removeIf(production)*/
var objWBPDebug = new WBPDebug();
/*endRemoveIf(production)*/
var objFrameworkGeneric = new FrameworkGeneric();
var objFrameworkUrl = new FrameworkUrl();
var objFrameworkAdminManagement = new FrameworkAdminManagement();

// if (objFrameworkGeneric.verifyHasFodler('admin')) {
    var objFrameworkLogin = new FrameworkLogin();
    var objFrameworkAdmin = new FrameworkAdmin();
    var objFrameworkAdminBlog = new FrameworkAdminBlog();
    var objFrameworkAdminPage = new FrameworkAdminPage();
// }

objFrameworkAdminManagement.verifyLoad();