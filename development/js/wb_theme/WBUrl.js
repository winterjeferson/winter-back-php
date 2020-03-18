class WBUrl {
    constructor() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, 'constructor'); /*endRemoveIf(production)*/

    }

    buildSEO(url) {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        return url.toString()               // Convert to string
            .normalize('NFD')               // Change diacritics
            .replace(/[\u0300-\u036f]/g, '') // Remove illegal characters
            .replace(/\s+/g, '-')            // Change whitespace to dashes
            .toLowerCase()                  // Change to lowercase
            .replace(/&/g, '-and-')          // Replace ampersand
            .replace(/[^a-z0-9\-]/g, '')     // Remove anything that is not a letter, number or dash
            .replace(/-+/g, '-')             // Remove duplicate dashes
            .replace(/^-*/, '')              // Remove starting dashes
            .replace(/-*$/, '');             // Remove trailing dashes
    }

    build(target) {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        return window.location = globalUrl + globalLanguage + '/' + target + '/';
    }

    getController() {
        /*removeIf(production)*/ objWBDebug.debugMethod(this, objWBDebug.getMethodName()); /*endRemoveIf(production)*/
        return globalUrl + 'php/controller.php';
    }
}