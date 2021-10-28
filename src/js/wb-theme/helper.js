class Helper {
    ajax(obj) {
        return new Promise((resolve, reject) => {
            const kind = typeof obj.kind === 'undefined' ? 'POST' : obj.kind;
            const parameter = `${obj.parameter}&token=${globalToken}`;
            const url = obj.controller;
            let xhr = new XMLHttpRequest();

            xhr.open(kind, url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = () => {
                if (xhr.status >= 200 && xhr.status < 300) {
                    resolve(xhr.responseText);
                } else {
                    reject(xhr.statusText);
                }
            };
            xhr.onerror = () => reject(xhr.statusText);
            xhr.send(parameter);
        });
    }
}

export {
    Helper
};