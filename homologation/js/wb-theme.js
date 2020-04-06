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

      this.$btBlog = this.$page.querySelector('[data-id="btBlog"]');
      this.$btLogout = this.$page.querySelector('[data-id="btLogout"]');
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
      var selector = document.querySelector('#pageAdminBlog [data-id="' + target + '"]');

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
      var parameter = '&c=WbLogin' + '&m=doLogout';
      ajax.open('POST', objWbUrl.getController(), true);
      ajax.send(parameter);
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

      CKEDITOR.replace('fieldContentPt');
      CKEDITOR.replace('fieldContentEn');
      this.updateVariable();
      this.buildMenu();
      this.buildMenuTable();
      this.buildMenuThumbnail();
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
      this.$page = document.querySelector('#pageAdminBlog');
      this.$contentEdit = document.querySelector('#pageAdminBlogEdit');
      this.$contentEditThumbnail = this.$contentEdit.querySelector('[data-id="thumbnailWrapper"]');
      this.$contentList = document.querySelector('#pageAdminBlogList');
      this.$formRegister = this.$contentEdit.querySelector('[data-id="formRegister"]');
      this.$formFieldTitlePt = this.$contentEdit.querySelector('[data-id="fieldTitlePt"]');
      this.$formFieldTitleEn = this.$contentEdit.querySelector('[data-id="fieldTitleEn"]');
      this.$formFieldUrlPt = this.$contentEdit.querySelector('[data-id="fieldUrlPt"]');
      this.$formFieldUrlEn = this.$contentEdit.querySelector('[data-id="fieldUrlEn"]');
      this.$formFieldContentPt = this.$contentEdit.querySelector('[data-id="fieldContentPt"]');
      this.$formFieldContentEn = this.$contentEdit.querySelector('[data-id="fieldContentEn"]');
      this.$formFieldTagPt = this.$contentEdit.querySelector('[data-id="fieldTagPt"]');
      this.$formFieldTagEn = this.$contentEdit.querySelector('[data-id="fieldTagEn"]');
      this.$formFieldDatePostPt = this.$contentEdit.querySelector('[data-id="fieldDatePostPt"]');
      this.$formFieldDatePostEn = this.$contentEdit.querySelector('[data-id="fieldDatePostEn"]');
      this.$formFieldDateEditPt = this.$contentEdit.querySelector('[data-id="fieldDateEditPt"]');
      this.$formFieldDateEditEn = this.$contentEdit.querySelector('[data-id="fieldDateEditEn"]');
      this.$formFieldTagEn = this.$contentEdit.querySelector('[data-id="fieldTagEn"]');
      this.$thumbnailWrapper = this.$contentEdit.querySelector('[data-id="thumbnailWrapper"]');
      this.thumbnail = '';
      this.thumbnailDefault = 'default.jpg';
      this.thumbnailPath = 'img/blog/thumbnail/';
      this.$ckEditorPt = CKEDITOR.instances.fieldContentPt;
      this.$ckEditorEn = CKEDITOR.instances.fieldContentEn;
    }
  }, {
    key: "buildMenu",
    value: function buildMenu() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var $btRegister = this.$page.querySelector('[data-id="btRegister"]');

      $btRegister.onclick = function () {
        if (self.isEdit) {
          self.editSave();
        } else {
          self.saveContent();
        }
      };
    }
  }, {
    key: "buildMenuThumbnail",
    value: function buildMenuThumbnail() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var $target = this.$contentEditThumbnail.querySelectorAll('.table');
      Array.prototype.forEach.call($target, function (table) {
        var $button = table.querySelectorAll('[data-action="edit"]');
        Array.prototype.forEach.call($button, function (item) {
          item.onclick = function () {
            objWfModal.buildModal('ajax', './admin-upload-image-list.php', 'eb');
          };
        });
      });
    }
  }, {
    key: "buildMenuTable",
    value: function buildMenuTable() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var $table = this.$contentList.querySelectorAll('.table');
      var $tableActive = this.$contentList.querySelectorAll('[data-id="tableActive"]');
      var $tableInactive = this.$contentList.querySelectorAll('[data-id="tableInactive"]');
      Array.prototype.forEach.call($tableActive, function (table) {
        var $button = table.querySelectorAll('[data-action="inactivate"]');
        Array.prototype.forEach.call($button, function (item) {
          item.onclick = function () {
            objWfModal.buildModal('confirmation', globalTranslation.confirmationInactivate);
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
            objWfModal.buildModal('confirmation', globalTranslation.confirmationInactivate);
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
      var parameter = '&c=WbAdminBlog' + '&m=doUpdate' + '&id=' + self.editId + this.buildParameter();

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

      ajax.send(parameter);
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
      var parameter = '&c=WbAdminBlog' + '&m=editLoadData' + '&id=' + id;
      ajax.open('POST', url, true);
      ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          var obj = JSON.parse(ajax.responseText);
          document.documentElement.scrollTop = 0;
          self.isEdit = true;
          self.editFillField(obj);
          self.thumbnail = obj['thumbnail'];
          self.modifyThumbnail();
        }
      };

      ajax.send(parameter);
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
      this.$formFieldTagPt.value = obj['tag_pt'];
      this.$formFieldTagEn.value = obj['tag_en'];
      this.$formFieldDatePostPt.value = obj['date_post_pt'].substring(0, 10);
      this.$formFieldDatePostEn.value = obj['date_post_en'].substring(0, 10);
      this.$formFieldDateEditPt.value = obj['date_edit_pt'].substring(0, 10);
      this.$formFieldDateEditEn.value = obj['date_edit_en'].substring(0, 10);
      this.editId = obj['id'];
      this.$formFieldTagEn.value = obj['tag_en'];
      this.$ckEditorPt.setData(obj['content_pt'], function () {
        this.checkDirty();
      });
      this.$ckEditorEn.setData(obj['content_en'], function () {
        this.checkDirty();
      });
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
      var parameter = '&c=WbAdminBlog' + '&m=doModify' + '&status=' + status + '&id=' + id;
      ajax.open('POST', url, true);
      ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          self.showResponse(ajax.responseText);
        }
      };

      ajax.send(parameter);
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
      var parameter = '&c=WbAdminBlog' + '&m=doDelete' + '&id=' + id;
      ajax.open('POST', url, true);
      ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          self.showResponse(ajax.responseText);
        }
      };

      ajax.send(parameter);
    }
  }, {
    key: "validateForm",
    value: function validateForm() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var arrField = [this.$formFieldTitlePt, this.$formFieldTitleEn, this.$formFieldUrlPt, this.$formFieldUrlEn];
      return objWfForm.validateEmpty(arrField);
    }
  }, {
    key: "buildParameter",
    value: function buildParameter() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      return '' + '&titlePt=' + this.$formFieldTitlePt.value + '&titleEn=' + this.$formFieldTitleEn.value + '&urlPt=' + this.$formFieldUrlPt.value + '&urlEn=' + this.$formFieldUrlEn.value + '&contentPt=' + this.$ckEditorPt.getData() + '&contentEn=' + this.$ckEditorEn.getData() + '&datePostPt=' + this.$formFieldDatePostPt.value + '&datePostEn=' + this.$formFieldDatePostEn.value + '&dateEditPt=' + this.$formFieldDateEditPt.value + '&dateEditEn=' + this.$formFieldDateEditEn.value + '&thumbnail=' + this.thumbnail + '&tagPt=' + this.$formFieldTagPt.value + '&tagEn=' + this.$formFieldTagEn.value;
    }
  }, {
    key: "saveContent",
    value: function saveContent() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;

      if (!this.validateForm()) {
        return;
      }

      var ajax = new XMLHttpRequest();
      var url = objWbUrl.getController();
      var parameter = '&c=WbAdminBlog' + '&m=doSave' + this.buildParameter();
      ajax.open('POST', url, true);
      ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          self.showResponse(ajax.responseText);
        }
      };

      ajax.send(parameter);
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
  }, {
    key: "selectImage",
    value: function selectImage(target) {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var $card = target.parentNode.parentNode.parentNode.parentNode;
      var imageName = $card.querySelector('header').querySelector('[data-id="imageName"]').innerText;
      this.thumbnail = imageName;
      objWfModal.closeModal();
      this.modifyThumbnail();
    }
  }, {
    key: "modifyThumbnail",
    value: function modifyThumbnail() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var $image = this.$thumbnailWrapper.querySelector('table').querySelector('[data-id="thumbnail"]');
      var $name = this.$thumbnailWrapper.querySelector('table').querySelector('[data-id="name"]');

      if (this.thumbnail === '' || this.thumbnail === null) {
        this.thumbnail = this.thumbnailDefault;
      }

      $image.setAttribute('src', this.thumbnailPath + this.thumbnail);
      $name.innerHTML = this.thumbnail;
    }
  }]);

  return WbAdminBlog;
}();

