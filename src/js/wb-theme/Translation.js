class Translation {
    build() {
        this.update();
        this.defineActive();
        this.buildMenu();
    }

    buildMenu() {
        this.elSelect.addEventListener('change', (item) => {
            const selected = item.target.options.selectedIndex;
            const elOption = item.target.options[selected];
            const value = elOption.getAttribute('data-url');

            window.location.replace(value);
        });
    }

    defineActive() {
        this.elSelect.value = globalLanguage;
    }

    update() {
        this.elSelect = document.querySelector('#translationSelect');
    }
}

export {
    Translation
};