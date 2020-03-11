"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/*removeIf(production)*/
var WBPDebug =
/*#__PURE__*/
function () {
  function WBPDebug() {
    _classCallCheck(this, WBPDebug);

    this.isWBPAdmin = true;
    this.isWBPAdmin = true;
    this.isWBPAdminBlog = true;
    this.isWBPLogin = true;
    this.isWBPManagement = true;
    this.isWBPTranslation = true;
    this.isWBPUrl = true;
  }

  _createClass(WBPDebug, [{
    key: "debugMethod",
    value: function debugMethod(obj, method) {
      var parameter = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
      var string = '';
      var className = obj.constructor.name; //        let arrMethod = Object.getOwnPropertyNames(Object.getPrototypeOf(obj));

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
      console.log(string, 'color: black', 'color: blue', 'color: red', 'color: blue');
    }
  }, {
    key: "getMethodName",
    value: function getMethodName() {
      var userAgent = window.navigator.userAgent;
      var msie = userAgent.indexOf('.NET ');

      if (msie > 0) {
        return false;
      }

      var e = new Error('dummy');
      var stack = e.stack.split('\n')[2] // " at functionName ( ..." => "functionName"
      .replace(/^\s+at\s+(.+?)\s.+/g, '$1');
      var split = stack.split(".");

      if (stack !== 'new') {
        return split[1];
      } else {
        return 'constructor';
      }
    }
  }]);

  return WBPDebug;
}();
/*endRemoveIf(production)*/


var WBPAdmin =
/*#__PURE__*/
function () {
  function WBPAdmin() {
    _classCallCheck(this, WBPAdmin);

    /*removeIf(production)*/
    objWBPDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/

    this.pageCurrent = '';
  }

  _createClass(WBPAdmin, [{
    key: "build",
    value: function build() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      if (!getUrlWord('admin')) {
        return;
      }

      this.updateVariable();
      this.buildMenuDifeneActive();
      this.builTableTdWrapper();
    }
  }, {
    key: "updateVariable",
    value: function updateVariable() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.$page = document.querySelector('#page_admin');

      if (!document.contains(this.$page)) {
        return;
      }

      this.$btBlog = this.$page.querySelector('[data-id="bt_blog"]');
      this.$btLogout = this.$page.querySelector('[data-id="bt_logout"]');
    }
  }, {
    key: "buildMenuChangePage",
    value: function buildMenuChangePage(page) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.buildMenuDifeneActive(page);

      if (page !== 'admin-logout') {
        window.location.href = page + '/';
      }
    }
  }, {
    key: "buildMenuDifeneActive",
    value: function buildMenuDifeneActive() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var classActive = 'menu-tab-active';
      var href = window.location.href;
      var split = href.split('/');
      var length = split.length;
      var target = split[length - 2];
      var selector = document.querySelector('#page_admin_menu [data-id="' + target + '"]');

      if (selector === null) {
        return;
      }

      selector.parentNode.classList.add(classActive);
    }
  }, {
    key: "buildLogout",
    value: function buildLogout() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var ajax = new XMLHttpRequest();
      var param = '&c=WBPLogin' + '&m=doLogout';
      ajax.open('POST', objWBPUrl.getController(), true);
      ajax.send(param);
    }
  }, {
    key: "builTableTdWrapper",
    value: function builTableTdWrapper() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var td = document.querySelectorAll('.td-wrapper');
      var currentClass = 'td-wrapper-auto';
      Array.prototype.forEach.call(td, function (item) {
        item.onclick = function () {
          if (item.classList.contains(currentClass)) {
            item.classList.remove(currentClass);
          } else {
            item.classList.add(currentClass);
          }
        };
      });
    }
  }]);

  return WBPAdmin;
}();

