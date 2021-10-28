window.adminUser = new AdminUser();
window.adminBlog = new AdminBlog();
window.adminPage = new AdminPage();
window.adminUploadImage = new AdminUploadImage();

const admin = new Admin();
const login = new Login();

document.addEventListener('DOMContentLoaded', () => {
    login.build();
    admin.build();
    adminBlog.build();
    adminUploadImage.build();
    adminUser.build();
    adminPage.build();
});