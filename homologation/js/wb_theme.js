"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/*removeIf(production)*/
var WbDebug =
/*#__PURE__*/
function () {
  function WbDebug() {
    _classCallCheck(this, WbDebug);

    this.isWbAdmin = true;
    this.isWbAdmin = true;
    this.isWbAdminBlog = true;
    this.isWbLogin = true;
    this.isWbManagement = true;
    this.isWbTranslation = true;
    this.isWbUrl = true;
  }

  _createClass(WbDebug, [{
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
      console.log(string, 'color: black', 'color: green', 'color: red', 'color: green');
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

  return WbDebug;
}();
/*endRemoveIf(production)*/


var WbAdmin =
/*#__PURE__*/
function () {
  function WbAdmin() {
    _classCallCheck(this, WbAdmin);

    /*removeIf(production)*/
    objWbDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/

    this.pageCurrent = '';
  }

  _createClass(WbAdmin, [{
    key: "build",
    value: function build() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var ajax = new XMLHttpRequest();
      var param = '&c=WbLogin' + '&m=doLogout';
      ajax.open('POST', objWbUrl.getController(), true);
      ajax.send(param);
    }
  }, {
    key: "builTableTdWrapper",
    value: function builTableTdWrapper() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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

  return WbAdmin;
}();

var WbAdminBlog =
/*#__PURE__*/
function () {
  function WbAdminBlog() {
    _classCallCheck(this, WbAdminBlog);

    /*removeIf(production)*/
    objWbDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/
  }

  _createClass(WbAdminBlog, [{
    key: "build",
    value: function build() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.isEdit = false;
      this.editId = 0;
      this.$page = document.querySelector('#page_admin_blog');
      this.$formRegister = this.$page.querySelector('[data-id="form_register"]');
      this.$formFieldTitlePt = this.$page.querySelector('[data-id="field_title_pt"]');
      this.$formFieldTitleEn = this.$page.querySelector('[data-id="field_title_en"]');
      this.$formFieldUrlPt = this.$page.querySelector('[data-id="field_url_pt"]');
      this.$formFieldUrlEn = this.$page.querySelector('[data-id="field_url_en"]');
      this.$formFieldContentPt = this.$page.querySelector('[data-id="field_content_pt"]');
      this.$formFieldContentEn = this.$page.querySelector('[data-id="field_content_en"]');
      this.$formFieldTagPt = this.$page.querySelector('[data-id="field_tag_pt"]');
      this.$formFieldTagEn = this.$page.querySelector('[data-id="field_tag_en"]');
      this.$formFieldDatePostPt = this.$page.querySelector('[data-id="field_date_post_pt"]');
      this.$formFieldDatePostEn = this.$page.querySelector('[data-id="field_date_post_en"]');
      this.$formFieldDateEditPt = this.$page.querySelector('[data-id="field_date_edit_pt"]');
      this.$formFieldDateEditEn = this.$page.querySelector('[data-id="field_date_edit_en"]');
      this.$formFieldTagEn = this.$page.querySelector('[data-id="field_tag_en"]');
    }
  }, {
    key: "buildMenu",
    value: function buildMenu() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var $table = this.$page.querySelectorAll('.table');
      var $tableActive = this.$page.querySelectorAll('[data-id="table_active"]');
      var $tableInactive = this.$page.querySelectorAll('[data-id="table_inactive"]');
      Array.prototype.forEach.call($tableActive, function (table) {
        var $button = table.querySelectorAll('[data-action="inactivate"]');
        Array.prototype.forEach.call($button, function (item) {
          item.onclick = function () {
            objWfModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
            objWfModal.buildContentConfirmationAction('objWbAdminBlog.modify(' + item.getAttribute('data-id') + ', "inactivate")');
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
            objWfModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
            objWfModal.buildContentConfirmationAction('objWbAdminBlog.delete(' + item.getAttribute('data-id') + ')');
          };
        });
      });
    }
  }, {
    key: "editSave",
    value: function editSave() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var ajax = new XMLHttpRequest();
      var url = objWbUrl.getController();
      var param = '&c=WbAdminBlog' + '&m=doUpdate' + '&titlePt=' + this.$formFieldTitlePt.value + '&titleEn=' + this.$formFieldTitleEn.value + '&urlPt=' + this.$formFieldUrlPt.value + '&urlEn=' + this.$formFieldUrlEn.value + '&contentPt=' + this.$formFieldContentPt.value + '&contentEn=' + this.$formFieldContentEn.value + '&tagPt=' + this.$formFieldTagPt.value + '&tagEn=' + this.$formFieldTagEn.value + '&datePostPt=' + this.$formFieldDatePostPt.value + '&datePostEn=' + this.$formFieldDatePostEn.value + '&dateEditPt=' + this.$formFieldDateEditPt.value + '&dateEditEn=' + this.$formFieldDateEditEn.value + '&id=' + self.editId;

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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var ajax = new XMLHttpRequest();
      var url = objWbUrl.getController();
      var param = '&c=WbAdminBlog' + '&m=editLoadData' + '&id=' + id;
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
    value: function editFillField(obj) {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.$formFieldTitlePt.value = obj['title_pt'];
      this.$formFieldTitleEn.value = obj['title_en'];
      this.$formFieldUrlPt.value = obj['url_pt'];
      this.$formFieldUrlEn.value = obj['url_en'];
      this.$formFieldContentPt.value = obj['content_pt'];
      this.$formFieldContentEn.value = obj['content_en'];
      this.$formFieldTagPt.value = obj['tag_pt'];
      this.$formFieldTagEn.value = obj['tag_en'];
      this.$formFieldDatePostPt.value = obj['date_post_pt'].substring(0, 10);
      this.$formFieldDatePostEn.value = obj['date_post_en'].substring(0, 10);
      this.$formFieldDateEditPt.value = obj['date_edit_pt'].substring(0, 10);
      this.$formFieldDateEditEn.value = obj['date_edit_en'].substring(0, 10);
      this.editId = obj['id'];
      this.$formFieldTagEn.value = obj['tag_en'];
    }
  }, {
    key: "modify",
    value: function modify(id, status) {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var ajax = new XMLHttpRequest();
      var url = objWbUrl.getController();
      var param = '&c=WbAdminBlog' + '&m=doModify' + '&status=' + status + '&id=' + id;
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var ajax = new XMLHttpRequest();
      var url = objWbUrl.getController();
      var param = '&c=WbAdminBlog' + '&m=doDelete' + '&id=' + id;
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var arrField = [this.$formFieldTitlePt, this.$formFieldTitleEn, this.$formFieldUrlPt, this.$formFieldUrlEn, this.$formFieldContentPt, this.$formFieldContentEn];
      return objWfForm.validateEmpty(arrField);
    }
  }, {
    key: "registerContent",
    value: function registerContent() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;

      if (!this.validateForm()) {
        return;
      }

      var ajax = new XMLHttpRequest();
      var url = objWbUrl.getController();
      var param = '&c=WbAdminBlog' + '&m=doRegister' + '&titlePt=' + this.$formFieldTitlePt.value + '&titleEn=' + this.$formFieldTitleEn.value + '&urlPt=' + this.$formFieldUrlPt.value + '&urlEn=' + this.$formFieldUrlEn.value + '&contentPt=' + this.$formFieldContentPt.value + '&contentEn=' + this.$formFieldContentEn.value + '&datePostPt=' + this.$formFieldDatePostPt.value + '&datePostEn=' + this.$formFieldDatePostEn.value + '&dateEditPt=' + this.$formFieldDateEditPt.value + '&dateEditEn=' + this.$formFieldDateEditEn.value + '&tagPt=' + this.$formFieldTagPt.value + '&tagEn=' + this.$formFieldTagEn.value;
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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

      objWfNotification.add(response, color);
    }
  }, {
    key: "watchTitle",
    value: function watchTitle() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      this.$formFieldTitlePt.addEventListener('focusout', function () {
        var url = objWbUrl.buildSEO(self.$formFieldTitlePt.value);
        self.$formFieldUrlPt.value = url;
      });
      this.$formFieldTitleEn.addEventListener('focusout', function () {
        var url = objWbUrl.buildSEO(self.$formFieldTitleEn.value);
        self.$formFieldUrlEn.value = url;
      });
    }
  }]);

  return WbAdminBlog;
}();

var WbBlog =
/*#__PURE__*/
function () {
  function WbBlog() {
    _classCallCheck(this, WbBlog);

    /*removeIf(production)*/
    objWbDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/

    this.classlaodMore = 'loadMore';
  }

  _createClass(WbBlog, [{
    key: "build",
    value: function build() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      if (!getUrlWord('blog')) {
        return;
      }

      this.update();
      this.buildMenu();
    }
  }, {
    key: "update",
    value: function update() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.page = 'pageBlog';
      this.$lastPost = document.querySelector('#' + this.page + 'LastPost');
      this.$mostViewed = document.querySelector('#' + this.page + 'MostViewed');
    }
  }, {
    key: "buildMenu",
    value: function buildMenu() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;

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
  }, {
    key: "loadMore",
    value: function loadMore(target) {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var parentId = target.parentNode.parentNode.parentNode.getAttribute('id');
      var parentIdString = parentId.substring(this.page.length);
      var ajax = new XMLHttpRequest();
      var url = objWbUrl.getController();
      var param = '&c=WbBlogList' + '&m=buildLoadMoreButtonClick' + '&target=' + parentIdString;
      target.classList.add('disabled');
      ajax.open('POST', url, true);
      ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          target.classList.remove('disabled');
          self.loadMoreSuccess(parentId, ajax.responseText);
        }
      };

      ajax.send(param);
    }
  }, {
    key: "loadMoreSuccess",
    value: function loadMoreSuccess(parentId, value) {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var json = JSON.parse(value);
      var $section = document.querySelector('#' + parentId);
      var $sectionList = $section.querySelector('.blog-list');
      var $bt = $section.querySelector('[data-id="' + this.classlaodMore + '"]');

      if (!json[this.classlaodMore]) {
        $bt.classList.add('disabled');
      }

      $sectionList.insertAdjacentHTML('beforeend', json['html']);
    }
  }]);

  return WbBlog;
}();