var WBPAdminBlog =
/*#__PURE__*/
function () {
  function WBPAdminBlog() {
    _classCallCheck(this, WBPAdminBlog);

    /*removeIf(production)*/
    objWBPDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/
  }

  _createClass(WBPAdminBlog, [{
    key: "build",
    value: function build() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      if (!getUrlWord('admin-blog')) {
        return;
      }

      this.updateVariable();
      this.buildMenu();
      this.buildMenuTable();
      this.watchTitle();
    }
  }, {
    key: "updateVariable",
    value: function updateVariable() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.isEdit = false;
      this.editId = 0;
      this.$page = document.querySelector('#page_admin_blog');
      this.$formRegister = this.$page.querySelector('[data-id="form_register"]');
      this.$formFieldTitle = this.$page.querySelector('[data-id="field_title"]');
      this.$formFieldUrl = this.$page.querySelector('[data-id="field_url"]');
      this.$formFieldContent = this.$page.querySelector('[data-id="field_content"]');
      this.$formFieldTag = this.$page.querySelector('[data-id="field_tag"]');
    }
  }, {
    key: "buildMenu",
    value: function buildMenu() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var $btRegister = this.$page.querySelector('[data-id="bt_register"]');

      $btRegister.onclick = function () {
        if (self.isEdit) {
          self.editSave();
        } else {
          self.registerContent();
        }
      };
    }
  }, {
    key: "buildMenuTable",
    value: function buildMenuTable() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var $table = this.$page.querySelectorAll('.table');
      var $tableActive = this.$page.querySelectorAll('[data-id="table_active"]');
      var $tableInactive = this.$page.querySelectorAll('[data-id="table_inactive"]');
      Array.prototype.forEach.call($tableActive, function (table) {
        var $button = table.querySelectorAll('[data-action="inactivate"]');
        Array.prototype.forEach.call($button, function (item) {
          item.onclick = function () {
            objWFModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
            objWFModal.buildContentConfirmationAction('objWBPAdminBlog.modify(' + item.getAttribute('data-id') + ', "inactivate")');
          };
        });
      });
      Array.prototype.forEach.call($tableInactive, function (table) {
        var $button = table.querySelectorAll('[data-action="activate"]');
        Array.prototype.forEach.call($button, function (item) {
          item.onclick = function () {
            self.modify(item.getAttribute('data-id'), 'activate');
          };
        });
      });
      Array.prototype.forEach.call($tableInactive, function (table) {
        var $button = table.querySelectorAll('[data-action="activate"]');
        Array.prototype.forEach.call($button, function (item) {
          item.onclick = function () {
            self.modify(item.getAttribute('data-id'), 'activate');
          };
        });
      });
      Array.prototype.forEach.call($table, function (table) {
        var $buttonEdit = table.querySelectorAll('[data-action="edit"]');
        var $buttonDelete = table.querySelectorAll('[data-action="delete"]');
        Array.prototype.forEach.call($buttonEdit, function (item) {
          item.onclick = function () {
            self.editId = item.getAttribute('data-id');
            self.editLoadData(self.editId);
          };
        });
        Array.prototype.forEach.call($buttonDelete, function (item) {
          item.onclick = function () {
            objWFModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
            objWFModal.buildContentConfirmationAction('objWBPAdminBlog.delete(' + item.getAttribute('data-id') + ')');
          };
        });
      });
    }
  }, {
    key: "editSave",
    value: function editSave() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var ajax = new XMLHttpRequest();
      var url = objWBPUrl.getController();
      var param = '&c=WBPAdminBlog' + '&m=doUpdate' + '&title=' + this.$formFieldTitle.value + '&url=' + this.$formFieldUrl.value + '&content=' + this.$formFieldContent.value + '&tag=' + this.$formFieldTag.value + '&id=' + self.editId;

      if (!this.validateForm()) {
        return;
      }

      ajax.open('POST', url, true);
      ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          self.showResponse(ajax.responseText);
        }
      };

      ajax.send(param);
    }
  }, {
    key: "editLoadData",
    value: function editLoadData(id) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var ajax = new XMLHttpRequest();
      var url = objWBPUrl.getController();
      var param = '&c=WBPAdminBlog' + '&m=editLoadData' + '&id=' + id;
      ajax.open('POST', url, true);
      ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          var obj = JSON.parse(ajax.responseText);
          document.documentElement.scrollTop = 0;
          self.isEdit = true;
          self.editFillField(obj);
        }
      };

      ajax.send(param);
    }
  }, {
    key: "editFillField",
    value: function editFillField(json) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.$formFieldTitle.value = json['title'];
      this.$formFieldUrl.value = json['url'];
      this.$formFieldContent.value = json['content'];
      this.$formFieldTag.value = json['tag'];
      this.editId = json['id'];
    }
  }, {
    key: "modify",
    value: function modify(id, status) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var ajax = new XMLHttpRequest();
      var url = objWBPUrl.getController();
      var param = '&c=WBPAdminBlog' + '&m=doModify' + '&status=' + status + '&id=' + id;
      ajax.open('POST', url, true);
      ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          self.showResponse(ajax.responseText);
        }
      };

      ajax.send(param);
    }
  }, {
    key: "delete",
    value: function _delete(id) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var ajax = new XMLHttpRequest();
      var url = objWBPUrl.getController();
      var param = '&c=WBPAdminBlog' + '&m=doDelete' + '&id=' + id;
      ajax.open('POST', url, true);
      ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          self.showResponse(ajax.responseText);
        }
      };

      ajax.send(param);
    }
  }, {
    key: "validateForm",
    value: function validateForm() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var arrField = [this.$formFieldTitle, this.$formFieldUrl, this.$formFieldContent, this.$formFieldTag];
      return objWFForm.validateEmpty(arrField);
    }
  }, {
    key: "registerContent",
    value: function registerContent() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;

      if (!this.validateForm()) {
        return;
      }

      var ajax = new XMLHttpRequest();
      var url = objWBPUrl.getController();
      var param = '&c=WBPAdminBlog' + '&m=doRegister' + '&title=' + this.$formFieldTitle.value + '&url=' + this.$formFieldUrl.value + '&content=' + this.$formFieldContent.value + '&tag=' + this.$formFieldTag.value;
      ajax.open('POST', url, true);
      ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          self.showResponse(ajax.responseText);
        }
      };

      ajax.send(param);
    }
  }, {
    key: "showResponse",
    value: function showResponse(data) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var color = '';
      var response = '';

      switch (data) {
        case '1':
          location.reload();
          break;

        default:
          color = 'red';
          response = 'Acorreu um erro. Contate o administrador.';
          break;
      }

      objWBPNotification.addNotification(response, color);
    }
  }, {
    key: "watchTitle",
    value: function watchTitle() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      this.$formFieldTitle.addEventListener('focusout', function () {
        var url = objWBPUrl.buildSEO(self.$formFieldTitle.value);
        self.$formFieldUrl.value = url;
      });
    }
  }]);

  return WBPAdminBlog;
}();

