"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var FrameworkAdmin =
/*#__PURE__*/
function () {
  function FrameworkAdmin() {
    _classCallCheck(this, FrameworkAdmin);

    /*removeIf(production)*/
    objFrameworkDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/

    this.pageCurrent = '';
  }

  _createClass(FrameworkAdmin, [{
    key: "applyClass",
    value: function applyClass() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.updateVariable();
      this.buildMenu();
      this.buildMenuDifeneActive();
      this.builTableTdWrapper();
    }
  }, {
    key: "updateVariable",
    value: function updateVariable() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.$page = $('#admin');
      this.$menuMain = this.$page.find('[data-id="menu_main"]');
      this.$btPage = this.$page.find('[data-id="bt_page"]');
      this.$btBlog = this.$page.find('[data-id="bt_blog"]');
      this.$btLogout = this.$page.find('[data-id="bt_logout"]');
    }
  }, {
    key: "buildMenu",
    value: function buildMenu() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      this.$menuMain.find('.bt').on('click', function () {
        var dataId = $(this).attr('data-id');
        self.buildMenuChangePage(dataId.substring(3));
      });
      this.$btLogout.on('click', function () {
        self.buildLogout();
      });
    }
  }, {
    key: "buildMenuChangePage",
    value: function buildMenuChangePage(page) {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.buildMenuDifeneActive(page);

      if (page !== 'logout') {
        window.location.href = 'admin/index.php?p=' + page;
      }
    }
  }, {
    key: "buildMenuDifeneActive",
    value: function buildMenuDifeneActive() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var classActive = 'menu-tab-active';
      var page = objFrameworkLayout.getUrlParameter('p');
      this.pageCurrent = page;
      this.$menuMain.find('.bt').parent().removeClass(classActive);
      this.$menuMain.find('[data-id="bt_' + page + '"]').parent().addClass(classActive);
    }
  }, {
    key: "buildLogout",
    value: function buildLogout() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      $.ajax({
        url: '../php/controller.php',
        data: '&c=FrameworkLogin' + '&m=doLogout',
        success: function success(data) {
          switch (data) {
            case '1':
              window.location = 'admin/index.php';
              break;
          }
        }
      });
    }
  }, {
    key: "builTableTdWrapper",
    value: function builTableTdWrapper() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      $('.td-wrapper').unbind().on('click', function () {
        $(this).toggleClass('td-wrapper-auto');
      });
    }
  }]);

  return FrameworkAdmin;
}();

