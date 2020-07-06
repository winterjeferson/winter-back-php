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
        let url = objWbUrl.getController({ 'folder': 'blog', 'file': 'LoadMore' });
        let parameter =
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