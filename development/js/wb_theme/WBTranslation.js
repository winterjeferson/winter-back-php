class WBTranslation {
    constructor() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
    }

    build() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        this.update();
        this.defineActive();
        this.buildMenu();
    }

    buildMenu() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        this.$select.addEventListener('change', function (event) {
            self.change(this.value);
        });
    }

    change(language) {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        let ajax = new XMLHttpRequest();
        let url = objWBUrl.getController();
        let param = '&c=WBTranslation' + '&m=change' + '&language=' + language;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                location.reload();
            }
        }

        ajax.send(param);
    }

    defineActive() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$select.value = globalLanguage;
    }

    update() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$select = document.querySelector('#translation_select');
    }
}