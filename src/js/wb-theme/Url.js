class Url {
    buildSEO(url) {
        return url.toString() // Convert to string
            .normalize('NFD') // Change diacritics
            .replace(/[\u0300-\u036f]/g, '') // Remove illegal characters
            .replace(/\s+/g, '-') // Change whitespace to dashes
            .toLowerCase() // Change to lowercase
            .replace(/&/g, '-and-') // Replace ampersand
            .replace(/[^a-z0-9\-]/g, '') // Remove anything that is not a letter, number or dash
            .replace(/-+/g, '-') // Remove duplicate dashes
            .replace(/^-*/, '') // Remove starting dashes
            .replace(/-*$/, ''); // Remove trailing dashes
    }

    buildUrl(target) {
        window.location = `${globalUrl + globalLanguage}/${target}/`;
    }

    getController(obj) {
        return `./app/controller/${obj['folder']}/${obj['file']}.php`;
    }

    watch(fieldWatch, fieldReturn) {
        fieldWatch.addEventListener('focusout', () => {
            fieldReturn.value = this.buildSEO(fieldWatch.value);
        });
    }
}

export {
    Url
};