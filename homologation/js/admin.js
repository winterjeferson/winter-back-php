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

    this.isWBPManagement = true;
    this.isWBPAdmin = true;
    this.isWBPAdminBlog = true;
    this.isWBPAdminPage = true;
    this.isWBPLogin = true;
    this.isWBPGeneric = true;
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
      ajax.open('POST', objWBPkUrl.getController(), true);
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
      this.$page = $('#page_admin_blog');
      this.$table = $(this.$page).find('.table');
      this.$tableActive = $(this.$page).find('[data-id="table_active"]');
      this.$tableInactive = $(this.$page).find('[data-id="table_inactive"]');
      this.$btRegister = $(this.$page).find('[data-id="bt_register"]');
      this.$formRegister = $(this.$page).find('[data-id="form_register"]');
      this.$formFieldTitle = $(this.$page).find('[data-id="field_title"]');
      this.$formFieldUrl = $(this.$page).find('[data-id="field_url"]');
      this.$formFieldContent = $(this.$page).find('[data-id="field_content"]');
      this.$formFieldTag = $(this.$page).find('[data-id="field_tag"]');
    }
  }, {
    key: "buildMenu",
    value: function buildMenu() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      this.$btRegister.on('click', function () {
        if (self.isEdit) {
          self.editSave();
        } else {
          self.registerContent();
        }
      });
    }
  }, {
    key: "buildMenuTable",
    value: function buildMenuTable() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      this.$table.find('.bt').unbind();
      this.$tableActive.find('[data-action="inactivate"]').on('click', function () {
        objWFModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
        objWFModal.buildContentConfirmationAction('objWBPkAdminBlog.modify(' + $(this).attr('data-id') + ', "inactivate")');
      });
      this.$tableInactive.find('[data-action="activate"]').on('click', function () {
        self.modify($(this).attr('data-id'), 'activate');
      });
      this.$table.find('[data-action="edit"]').on('click', function () {
        self.editId = $(this).attr('data-id');
        self.editLoadData(self.editId);
      });
      this.$table.find('[data-action="delete"]').on('click', function () {
        objWFModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
        objWFModal.buildContentConfirmationAction('objWBPkAdminBlog.delete(' + $(this).attr('data-id') + ')');
      });
    }
  }, {
    key: "editSave",
    value: function editSave() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;

      if (this.validateForm()) {
        $.ajax({
          url: objWBPkUrl.getController(),
          data: '&c=WBPAdminBlog' + '&m=doUpdate' + '&title=' + this.$formFieldTitle.val() + '&url=' + this.$formFieldUrl.val() + '&content=' + this.$formFieldContent.val() + '&tag=' + this.$formFieldTag.val() + '&id=' + self.editId,
          type: 'POST',
          success: function success(data) {
            self.showResponse(data);
          }
        });
      }
    }
  }, {
    key: "editLoadData",
    value: function editLoadData(id) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      $.ajax({
        url: objWBPkUrl.getController(),
        data: '&c=WBPAdminBlog' + '&m=editLoadData' + '&id=' + id,
        type: 'POST',
        success: function success(data) {
          var obj = $.parseJSON(data); // objTheme.doSlide(self.$formRegister);
          // var target = self.$formRegister;
          // self.scrollTo(document.scrollingElement || document.documentElement, "scrollTop", "", 0, target.offsetTop, 2000, true);

          self.isEdit = true;
          self.editFillField(obj);
        }
      });
    } // scrollTo(elem, style, unit, from, to, time, prop) {
    //     if (!elem) {
    //         return;
    //     }
    //     var start = new Date().getTime(),
    //         timer = setInterval(function () {
    //             var step = Math.min(1, (new Date().getTime() - start) / time);
    //             if (prop) {
    //                 elem[style] = (from + step * (to - from)) + unit;
    //             } else {
    //                 elem.style[style] = (from + step * (to - from)) + unit;
    //             }
    //             if (step === 1) {
    //                 clearInterval(timer);
    //             }
    //         }, 25);
    //     if (prop) {
    //         elem[style] = from + unit;
    //     } else {
    //         elem.style[style] = from + unit;
    //     }
    // }

  }, {
    key: "editFillField",
    value: function editFillField(json) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.$formFieldTitle.val(json['title']);
      this.$formFieldUrl.val(json['url']);
      this.$formFieldContent.val(json['content']);
      this.$formFieldTag.val(json['tag']);
      this.editId = json['id'];
    }
  }, {
    key: "modify",
    value: function modify(id, status) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      $.ajax({
        url: objWBPkUrl.getController(),
        data: '&c=WBPAdminBlog' + '&m=doModify' + '&s=' + status + '&id=' + Number(id),
        type: 'POST',
        success: function success(data) {
          self.showResponse(data);
        }
      });
    }
  }, {
    key: "delete",
    value: function _delete(id) {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      $.ajax({
        url: objWBPkUrl.getController(),
        data: '&c=WBPAdminBlog' + '&m=doDelete' + '&id=' + Number(id),
        type: 'POST',
        success: function success(data) {
          self.showResponse(data);
        }
      });
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

      if (this.validateForm()) {
        $.ajax({
          url: objWBPkUrl.getController(),
          data: '&c=WBPAdminBlog' + '&m=doRegister' + '&title=' + this.$formFieldTitle.val() + '&url=' + this.$formFieldUrl.val() + '&content=' + this.$formFieldContent.val() + '&tag=' + this.$formFieldTag.val(),
          type: 'POST',
          success: function success(data) {
            self.showResponse(data);
          }
        });
      }
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

      objWBPkNotification.addNotification(response, color);
    }
  }, {
    key: "watchTitle",
    value: function watchTitle() {
      /*removeIf(production)*/
      objWBPDebug.debugMethod(this, objWBPDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      this.$formFieldTitle.on('focusout', function () {
        var url = objWBPkUrl.buildSEO(self.$formFieldTitle.val());
        self.$formFieldUrl.val(url);
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
      var url = objWBPkUrl.getController();
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
          objWBPkUrl.build('admin');
          break;
      }

      objWFNotification.add(response, 'red', $responseElement);
    }
  }]);

  return WBPLogin;
}();

var WBPAdminManagement =
/*#__PURE__*/
function () {
  function WBPAdminManagement() {
    _classCallCheck(this, WBPAdminManagement);
  }

  _createClass(WBPAdminManagement, [{
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

      objWBPkLogin.build();
      objWBPkAdmin.build();
      objWBPkAdminBlog.build();
    }
  }]);

  return WBPAdminManagement;
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

var objWBPkAdmin = new WBPAdmin();
var objWBPAdminBlog = new WBPAdminBlog();
var objWBPkUrl = new WBPUrl();
var objWBPkAdminManagement = new WBPAdminManagement();
var objWBPkLogin = new WBPLogin();
var objWBPkAdmin = new WBPAdmin();
var objWBPkAdminBlog = new WBPAdminBlog();
objWBPkAdminManagement.verifyLoad();