class WbAdmin{constructor(){this.pageCurrent=""}build(){getUrlWord("admin")&&(this.updateVariable(),this.buildMenuDifeneActive(),this.builTableTdWrapper())}updateVariable(){this.$page=document.querySelector("#mainContent"),document.contains(this.$page)&&(this.$btBlog=this.$page.querySelector('[data-id="btAdminBlog"]'),this.$btUpload=this.$page.querySelector('[data-id="btAdminImage"]'),this.$btLogout=this.$page.querySelector('[data-id="btAdminLogout"]'))}buildMenuDifeneActive(){let e=window.location.href.split("/"),t=e[e.length-2],i=t.charAt(0).toUpperCase()+t.slice(1),a=document.querySelector('#mainContent [data-id="btAdmin'+i+'"]');null!==a&&a.parentNode.classList.add("menu-tab-active")}builTableTdWrapper(){let e=document.querySelectorAll(".td-wrapper");Array.prototype.forEach.call(e,function(e){e.onclick=function(){e.classList.contains("td-wrapper-auto")?e.classList.remove("td-wrapper-auto"):e.classList.add("td-wrapper-auto")}})}showResponse(e){let t="",i="";switch(e){case"done":location.reload();break;default:t="red",i=globalTranslation.errorAdministrator}objWfNotification.add(i,t)}}class WbAdminBlog{constructor(){}build(){getUrlWord("admin/blog")&&(CKEDITOR.replace("fieldContent",{entities:!1}),this.updateVariable(),this.buildMenu(),this.buildMenuTable(),this.buildMenuThumbnail(),this.watchTitle())}updateVariable(){this.isEdit=!1,this.editId=0,this.$page=document.querySelector("#pageAdminBlog"),this.$contentEdit=document.querySelector("#pageAdminBlogEdit"),this.$contentEditThumbnail=this.$contentEdit.querySelector('[data-id="thumbnailWrapper"]'),this.$contentList=document.querySelector("#pageAdminBlogList"),this.$formRegister=this.$contentEdit.querySelector('[data-id="formRegister"]'),this.$formFieldTitle=this.$contentEdit.querySelector('[data-id="fieldTitle"]'),this.$formFieldUrl=this.$contentEdit.querySelector('[data-id="fieldUrl"]'),this.$formFieldContent=this.$contentEdit.querySelector('[data-id="fieldContent"]'),this.$formFieldTag=this.$contentEdit.querySelector('[data-id="fieldTag"]'),this.$formFieldDatePost=this.$contentEdit.querySelector('[data-id="fieldDatePost"]'),this.$formFieldDateEdit=this.$contentEdit.querySelector('[data-id="fieldDateEdit"]'),this.$thumbnailWrapper=this.$contentEdit.querySelector('[data-id="thumbnailWrapper"]'),this.$formFieldAuthor=document.querySelector('[data-id="author"]'),this.thumbnail="",this.thumbnailDefault="default.jpg",this.thumbnailPath="assets/img/blog/thumbnail/",this.$ckEditor=CKEDITOR.instances.fieldContent,this.$btRegister=this.$page.querySelector('[data-id="btRegister"]')}buildMenu(){const e=this;this.$btRegister.onclick=function(){e.validateForm()&&(e.isEdit?e.editSave():e.saveContent())}}buildMenuThumbnail(){const e=this.$contentEditThumbnail.querySelectorAll(".table");Array.prototype.forEach.call(e,function(e){let t=e.querySelectorAll('[data-action="edit"]');Array.prototype.forEach.call(t,function(e){e.onclick=function(){objWfModal.buildModal("ajax",objWbUrl.getController({folder:"admin",file:"BlogThumbnail"}),"eb")}})})}buildMenuTable(){const e=this,t=this.$contentList.querySelectorAll(".table"),i=this.$contentList.querySelectorAll('[data-id="tableActive"]'),a=this.$contentList.querySelectorAll('[data-id="tableInactive"]');Array.prototype.forEach.call(i,function(e){let t=e.querySelectorAll('[data-action="inactivate"]');Array.prototype.forEach.call(t,function(e){e.onclick=function(){objWfModal.buildModal("confirmation",globalTranslation.confirmationInactivate),objWfModal.buildContentConfirmationAction("objWbAdminBlog.modify("+e.getAttribute("data-id")+', "inactivate")')}})}),Array.prototype.forEach.call(a,function(t){let i=t.querySelectorAll('[data-action="activate"]');Array.prototype.forEach.call(i,function(t){t.onclick=function(){e.modify(t.getAttribute("data-id"),"activate")}})}),Array.prototype.forEach.call(t,function(t){let i=t.querySelectorAll('[data-action="edit"]'),a=t.querySelectorAll('[data-action="delete"]');Array.prototype.forEach.call(i,function(t){t.onclick=function(){e.editId=t.getAttribute("data-id"),e.editLoadData(e.editId)}}),Array.prototype.forEach.call(a,function(e){e.onclick=function(){objWfModal.buildModal("confirmation",globalTranslation.confirmationDelete),objWfModal.buildContentConfirmationAction("objWbAdminBlog.delete("+e.getAttribute("data-id")+")")}})})}editSave(){let e=new XMLHttpRequest,t=objWbUrl.getController({folder:"admin",file:"BlogAjax"}),i="&action=doUpdate&id="+this.editId+this.buildParameter()+"&token="+globalToken;e.open("POST",t,!0),e.setRequestHeader("Content-type","application/x-www-form-urlencoded"),e.onreadystatechange=function(){4==e.readyState&&200==e.status&&objWbAdmin.showResponse(e.responseText)},e.send(i)}editLoadData(e){let t=this,i=new XMLHttpRequest,a=objWbUrl.getController({folder:"admin",file:"BlogAjax"}),o="&action=editLoadData&id="+e+"&token="+globalToken;i.open("POST",a,!0),i.setRequestHeader("Content-type","application/x-www-form-urlencoded"),i.onreadystatechange=function(){if(4==i.readyState&&200==i.status){let e=JSON.parse(i.responseText);document.documentElement.scrollTop=0,t.isEdit=!0,t.editFillField(e),t.thumbnail=e.thumbnail.trim(),t.modifyThumbnail()}},i.send(o)}editFillField(e){const t=e["date_post_"+globalLanguage],i=e["date_edit_"+globalLanguage];this.$formFieldTitle.value=e["title_"+globalLanguage],this.$formFieldUrl.value=e["url_"+globalLanguage],this.$formFieldTag.value=e["tag_"+globalLanguage],this.$formFieldDatePost.value=null!==t?t.substring(0,10):t,this.$formFieldDateEdit.value=null!==i?i.substring(0,10):i,this.editId=e.id,this.$formFieldAuthor.value=e.author_id,this.$ckEditor.setData(e["content_"+globalLanguage],function(){this.checkDirty()})}modify(e,t){let i=new XMLHttpRequest,a=objWbUrl.getController({folder:"admin",file:"BlogAjax"}),o="&action=doModify&status="+t+"&id="+e+"&token="+globalToken;i.open("POST",a,!0),i.setRequestHeader("Content-type","application/x-www-form-urlencoded"),i.onreadystatechange=function(){4==i.readyState&&200==i.status&&objWbAdmin.showResponse(i.responseText)},i.send(o)}delete(e){let t=new XMLHttpRequest,i=objWbUrl.getController({folder:"admin",file:"BlogAjax"}),a="&action=doDelete&id="+e+"&token="+globalToken;t.open("POST",i,!0),t.setRequestHeader("Content-type","application/x-www-form-urlencoded"),t.onreadystatechange=function(){4==t.readyState&&200==t.status&&objWbAdmin.showResponse(t.responseText)},t.send(a)}validateForm(){let e=[this.$formFieldTitle,this.$formFieldUrl];return objWfForm.validateEmpty(e)}buildParameter(){return"&title="+this.$formFieldTitle.value+"&url="+this.$formFieldUrl.value+"&content="+this.$ckEditor.getData()+"&datePost="+this.$formFieldDatePost.value+"&dateEdit="+this.$formFieldDateEdit.value+"&authorId="+this.$formFieldAuthor.value+"&thumbnail="+this.thumbnail+"&tag="+this.$formFieldTag.value}saveContent(){let e=new XMLHttpRequest,t=objWbUrl.getController({folder:"admin",file:"BlogAjax"}),i="&action=doSave"+this.buildParameter()+"&token="+globalToken;e.open("POST",t,!0),e.setRequestHeader("Content-type","application/x-www-form-urlencoded"),e.onreadystatechange=function(){4==e.readyState&&200==e.status&&objWbAdmin.showResponse(e.responseText)},e.send(i)}watchTitle(){let e=this;this.$formFieldTitle.addEventListener("focusout",function(){let t=objWbUrl.buildSEO(e.$formFieldTitle.value);e.$formFieldUrl.value=t})}selectImage(e){let t=e.parentNode.parentNode.parentNode.parentNode.querySelector("header").querySelector('[data-id="imageName"]').innerText;this.thumbnail=t,objWfModal.closeModal(),this.modifyThumbnail()}modifyThumbnail(){let e=this.$thumbnailWrapper.querySelector("table").querySelector('[data-id="thumbnail"]'),t=this.$thumbnailWrapper.querySelector("table").querySelector('[data-id="name"]');""!==this.thumbnail&&null!==this.thumbnail||(this.thumbnail=this.thumbnailDefault),e.setAttribute("src",this.thumbnailPath+this.thumbnail),t.innerHTML=this.thumbnail}}class WbAdminUploadImage{constructor(){this.deleteElement=""}build(){getUrlWord("admin/image")&&(this.updateVariable(),this.buildMenu())}updateVariable(){this.$btUploadThumbnail=document.querySelector('[data-id="btUploadThumbnail"]'),this.$btUploadBanner=document.querySelector('[data-id="btUploadBanner"]')}buildMenu(){const e=this;let t=document.querySelectorAll('[data-action="delete"]');this.$btUploadThumbnail.addEventListener("click",function(t){e.upload(this,"blog/thumbnail/")}),this.$btUploadBanner.addEventListener("click",function(t){e.upload(this,"blog/banner/")}),Array.prototype.forEach.call(t,function(t){t.onclick=function(){e.deleteImage(t)}})}deleteImage(e){this.deleteElement=e,objWfModal.buildModal("confirmation",globalTranslation.confirmationDelete),objWfModal.buildContentConfirmationAction("objWbAdminUploadImage.deleteImageAjax()")}deleteImageAjax(){const e=this,t=new FormData,i=new XMLHttpRequest;let a=this.deleteElement.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector('[data-id="fileName"]').innerText,o=this.deleteElement.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.getAttribute("data-path"),l=this.deleteElement.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;t.append("f",a),t.append("p",o),t.append("token",globalToken),i.open("POST",objWbUrl.getController({folder:"admin",file:"ImageDelete"})),i.onreadystatechange=function(){4==i.readyState&&200==i.status&&(e.buildResponse(i.responseText,l),objWfModal.closeModal())},i.send(t)}upload(e,t){const i=this,a=e.parentNode.parentNode.parentNode.parentNode.parentNode,o=a.querySelector("[type=file]"),l=new FormData,n=new XMLHttpRequest,d=o.files[0],r=objWbUrl.getController({folder:"admin",file:"ImageUpload"});0!==o.files.length?(l.append("p",t),l.append("f",d),l.append("token",globalToken),this.$btUploadThumbnail.setAttribute("disabled","disabled"),n.open("POST",r),n.onreadystatechange=function(){4==n.readyState&&200==n.status&&(i.$btUploadThumbnail.removeAttribute("disabled"),i.buildResponse(n.responseText,a))},n.send(l)):o.click()}buildResponse(e,t){switch(e){case"fileDeleted":case"uploadDone":objWfNotification.add(globalTranslation[e],"green",t),document.location.reload();break;default:objWfNotification.add(globalTranslation[e],"red",t)}}}class WbAdminUser{build(){getUrlWord("admin/user")&&(this.updateVariable(),this.buildMenu(),this.buildMenuTable())}updateVariable(){this.isEdit=!1,this.editId=0,this.$page=document.querySelector("#pageAdminUser"),this.$formRegister=this.$page.querySelector('[data-id="formRegister"]'),this.$formFieldName=this.$formRegister.querySelector('[data-id="name"]'),this.$formFieldEmail=this.$formRegister.querySelector('[data-id="email"]'),this.$formFieldPassword=this.$formRegister.querySelector('[data-id="password"]'),this.$formFieldPermission=this.$formRegister.querySelector('[data-id="permission"]'),this.$formSend=this.$formRegister.querySelector('[data-id="send"]')}buildMenu(){const e=this;this.$formSend.onclick=function(){e.validateForm()&&(e.isEdit?e.editSave():e.saveContent())}}buildMenuTable(){let e=this,t=this.$page.querySelectorAll(".table"),i=this.$page.querySelectorAll('[data-id="tableActive"]'),a=this.$page.querySelectorAll('[data-id="tableInactive"]');Array.prototype.forEach.call(i,function(e){let t=e.querySelectorAll('[data-action="inactivate"]');Array.prototype.forEach.call(t,function(e){e.onclick=function(){objWfModal.buildModal("confirmation",globalTranslation.confirmationInactivate),objWfModal.buildContentConfirmationAction("objWbAdminUser.modify("+e.getAttribute("data-id")+', "inactivate")')}})}),Array.prototype.forEach.call(a,function(t){let i=t.querySelectorAll('[data-action="activate"]');Array.prototype.forEach.call(i,function(t){t.onclick=function(){e.modify(t.getAttribute("data-id"),"activate")}})}),Array.prototype.forEach.call(t,function(t){let i=t.querySelectorAll('[data-action="edit"]'),a=t.querySelectorAll('[data-action="delete"]');Array.prototype.forEach.call(i,function(t){t.onclick=function(){e.editId=t.getAttribute("data-id"),e.editLoadData(e.editId)}}),Array.prototype.forEach.call(a,function(e){e.onclick=function(){objWfModal.buildModal("confirmation",globalTranslation.confirmationDelete),objWfModal.buildContentConfirmationAction("objWbAdminUser.delete("+e.getAttribute("data-id")+")")}})})}modify(e,t){let i=new XMLHttpRequest,a=objWbUrl.getController({folder:"admin",file:"UserAjax"}),o="&action=doModify&status="+t+"&id="+e+"&token="+globalToken;i.open("POST",a,!0),i.setRequestHeader("Content-type","application/x-www-form-urlencoded"),i.onreadystatechange=function(){4==i.readyState&&200==i.status&&objWbAdmin.showResponse(i.responseText)},i.send(o)}delete(e){let t=new XMLHttpRequest,i=objWbUrl.getController({folder:"admin",file:"UserAjax"}),a="&action=doDelete&id="+e+"&token="+globalToken;t.open("POST",i,!0),t.setRequestHeader("Content-type","application/x-www-form-urlencoded"),t.onreadystatechange=function(){4==t.readyState&&200==t.status&&objWbAdmin.showResponse(t.responseText)},t.send(a)}editLoadData(e){let t=this,i=new XMLHttpRequest,a=objWbUrl.getController({folder:"admin",file:"UserAjax"}),o="&action=editLoadData&id="+e+"&token="+globalToken;i.open("POST",a,!0),i.setRequestHeader("Content-type","application/x-www-form-urlencoded"),i.onreadystatechange=function(){if(4==i.readyState&&200==i.status){let e=JSON.parse(i.responseText);document.documentElement.scrollTop=0,t.editFillField(e)}},i.send(o)}editFillField(e){this.isEdit=!0,this.$formFieldName.value=e.name,this.$formFieldEmail.value=e.email,this.$formFieldPassword.value="",this.editId=e.id,this.$formFieldPermission.value=e.permission}editSave(){let e=new XMLHttpRequest,t=objWbUrl.getController({folder:"admin",file:"UserAjax"}),i="&action=doUpdate&id="+this.editId+this.buildParameter()+"&token="+globalToken;e.open("POST",t,!0),e.setRequestHeader("Content-type","application/x-www-form-urlencoded"),e.onreadystatechange=function(){4==e.readyState&&200==e.status&&objWbAdmin.showResponse(e.responseText)},e.send(i)}saveContent(){let e=new XMLHttpRequest,t=objWbUrl.getController({folder:"admin",file:"UserAjax"}),i="&action=doSave"+this.buildParameter()+"&token="+globalToken;e.open("POST",t,!0),e.setRequestHeader("Content-type","application/x-www-form-urlencoded"),e.onreadystatechange=function(){4==e.readyState&&200==e.status&&objWbAdmin.showResponse(e.responseText)},e.send(i)}validateForm(){let e=[this.$formFieldEmail,this.$formFieldPassword];return objWfForm.validateEmpty(e)}buildParameter(){return"&name="+this.$formFieldName.value+"&email="+this.$formFieldEmail.value+"&permission="+this.$formFieldPermission.value+"&password="+this.$formFieldPassword.value}}class WbLogin{build(){getUrlWord("login")&&(this.update(),this.buildMenu())}update(){this.isSignUp=!1,this.$page=document.querySelector("#pageAdminLogin"),this.$buttonLogin=document.querySelector("#pageAdminLoginBt"),this.$fielEmail=document.querySelector("#pageAdminLoginUser"),this.$fieldPassword=document.querySelector("#pageAdminLoginPassword")}buildMenu(){let e=this;this.$buttonLogin.addEventListener("click",function(t){e.buildLogin()})}validate(){return""===this.$fielEmail.value?(this.$fielEmail.focus(),void this.buildLoginResponse("empty_email")):""!==this.$fieldPassword.value||(this.$fieldPassword.focus(),void this.buildLoginResponse("empty_password"))}buildLogin(){let e=this,t=new XMLHttpRequest,i=objWbUrl.getController({folder:"admin",file:"LoginAjax"}),a="&email="+this.$fielEmail.value+"&password="+this.$fieldPassword.value+"&token="+globalToken;this.validate()&&(this.$buttonLogin.setAttribute("disabled","disabled"),t.open("POST",i,!0),t.setRequestHeader("Content-type","application/x-www-form-urlencoded"),t.onreadystatechange=function(){4==t.readyState&&200==t.status&&(e.$buttonLogin.removeAttribute("disabled"),e.buildLoginResponse(t.responseText))},t.send(a))}buildLoginResponse(e){let t="",i=this.$page.querySelector(".form");switch(e){case"inactive":t=globalTranslation.loginInactive;break;case"problem":t=globalTranslation.loginFail,this.$fielEmail.focus();break;case"empty_email":t=globalTranslation.emptyField,this.$fielEmail.focus();break;case"empty_password":t=globalTranslation.emptyField,this.$fieldPassword.focus();break;default:objWbUrl.build("admin")}objWfNotification.add(t,"red",i)}}class WbManagementAdmin{verifyLoad(){window.addEventListener("load",this.applyClass(),{once:!0})}applyClass(){objWbLogin.build(),objWbAdmin.build(),objWbAdminBlog.build(),objWbAdminUploadImage.build(),objWbAdminUser.build()}}var objWbAdmin=new WbAdmin,objWbAdminBlog=new WbAdminBlog,objWbAdminUploadImage=new WbAdminUploadImage,objWbAdminUser=new WbAdminUser,objWbLogin=new WbLogin,objWbManagementAdmin=new WbManagementAdmin;objWbManagementAdmin.verifyLoad();