var WBPLogin =
/*#__PURE__*/
function () {
  function WBPLogin() {
    _classCallCheck(this, WBPLogin);

    /*removeIf(production)*/
    objWBPDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/
  }

  _createClass(WBPLogin, [{
    key: "build",
    value: function build() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      if (!getUrlWord('admin-login')) {
        return;
      }

      this.update();
      this.buildMenu();
    }
  }, {
    key: "update",
    value: function update() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.isSignUp = false;
      this.$page = document.querySelector('#page_admin_login');
      this.$buttonLogin = document.querySelector('#page_admin_login_bt');
      this.$fielEmail = document.querySelector('#page_admin_login_user');
      this.$fieldPassword = document.querySelector('#page_admin_login_password');
    }
  }, {
    key: "buildMenu",
    value: function buildMenu() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      this.$buttonLogin.addEventListener('click', function (event) {
        self.buildLogin();
      });
    }
  }, {
    key: "validate",
    value: function validate() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

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
  }, {
    key: "buildLogin",
    value: function buildLogin() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var ajax = new XMLHttpRequest();
      var url = objWBPUrl.getController();
      var param = '&c=WBPLogin' + '&m=doLogin' + '&email=' + this.$fielEmail.value + '&password=' + this.$fieldPassword.value;

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
      };

      ajax.send(param);
    }
  }, {
    key: "buildLoginResponse",
    value: function buildLoginResponse(data) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var response = '';
      var $responseElement = this.$page.querySelector('.form');

      switch (data) {
        case 'inactive':
          response = 'precisa traduzir - cadastro inativo'; // response = globalTranslation.template.login_inactive;

          break;

        case 'problem':
          response = 'precisa traduzir - erro de login'; // response = globalTranslation.template.login_wrong_email;

          this.$fielEmail.focus();
          break;

        case 'empty_email':
          response = 'precisa traduzir - e-mail vazio'; // response = globalTranslation.template.login_empty;

          this.$fielEmail.focus();
          break;

        case 'empty_password':
          response = 'precisa traduzir - senha vazia'; // response = globalTranslation.template.login_empty;

          this.$fieldPassword.focus();
          break;

        default:
          objWBPUrl.build('admin');
          break;
      }

      objWFNotification.add(response, 'red', $responseElement);
    }
  }]);

  return WBPLogin;
}();

