/*removeIf(production)*/
class WbDebug {
    constructor() {
        this.isWbAdmin = true;

        this.isWbAdmin = true;
        this.isWbAdminBlog = true;
        this.isWbLogin = true;
        this.isWbManagement = true;
        this.isWbTranslation = true;
        this.isWbUrl = true;
    }

    debugMethod(obj, method, parameter = '') {
        let string = '';
        let className = obj.constructor.name;
        //        let arrMethod = Object.getOwnPropertyNames(Object.getPrototypeOf(obj));

        if (!this['is' + className]) {
            return false;
        }

        string += '%c';
        string += 'obj' + className;
        string += '.';
        string += '%c';
        string += method;
        string += '(';

        string += '%c';
        if (parameter !== '') {
            string += parameter;
        }

        string += '%c';
        string += ');';

        console.log(string, 'color: black', 'color: green', 'color: red', 'color: green');
    }

    getMethodName() {
        let userAgent = window.navigator.userAgent;
        let msie = userAgent.indexOf('.NET ');

        if (msie > 0) {
            return false;
        }

        let e = new Error('dummy');
        let stack = e.stack.split('\n')[2]
            // " at functionName ( ..." => "functionName"
            .replace(/^\s+at\s+(.+?)\s.+/g, '$1');
        let split = stack.split(".");

        if (stack !== 'new') {
            return split[1];
        } else {
            return 'constructor';
        }
    }
}
/*endRemoveIf(production)*/
class WbBlog {
    constructor() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
        this.classlaodMore = 'loadMore';
    }

    build() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('blog')) {
            return;
        }

        this.update();
        this.buildMenu();
    }

    update() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.page = 'pageBlog';
        this.$lastPost = document.querySelector('#' + this.page + 'LastPost');
        this.$mostViewed = document.querySelector('#' + this.page + 'MostViewed');
    }

    buildMenu() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        if (!this.$lastPost) {
            return;
        }

        if (document.contains(this.$lastPost.querySelector('[data-id="' + this.classlaodMore + '"]'))) {
            this.$lastPost.querySelector('[data-id="' + this.classlaodMore + '"]').addEventListener('click', function (event) {
                self.loadMore(this);
            });
        }

        if (document.contains(this.$mostViewed.querySelector('[data-id="' + this.classlaodMore + '"]'))) {
            this.$mostViewed.querySelector('[data-id="' + this.classlaodMore + '"]').addEventListener('click', function (event) {
                self.loadMore(this);
            });
        }
    }

    loadMore(target) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let parentId = target.parentNode.parentNode.parentNode.getAttribute('id');
        let parentIdString = parentId.substring(this.page.length);
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController();
        let parameter =
            '&c=WbBlogList' +
            '&m=buildLoadMoreButtonClick' +
            '&target=' + parentIdString;

        target.classList.add('disabled');
        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                target.classList.remove('disabled');
                self.loadMoreSuccess(parentId, ajax.responseText);
            }
        }

        ajax.send(parameter);
    }

    loadMoreSuccess(parentId, value) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let json = JSON.parse(value);
        let $section = document.querySelector('#' + parentId);
        let $sectionList = $section.querySelector('.blog-list');
        let $bt = $section.querySelector('[data-id="' + this.classlaodMore + '"]');

        if (!json[this.classlaodMore]) {
            $bt.classList.add('disabled');
        }

        $sectionList.insertAdjacentHTML('beforeend', json['html']);
        window.scrollTo(0, document.documentElement.scrollTop + 1);
        window.scrollTo(0, document.documentElement.scrollTop - 1);
    }
}
class WbForm {
    constructor() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
    }

    build() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('form')) {
            return;
        }

        this.update();
        this.buildMenu();
    }

    update() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$page = document.querySelector('#pageForm');
        this.$form = this.$page.querySelector('.form');
        this.$btSend = this.$page.querySelector('#pageFormBtSend');
    }

    buildMenu() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        this.$btSend.addEventListener('click', function (event) {
            self.send();
        });
    }

    send() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController({ 'folder': 'form', 'file': 'FormSend' });
        let parameter =
            '&method=sendForm' +
            '&data=' + JSON.stringify(self.getData());

        this.$btSend.setAttribute('disabled', 'disabled');
        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.$btSend.removeAttribute('disabled');
                self.response(ajax.responseText);
            }
        }

        ajax.send(parameter);
    }

    getData() {
         /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let arr = [];

        arr.push(this.$form.querySelector('[data-id="email"]').value);
        arr.push(this.$form.querySelector('[data-id="message"]').value);

        return arr;
    }

    response(data) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let response = '';
        let color = '';

        switch (data) {
            case 'ok':
                color = 'green';
                response = globalTranslation.formSent;
                break;
            default:
                color = 'red';
                response = globalTranslation.formProblemSend;
                break;
        }

        objWfNotification.add(response, color, this.$form);
    }
}
class WbLogin {
    constructor() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/

    }

    build() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('admin-login')) {
            return;
        }

        this.update();
        this.buildMenu();
    }

    update() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.isSignUp = false;

        this.$page = document.querySelector('#pageAdminLogin');
        this.$buttonLogin = document.querySelector('#pageAdminLoginBt');
        this.$fielEmail = document.querySelector('#pageAdminLoginUser');
        this.$fieldPassword = document.querySelector('#pageAdminLoginPassword');
    }

    buildMenu() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        this.$buttonLogin.addEventListener('click', function (event) {
            self.buildLogin();
        });
    }

    validate() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        if (this.$fielEmail.value === '') {
            this.$fielEmail.focus();
            this.buildLoginResponse('empty_email');
            return;
        }

        if (this.$fieldPassword.value === '') {
            this.$fieldPassword.focus();
            this.buildLoginResponse('empty_password');
            return;
        }

        return true;
    }

    buildLogin() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController();
        let parameter = 
            '&c=WbLogin' + 
            '&m=doLogin' + 
            '&email=' + this.$fielEmail.value + 
            '&password=' + this.$fieldPassword.value;

        if (!this.validate()) {
            return;
        }

        this.$buttonLogin.setAttribute('disabled', 'disabled');
        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.$buttonLogin.removeAttribute('disabled');
                self.buildLoginResponse(ajax.responseText);
            }
        }

        ajax.send(parameter);
    }

    buildLoginResponse(data) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let response = '';
        let $responseElement = this.$page.querySelector('.form');

        switch (data) {
            case 'inactive':
                response = globalTranslation.login_inactive;
                break;
            case 'problem':
                response = globalTranslation.login_fail;
                this.$fielEmail.focus();
                break;
            case 'empty_email':
                response = globalTranslation.empty_field;
                this.$fielEmail.focus();
                break;
            case 'empty_password':
                response = globalTranslation.empty_field;
                this.$fieldPassword.focus();
                break;
            default:
                objWbUrl.build('admin');
                break;
        }

        objWfNotification.add(response, 'red', $responseElement);
    }
}
class WbManagement {
    verifyLoad() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        window.addEventListener('load', this.applyClass(), { once: true });
    }

    applyClass() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        objWbTranslation.build();
        objWbBlog.build();
        objWbForm.build();
    }
}
class WbTranslation {
    constructor() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
    }

    build() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.update();
        this.defineActive();
        this.buildMenu();
    }

    buildMenu() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        this.$select.addEventListener('change', function (event) {
            self.change(this.value);
        });
    }

    change(language) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController();
        let parameter =
            '&c=WbTranslation' +
            '&m=change' +
            '&language=' + language;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                location.reload();
            }
        }

        ajax.send(parameter);
    }

    defineActive() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$select.value = globalLanguage;
    }

    update() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$select = document.querySelector('#translationSelect');
    }
}
class WbUrl {
    constructor() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/

    }

    buildSEO(url) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        return url.toString()               // Convert to string
            .normalize('NFD')               // Change diacritics
            .replace(/[\u0300-\u036f]/g, '') // Remove illegal characters
            .replace(/\s+/g, '-')            // Change whitespace to dashes
            .toLowerCase()                  // Change to lowercase
            .replace(/&/g, '-and-')          // Replace ampersand
            .replace(/[^a-z0-9\-]/g, '')     // Remove anything that is not a letter, number or dash
            .replace(/-+/g, '-')             // Remove duplicate dashes
            .replace(/^-*/, '')              // Remove starting dashes
            .replace(/-*$/, '');             // Remove trailing dashes
    }

    build(target) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        return window.location = globalUrl + globalLanguage + '/' + target + '/';
    }

    getController(obj) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        return './application/controller/' + obj['folder'] + '/' + obj['file'] + '.php';
    }
}
/*removeIf(production)*/
var objWbDebug = new WbDebug();
/*endRemoveIf(production)*/

var objWbBlog = new WbBlog();
var objWbForm  = new WbForm();
var objWbManagement = new WbManagement();
var objWbTranslation = new WbTranslation();
var objWbUrl = new WbUrl();

objWbManagement.verifyLoad();