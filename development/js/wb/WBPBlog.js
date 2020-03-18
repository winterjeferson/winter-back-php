class WBPBlog {
    constructor() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
    }

    build() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        if (!getUrlWord('blog')) {
            return;
        }

        this.update();
        this.buildMenu();
    }

    update() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$lastPost = document.querySelector('#page_blog_last_post');
        this.$mostViewed = document.querySelector('#page_blog_most_viewed');
    }

    buildMenu() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        if (!this.$lastPost) {
            return;
        }

        if (document.contains(this.$lastPost.querySelector('[data-id="laod_more"]'))) {
            this.$lastPost.querySelector('[data-id="laod_more"]').addEventListener('click', function (event) {
                self.loadMore(this);
            });
        }

        if (document.contains(this.$mostViewed.querySelector('[data-id="laod_more"]'))) {
            this.$mostViewed.querySelector('[data-id="laod_more"]').addEventListener('click', function (event) {
                self.loadMore(this);
            });
        }
    }

    loadMore(target) {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let parentId = target.parentNode.parentNode.parentNode.getAttribute('id');
        let ajax = new XMLHttpRequest();
        let url = objWBPUrl.getController();
        let param =
            '&c=WBPBlog' +
            '&m=loadMore';

        target.classList.add('disabled');
        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                console.log(ajax.responseText);
            }
        }

        ajax.send(param);
        console.log(parentId);
    }
}