class WbBlog{constructor(){this.classlaodMore="loadMore"}build(){getUrlWord("blog")&&(this.update(),this.buildMenu())}update(){this.page="pageBlog",this.$lastPost=document.querySelector("#"+this.page+"LastPost"),this.$mostViewed=document.querySelector("#"+this.page+"MostViewed")}buildMenu(){let e=this;this.$lastPost&&(document.contains(this.$lastPost.querySelector('[data-id="'+this.classlaodMore+'"]'))&&this.$lastPost.querySelector('[data-id="'+this.classlaodMore+'"]').addEventListener("click",function(t){e.loadMore(this)}),document.contains(this.$mostViewed.querySelector('[data-id="'+this.classlaodMore+'"]'))&&this.$mostViewed.querySelector('[data-id="'+this.classlaodMore+'"]').addEventListener("click",function(t){e.loadMore(this)}))}loadMore(e){let t=this,o=e.parentNode.parentNode.parentNode.getAttribute("id"),a=o.substring(this.page.length),s=new XMLHttpRequest,l=objWbUrl.getController({folder:"blog",file:"LoadMore"}),r="&target="+a;e.classList.add("disabled"),s.open("POST",l,!0),s.setRequestHeader("Content-type","application/x-www-form-urlencoded"),s.onreadystatechange=function(){4==s.readyState&&200==s.status&&(e.classList.remove("disabled"),t.loadMoreSuccess(o,s.responseText))},s.send(r)}loadMoreSuccess(e,t){let o=JSON.parse(t),a=document.querySelector("#"+e),s=a.querySelector(".blog-list"),l=a.querySelector('[data-id="'+this.classlaodMore+'"]');o[this.classlaodMore]||l.classList.add("disabled"),s.insertAdjacentHTML("beforeend",o.html),window.scrollTo(0,document.documentElement.scrollTop+1),window.scrollTo(0,document.documentElement.scrollTop-1)}}class WbForm{build(){getUrlWord("form")&&(this.update(),this.buildMenu())}update(){this.$page=document.querySelector("#pageForm"),this.$form=this.$page.querySelector(".form"),this.$formFieldEmail=this.$form.querySelector('[data-id="email"]'),this.$formFieldMessage=this.$form.querySelector('[data-id="message"]'),this.$btSend=this.$page.querySelector("#pageFormBtSend")}buildMenu(){const e=this;this.$btSend.addEventListener("click",function(t){objWfForm.validateEmpty([e.$formFieldEmail,e.$formFieldMessage])&&e.send()})}send(){const e=this,t=new XMLHttpRequest,o=objWbUrl.getController({folder:"form",file:"FormAjax"});let a="&method=sendForm&data="+JSON.stringify(e.getData())+"&token="+globalToken;this.$btSend.setAttribute("disabled","disabled"),t.open("POST",o,!0),t.setRequestHeader("Content-type","application/x-www-form-urlencoded"),t.onreadystatechange=function(){4==t.readyState&&200==t.status&&(e.$btSend.removeAttribute("disabled"),e.response(t.responseText))},t.send(a)}getData(){let e=[];return e.push(this.$form.querySelector('[data-id="email"]').value),e.push(this.$form.querySelector('[data-id="message"]').value),e}response(e){let t="",o="";switch(e){case"ok":o="green",t=globalTranslation.formSent;break;default:o="red",t=globalTranslation.formProblemSend}objWfNotification.add(t,o,this.$form)}}class WbManagement{verifyLoad(){window.addEventListener("load",this.applyClass(),{once:!0})}applyClass(){objWbTranslation.build(),objWbBlog.build(),objWbForm.build()}}class WbTranslation{build(){this.update(),this.defineActive(),this.buildMenu()}buildMenu(){this.$select.addEventListener("change",function(){let e=this.selectedIndex,t=this.options[e].getAttribute("data-url");window.location.replace(t)})}defineActive(){this.$select.value=globalLanguage}update(){this.$select=document.querySelector("#translationSelect")}}class WbUrl{buildSEO(e){return e.toString().normalize("NFD").replace(/[\u0300-\u036f]/g,"").replace(/\s+/g,"-").toLowerCase().replace(/&/g,"-and-").replace(/[^a-z0-9\-]/g,"").replace(/-+/g,"-").replace(/^-*/,"").replace(/-*$/,"")}build(e){window.location=globalUrl+globalLanguage+"/"+e+"/"}getController(e){return"./application/controller/"+e.folder+"/"+e.file+".php"}}var objWbBlog=new WbBlog,objWbForm=new WbForm,objWbManagement=new WbManagement,objWbTranslation=new WbTranslation,objWbUrl=new WbUrl;objWbManagement.verifyLoad();