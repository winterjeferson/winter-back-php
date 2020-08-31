class WbUrl {
    buildSEO(url) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
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
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        window.location = globalUrl + globalLanguage + '/' + target + '/';
    }

    getController(obj) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        return './application/controller/' + obj['folder'] + '/' + obj['file'] + '.php';
    }

    watch(fieldWatch, fieldReturn) {
        /*removeIf(production)*/ objWbDebug.debugMethod(this, objWbDebug.getMethodName()); /*endRemoveIf(production)*/
        const self = this;

        fieldWatch.addEventListener('focusout', function () {
            fieldReturn.value = self.buildSEO(fieldWatch.value);
        });
    }
}