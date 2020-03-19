class WbBlog {
    constructor() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
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
        this.$lastPost = document.querySelector('#page_blog_last_post');
        this.$mostViewed = document.querySelector('#page_blog_most_viewed');
    }

    buildMenu() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
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
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;
        let parentId = target.parentNode.parentNode.parentNode.getAttribute('id');
        let ajax = new XMLHttpRequest();
        let url = objWbUrl.getController();
        let param =
            '&c=WbBlog' +
            '&m=loadMore' +
            '&target=' + parentId;

        target.classList.add('disabled');
        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                self.loadMoreSuccess(parentId, ajax.responseText);
                target.classList.remove('disabled');
            }
        }

        ajax.send(param);
    }

    loadMoreSuccess(parentId, value) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        document.querySelector('#' + parentId + ' .blog-list').insertAdjacentHTML('beforeend', value);
    }
}