var WbLogin =
/*#__PURE__*/
function () {
  function WbLogin() {
    _classCallCheck(this, WbLogin);

    /*removeIf(production)*/
    objWbDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/
  }

  _createClass(WbLogin, [{
    key: "build",
    value: function build() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var ajax = new XMLHttpRequest();
      var url = objWbUrl.getController();
      var param = '&c=WbLogin' + '&m=doLogin' + '&email=' + this.$fielEmail.value + '&password=' + this.$fieldPassword.value;

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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var response = '';
      var $responseElement = this.$page.querySelector('.form');

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
  }]);

  return WbLogin;
}();

var WbManagement =
/*#__PURE__*/
function () {
  function WbManagement() {
    _classCallCheck(this, WbManagement);
  }

  _createClass(WbManagement, [{
    key: "verifyLoad",
    value: function verifyLoad() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      objWbTranslation.build();
      objWbLogin.build();
      objWbAdmin.build();
      objWbAdminBlog.build();
      objWbBlog.build();
    }
  }]);

  return WbManagement;
}();

var WbTranslation =
/*#__PURE__*/
function () {
  function WbTranslation() {
    _classCallCheck(this, WbTranslation);

    /*removeIf(production)*/
    objWbDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/
  }

  _createClass(WbTranslation, [{
    key: "build",
    value: function build() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.update();
      this.defineActive();
      this.buildMenu();
    }
  }, {
    key: "buildMenu",
    value: function buildMenu() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var ajax = new XMLHttpRequest();
      var url = objWbUrl.getController();
      var param = '&c=WbTranslation' + '&m=change' + '&language=' + language;
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.$select.value = globalLanguage;
    }
  }, {
    key: "update",
    value: function update() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.$select = document.querySelector('#translation_select');
    }
  }]);

  return WbTranslation;
}();

var WbUrl =
/*#__PURE__*/
function () {
  function WbUrl() {
    _classCallCheck(this, WbUrl);

    /*removeIf(production)*/
    objWbDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/
  }

  _createClass(WbUrl, [{
    key: "buildSEO",
    value: function buildSEO(url) {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
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
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      return window.location = globalUrl + globalLanguage + '/' + target + '/';
    }
  }, {
    key: "getController",
    value: function getController() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      return globalUrl + 'php/controller.php';
    }
  }]);

  return WbUrl;
}();
/*removeIf(production)*/


var objWbDebug = new WbDebug();
/*endRemoveIf(production)*/

var objWbAdmin = new WbAdmin();
var objWbAdminBlog = new WbAdminBlog();
var objWbBlog = new WbBlog();
var objWbLogin = new WbLogin();
var objWbManagement = new WbManagement();
var objWbTranslation = new WbTranslation();
var objWbUrl = new WbUrl();
objWbManagement.verifyLoad();