var FrameworkAdminBlog =
/*#__PURE__*/
function () {
  function FrameworkAdminBlog() {
    _classCallCheck(this, FrameworkAdminBlog);

    /*removeIf(production)*/
    objFrameworkDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/

    this.isEdit = false;
    this.editId = 0;
  }

  _createClass(FrameworkAdminBlog, [{
    key: "applyClass",
    value: function applyClass() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
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
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.$table = objFrameworkAdmin.$page.find('.table');
      this.$tableActive = objFrameworkAdmin.$page.find('[data-id="table_active"]');
      this.$tableInactive = objFrameworkAdmin.$page.find('[data-id="table_inactive"]');
      this.$btRegister = objFrameworkAdmin.$page.find('[data-id="bt_register"]');
      this.$formRegister = objFrameworkAdmin.$page.find('[data-id="form_register"]');
      this.$formFieldTitle = objFrameworkAdmin.$page.find('[data-id="field_title"]');
      this.$formFieldUrl = objFrameworkAdmin.$page.find('[data-id="field_url"]');
      this.$formFieldContent = objFrameworkAdmin.$page.find('[data-id="field_content"]');
      this.$formFieldTag = objFrameworkAdmin.$page.find('[data-id="field_tag"]');
    }
  }, {
    key: "buildMenu",
    value: function buildMenu() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
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
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      this.$table.find('.bt').unbind();
      this.$tableActive.find('[data-action="inactivate"]').on('click', function () {
        objFrameworkModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
        objFrameworkModal.buildContentConfirmationAction('objFrameworkAdminBlog.modify(' + $(this).attr('data-id') + ', "inactivate")');
      });
      this.$tableInactive.find('[data-action="activate"]').on('click', function () {
        self.modify($(this).attr('data-id'), 'activate');
      });
      this.$table.find('[data-action="edit"]').on('click', function () {
        self.editId = $(this).attr('data-id');
        self.editLoadData(self.editId);
      });
      this.$table.find('[data-action="delete"]').on('click', function () {
        objFrameworkModal.buildModal('confirmation', 'Deseja realmente desativar este conteúdo?');
        objFrameworkModal.buildContentConfirmationAction('objFrameworkAdminBlog.delete(' + $(this).attr('data-id') + ')');
      });
    }
  }, {
    key: "editSave",
    value: function editSave() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;

      if (this.validateForm()) {
        $.ajax({
          url: '../php/controller.php',
          data: '&c=FrameworkAdminBlog' + '&m=doUpdate' + '&title=' + this.$formFieldTitle.val() + '&url=' + this.$formFieldUrl.val() + '&content=' + this.$formFieldContent.val() + '&tag=' + this.$formFieldTag.val() + '&id=' + self.editId,
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
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      $.ajax({
        url: '../php/controller.php',
        data: '&c=FrameworkAdminBlog' + '&m=editLoadData' + '&id=' + id,
        type: 'POST',
        success: function success(data) {
          var obj = $.parseJSON(data);
          objTheme.doSlide(self.$formRegister);
          self.isEdit = true;
          self.editFillField(obj);
        }
      });
    }
  }, {
    key: "editFillField",
    value: function editFillField(json) {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
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
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      $.ajax({
        url: '../php/controller.php',
        data: '&c=FrameworkAdminBlog' + '&m=doModify' + '&s=' + status + '&id=' + Number(id),
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
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      $.ajax({
        url: '../php/controller.php',
        data: '&c=FrameworkAdminBlog' + '&m=doDelete' + '&id=' + Number(id),
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
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var arrField = [this.$formFieldTitle, this.$formFieldUrl, this.$formFieldContent, this.$formFieldTag];
      return objFrameworkForm.validateEmpty(arrField);
    }
  }, {
    key: "registerContent",
    value: function registerContent() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;

      if (this.validateForm()) {
        $.ajax({
          url: '../php/controller.php',
          data: '&c=FrameworkAdminBlog' + '&m=doRegister' + '&title=' + this.$formFieldTitle.val() + '&url=' + this.$formFieldUrl.val() + '&content=' + this.$formFieldContent.val() + '&tag=' + this.$formFieldTag.val(),
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
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
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

      objFrameworkNotification.addNotification(response, color);
    }
  }, {
    key: "watchTitle",
    value: function watchTitle() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      this.$formFieldTitle.on('focusout', function () {
        var url = objFrameworkGeneric.buildURL(self.$formFieldTitle.val());
        self.$formFieldUrl.val(url);
      });
    }
  }]);

  return FrameworkAdminBlog;
}();

var FrameworkAdminPage =
/*#__PURE__*/
function () {
  function FrameworkAdminPage() {
    _classCallCheck(this, FrameworkAdminPage);

    /*removeIf(production)*/
    objFrameworkDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/
  }

  _createClass(FrameworkAdminPage, [{
    key: "applyClass",
    value: function applyClass() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.updateVariable();
    }
  }, {
    key: "updateVariable",
    value: function updateVariable() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/
    }
  }]);

  return FrameworkAdminPage;
}();

var FrameworkLayout =
/*#__PURE__*/
function () {
  function FrameworkLayout() {
    _classCallCheck(this, FrameworkLayout);

    /*removeIf(production)*/
    objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
    /*endRemoveIf(production)*/

    this.$loadingMain = $('#loading_main');
    this.$body = $('body');
    this.$window = $(window);
    this.breakPointExtraSmall = 0;
    this.breakPointSmall = 576;
    this.breakPointMedium = 768;
    this.breakPointBig = 992;
    this.breakPointExtraBig = 1200;
  }

  _createClass(FrameworkLayout, [{
    key: "buildLayout",
    value: function buildLayout() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      $('button, a').on('click', function (event) {
        event.stopPropagation();
      });
    }
  }, {
    key: "switchDisplay",
    value: function switchDisplay(target) {
      var action = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';

      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName(), [target, action]);
      /*endRemoveIf(production)*/

      var classDisplay = 'display-none';

      if (action === '') {
        if (target.hasClass(classDisplay)) {
          action = 'show';
        } else {
          action = 'hide';
        }
      }

      switch (action) {
        case 'show':
          $(target).removeClass(classDisplay);
          break;

        case 'hide':
          $(target).addClass(classDisplay);
          break;
      }
    }
  }, {
    key: "buildSpinner",
    value: function buildSpinner(style) {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName(), style);
      /*endRemoveIf(production)*/

      var spinner = '';
      spinner += '<div class="row text-center">';
      spinner += '    <div class="col-es-12">';
      spinner += '        <span class="fa fa-circle-o-notch fa-spin fa-2x color-' + style + '"></span>';
      spinner += '    </div>';
      spinner += '</div>';
      return spinner;
    }
  }, {
    key: "buildToggle",
    value: function buildToggle() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      $('.bt-toggle').each(function () {
        $(this).unbind();
        $(this).on('click', function () {
          var $nav = $(this).siblings('nav').find(' > ul');
          var $navAll = $(this).siblings('nav').find('ul');
          var $class = 'mobile-show';

          if ($nav.hasClass($class)) {
            $nav.removeClass($class);
            $navAll.removeClass($class);
          } else {
            $nav.addClass($class);
          }
        });
      });
    }
  }, {
    key: "getUrlParameter",
    value: function getUrlParameter(target) {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName(), target);
      /*endRemoveIf(production)*/

      var url = top.location.search.substring(1);
      var parameter = url.split('&');

      for (var i = 0; i < parameter.length; i++) {
        var parameterName = parameter[i].split('=');

        if (parameterName[0] === target) {
          return parameterName[1];
        }
      }
    }
  }, {
    key: "verifyHasFodler",
    value: function verifyHasFodler(target) {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName(), target);
      /*endRemoveIf(production)*/

      var arrFolder = window.location.pathname.split('/');

      if (arrFolder.indexOf(target) > -1) {
        return true;
      } else {
        return false;
      }
    }
  }, {
    key: "verifyUndefined",
    value: function verifyUndefined(target) {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName(), target);
      /*endRemoveIf(production)*/

      if (typeof target === 'undefined' || target === null || target === '') {
        return true;
      } else {
        return false;
      }
    }
  }]);

  return FrameworkLayout;
}();

