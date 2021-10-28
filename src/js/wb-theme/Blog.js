class Blog {
    constructor() {
        this.cssLoadMore = 'loadMore';
        this.cssLoadMoreSelector = `[data-id="${this.cssLoadMore}"]`;
        this.cssDisabled = 'button--blue--disabled';
    }

    build() {
        if (!window.helper.getUrlWord('blog')) {
            return;
        }

        this.update();
        this.buildMenu();
    }

    update() {
        this.page = 'pageBlog';
        this.elLastPost = document.querySelector(`#${this.page}LastPost`);
        this.elMostViewed = document.querySelector(`#${this.page}MostViewed`);
    }

    buildMenu() {
        if (!this.elLastPost || !this.elMostViewed) return;

        const elButtonLastPost = this.elLastPost.querySelector(this.cssLoadMoreSelector);
        const elButtonMostViewed = this.elMostViewed.querySelector(this.cssLoadMoreSelector);

        if (document.contains(elButtonLastPost)) {
            elButtonLastPost.addEventListener('click', () => {
                this.loadMore(elButtonLastPost);
            });
        }

        if (document.contains(elButtonMostViewed)) {
            elButtonMostViewed.addEventListener('click', () => {
                this.loadMore(elButtonMostViewed);
            });
        }
    }

    loadMore(target) {
        const id = target.parentNode.parentNode.getAttribute('id');
        const idString = id.substring(this.page.length);
        const controller = window.wbUrl.getController({
            'folder': 'blog',
            'file': 'LoadMore'
        });
        const parameter =
            `&target=${idString}`;
        const obj = {
            controller,
            parameter
        };
        let data = wbHelper.ajax(obj);

        target.classList.add(this.cssDisabled);

        data.then((result) => {
            target.classList.remove(this.cssDisabled);
            this.loadMoreSuccess(id, result);
        });
    }

    loadMoreSuccess(id, value) {
        const json = JSON.parse(value);
        const elSection = document.querySelector(`#${id}`);
        const elSectionList = elSection.querySelector('.blog-list');
        const elButton = elSection.querySelector(`[data-id="${this.cssLoadMore}"]`);

        if (!json[this.cssLoadMore]) {
            elButton.classList.add(this.cssDisabled);
        }

        elSectionList.insertAdjacentHTML('beforeend', json['html']);
        window.scrollTo(0, document.documentElement.scrollTop + 1);
        window.scrollTo(0, document.documentElement.scrollTop - 1);
    }
}

export {
    Blog
};