var WbAdminUploadImage =
/*#__PURE__*/
function () {
  function WbAdminUploadImage() {
    _classCallCheck(this, WbAdminUploadImage);

    /*removeIf(production)*/
    objWbDebug.debugMethod(this, 'constructor');
    /*endRemoveIf(production)*/

    this.deleteElement = '';
  }

  _createClass(WbAdminUploadImage, [{
    key: "build",
    value: function build() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      if (!getUrlWord('admin-upload-image')) {
        return;
      }

      this.updateVariable();
      this.buildMenu();
    }
  }, {
    key: "updateVariable",
    value: function updateVariable() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.$btUploadThumbnail = document.querySelector('[data-id="btUploadThumbnail"]');
      this.$btUploadBanner = document.querySelector('[data-id="btUploadBanner"]');
    }
  }, {
    key: "buildMenu",
    value: function buildMenu() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var $buttonDelete = document.querySelectorAll('[data-action="delete"]');
      this.$btUploadThumbnail.addEventListener('click', function (event) {
        self.upload(this, 'blog/thumbnail/');
      });
      this.$btUploadBanner.addEventListener('click', function (event) {
        self.upload(this, 'blog/banner/');
      });
      Array.prototype.forEach.call($buttonDelete, function (item) {
        item.onclick = function () {
          self.deleteImage(item);
        };
      });
    }
  }, {
    key: "deleteImage",
    value: function deleteImage(button) {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      this.deleteElement = button;
      objWfModal.buildModal('confirmation', globalTranslation.confirmationDelete);
      objWfModal.buildContentConfirmationAction('objWbAdminUploadImage.deleteImageAjax()');
    }
  }, {
    key: "deleteImageAjax",
    value: function deleteImageAjax() {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var data = new FormData();
      var ajax = new XMLHttpRequest();
      var file = this.deleteElement.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector('[data-id="fileName"]').innerText;
      var path = this.deleteElement.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.getAttribute('data-path');
      var $return = this.deleteElement.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
      data.append('c', 'WbAdminUploadImage');
      data.append('m', 'delete');
      data.append('f', file);
      data.append('p', path);
      ajax.open('POST', objWbUrl.getController());

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          self.buildResponse(ajax.responseText, $return);
          objWfModal.closeModal();
        }
      };

      ajax.send(data);
    }
  }, {
    key: "upload",
    value: function upload(target, path) {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      var self = this;
      var $form = target.parentNode.parentNode.parentNode.parentNode.parentNode;
      var $file = $form.querySelector('[type=file]');
      var data = new FormData();
      var ajax = new XMLHttpRequest();
      var file = $file.files[0];
      var url = objWbUrl.getController();

      if ($file.files.length === 0) {
        $file.click();
        return;
      }

      data.append('c', 'WbAdminUploadImage');
      data.append('m', 'upload');
      data.append('p', path);
      data.append('f', file);
      this.$btUploadThumbnail.setAttribute('disabled', 'disabled');
      ajax.open('POST', url);

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          self.$btUploadThumbnail.removeAttribute('disabled');
          self.buildResponse(ajax.responseText, $form);
        }
      };

      ajax.send(data);
    }
  }, {
    key: "buildResponse",
    value: function buildResponse(response, $target) {
      /*removeIf(production)*/
      objWbDebug.debugMethod(this, objWbDebug.getMethodName());
      /*endRemoveIf(production)*/

      switch (response) {
        case 'fileDeleted':
        case 'uploadDone':
          objWfNotification.add(globalTranslation[response], 'green', $target);
          document.location.reload();
          break;

        default:
          objWfNotification.add(globalTranslation[response], 'red', $target);
          break;
      }
    }
  }]);

  return WbAdminUploadImage;
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
      var parameter = '&c=WbBlogList' + '&m=buildLoadMoreButtonClick' + '&target=' + parentIdString;
      target.classList.add('disabled');
      ajax.open('POST', url, true);
      ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          target.classList.remove('disabled');
          self.loadMoreSuccess(parentId, ajax.responseText);
        }
      };

      ajax.send(parameter);
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
      window.scrollTo(0, document.documentElement.scrollTop + 1);
      window.scrollTo(0, document.documentElement.scrollTop - 1);
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
      this.$page = document.querySelector('#pageAdminLogin');
      this.$buttonLogin = document.querySelector('#pageAdminLoginBt');
      this.$fielEmail = document.querySelector('#pageAdminLoginUser');
      this.$fieldPassword = document.querySelector('#pageAdminLoginPassword');
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
      var parameter = '&c=WbLogin' + '&m=doLogin' + '&email=' + this.$fielEmail.value + '&password=' + this.$fieldPassword.value;

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

      ajax.send(parameter);
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
      objWbAdminUploadImage.build();
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
      var parameter = '&c=WbTranslation' + '&m=change' + '&language=' + language;
      ajax.open('POST', url, true);
      ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
          location.reload();
        }
      };

      ajax.send(parameter);
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

      this.$select = document.querySelector('#translationSelect');
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
var objWbAdminUploadImage = new WbAdminUploadImage();
var objWbBlog = new WbBlog();
var objWbLogin = new WbLogin();
var objWbManagement = new WbManagement();
var objWbTranslation = new WbTranslation();
var objWbUrl = new WbUrl();
objWbManagement.verifyLoad();