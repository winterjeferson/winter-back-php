class WBPTranslation {
    constructor() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/
    }

    build() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        this.update();
        this.defineActive();
        this.buildMenu();
    }

    update() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$select = document.querySelector('#translation_select');
    }

    buildMenu() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let self = this;

        this.$select.addEventListener('change', function (event) {
            self.change(this.value);
        });
    }

    defineActive() {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        this.$select.value = globalLanguage;
    }

    change(language) {
        /*removeIf(production)*/ objWBPDebug.debugMethod(this, objWBPDebug.getMethodName()); /*endRemoveIf(production)*/
        let ajax = new XMLHttpRequest();
        let url = objWBPUrl.getController();
        let param = '&c=WBPTranslation' + '&m=change' + '&language=' + language;

        ajax.open('POST', url, true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                location.reload();
            }
        }

        ajax.send(param);
    }
}