var WBPManagement =
/*#__PURE__*/
function () {
  function WBPManagement() {
    _classCallCheck(this, WBPManagement);
  }

  _createClass(WBPManagement, [{
    key: "verifyLoad",
    value: function verifyLoad() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;

      window.onload = function () {
        self.applyClass();
      };
    }
  }, {
    key: "applyClass",
    value: function applyClass() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      objWBPTranslation.build();
      objWBPLogin.build();
      objWBPAdmin.build();
      objWBPAdminBlog.build();
    }
  }]);

  return WBPManagement;
}();

var WBPTranslation =
/*#__PURE__*/
function () {
  function WBPTranslation() {
    _classCallCheck(this, WBPTranslation);

    /*removeIf(production)*/
    objWBPDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/
  }

  _createClass(WBPTranslation, [{
    key: "build",
    value: function build() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.update();
      this.defineActive();
      this.buildMenu();
    }
  }, {
    key: "buildMenu",
    value: function buildMenu() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      this.$select.addEventListener('change', function (event) {
        self.change(this.value);
      });
    }
  }, {
    key: "change",
    value: function change(language) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var ajax = new XMLHttpRequest();
      var url = objWBPUrl.getController();
      var param = '&c=WBPTranslation' + '&m=change' + '&language=' + language;
      ajax.open('POST', url, true);
      ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          location.reload();
        }
      };

      ajax.send(param);
    }
  }, {
    key: "defineActive",
    value: function defineActive() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.$select.value = globalLanguage;
    }
  }, {
    key: "update",
    value: function update() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.$select = document.querySelector('#translation_select');
    }
  }]);

  return WBPTranslation;
}();

var WBPUrl =
/*#__PURE__*/
function () {
  function WBPUrl() {
    _classCallCheck(this, WBPUrl);

    /*removeIf(production)*/
    objWBPDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/
  }

  _createClass(WBPUrl, [{
    key: "buildSEO",
    value: function buildSEO(url) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      return url.toString() // Convert to string
      .normalize('NFD') // Change diacritics
      .replace(/[\u0300-\u036f]/g, '') // Remove illegal characters
      .replace(/\s+/g, '-') // Change whitespace to dashes
      .toLowerCase() // Change to lowercase
      .replace(/&/g, '-and-') // Replace ampersand
      .replace(/[^a-z0-9\-]/g, '') // Remove anything that is not a letter, number or dash
      .replace(/-+/g, '-') // Remove duplicate dashes
      .replace(/^-*/, '') // Remove starting dashes
      .replace(/-*$/, ''); // Remove trailing dashes
    }
  }, {
    key: "build",
    value: function build(target) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      return window.location = globalUrl + globalLanguage + '/' + target + '/';
    }
  }, {
    key: "getController",
    value: function getController() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      return globalUrl + 'php/controller.php';
    }
  }]);

  return WBPUrl;
}();
/*removeIf(production)*/


var objWBPDebug = new WBPDebug();
/*endRemoveIf(production)*/

var objWBPAdmin = new WBPAdmin();
var objWBPAdminBlog = new WBPAdminBlog();
var objWBPLogin = new WBPLogin();
var objWBPManagement = new WBPManagement();
var objWBPTranslation = new WBPTranslation();
var objWBPUrl = new WBPUrl();
objWBPManagement.verifyLoad();