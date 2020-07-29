class WbTranslation {
    build() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.update();
        this.defineActive();
        this.buildMenu();
    }

    buildMenu() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$select.addEventListener('change', function () {
            let selected = this.selectedIndex;
            let value = this.options[selected].getAttribute('data-url');

            window.location.replace(value);
        });
    }

    defineActive() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$select.value = globalLanguage;
    }

    update() {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$select = document.querySelector('#translationSelect');
    }
}