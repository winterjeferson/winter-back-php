window.wbUrl = new Url();
window.wbHelper = new Helper();

const blog = new Blog();
const form = new Form();
const translation = new Translation();

document.addEventListener('DOMContentLoaded', () => {
    translation.build();
    blog.build();
    form.build();
});