var FrameworkLogin =
/*#__PURE__*/
function () {
  function FrameworkLogin() {
    _classCallCheck(this, FrameworkLogin);

    /*removeIf(production)*/
    objFrameworkDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/

    this.isSignUp = false;
    this.$page = $('#page_login');
    this.$buttonLogin = $('#page_login_bt');
    this.$fielEmail = $('#page_login_user');
    this.$fieldPassword = $('#page_login_password');
  }

  _createClass(FrameworkLogin, [{
    key: "buildMenu",
    value: function buildMenu() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      this.$buttonLogin.on('click', function () {
        self.buildLogin();
      });
    }
  }, {
    key: "buildLoginPageLogin",
    value: function buildLoginPageLogin() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      if (this.$fielEmail.val() === '') {
        this.$fielEmail.focus();
      }
    }
  }, {
    key: "buildLogin",
    value: function buildLogin() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;

      if (this.$fielEmail.val() === '') {
        this.$fielEmail.focus();
        this.buildLoginResponse('empty_email');
        return false;
      }

      if (this.$fieldPassword.val() === '') {
        this.buildLoginResponse('empty_password');
        this.$fieldPassword.focus();
        return false;
      }

      this.$buttonLogin.prop('disabled', true);
      $.ajax({
        url: '../php/controller.php',
        data: '&c=FrameworkLogin' + '&m=doLogin' + '&email=' + this.$fielEmail.val() + '&password=' + this.$fieldPassword.val(),
        type: 'POST',
        success: function success(data) {
          self.$buttonLogin.prop('disabled', false);
          self.buildLoginResponse(data);
        }
      });
    }
  }, {
    key: "buildLoginResponse",
    value: function buildLoginResponse(data) {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var response = '';

      switch (data) {
        case 'inactive':
          response = objFrameworkTranslation.translation.template.login_inactive;
          break;

        case 'wrong_email':
          response = objFrameworkTranslation.translation.template.login_wrong_email;
          this.$fielEmail.focus();
          break;

        case 'wrong_password':
          response = objFrameworkTranslation.translation.template.login_wrong_password;
          this.$fieldPassword.focus();
          break;

        case 'empty_email':
          response = objFrameworkTranslation.translation.template.login_empty;
          this.$fielEmail.focus();
          break;

        case 'empty_password':
          response = objFrameworkTranslation.translation.template.login_empty;
          this.$fieldPassword.focus();
          break;

        case '0':
        case '1':
        case '2':
        case '3':
          window.location = 'admin/index.php?p=page';
          break;
      }

      objFrameworkNotification.addNotification(response, 'red', this.$page.find('.form-field:last'));
    }
  }]);

  return FrameworkLogin;
}();

var FrameworkAdminManagement =
/*#__PURE__*/
function () {
  function FrameworkAdminManagement() {
    _classCallCheck(this, FrameworkAdminManagement);
  }

  _createClass(FrameworkAdminManagement, [{
    key: "verifyLoad",
    value: function verifyLoad() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      objFrameworkLayout.$window.on('load', function () {
        $.when(objFrameworkTranslation.loadFile()).then(function () {
          self.applyClass();

          if (objFrameworkLayout.verifyHasFodler('admin')) {
            self.applyClass();
          }
        });
      });
    }
  }, {
    key: "applyClass",
    value: function applyClass() {
      /*removeIf(production)*/
      objFrameworkDebug.debugMethod(this, objFrameworkDebug.getMethodName());
      /*endRemoveIf(production)*/

      objFrameworkLogin.buildMenu();
      objFrameworkAdmin.applyClass();
      objFrameworkAdminBlog.applyClass();
      objFrameworkAdminPage.applyClass();
    }
  }]);

  return FrameworkAdminManagement;
}();
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