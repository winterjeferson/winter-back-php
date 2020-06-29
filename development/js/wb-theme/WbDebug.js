/*removeIf(production)*/
class WbDebug {
    constructor() {
        this.isWbAdmin = true;

        this.isWbAdmin = true;
        this.isWbAdminBlog = true;
        this.isWbLogin = true;
        this.isWbManagement = true;
        this.isWbTranslation = true;
        this.isWbUrl = true;
    }

    debugMethod(obj, method, parameter = '') {
        let string = '';
        let className = obj.constructor.name;
        //        let arrMethod = Object.getOwnPropertyNames(Object.getPrototypeOf(obj));

        if (!this['is' + className]) {
            return false;
        }

        string += '%c';
        string += 'obj' + className;
        string += '.';
        string += '%c';
        string += method;
        string += '(';

        string += '%c';
        if (parameter !== '') {
            string += parameter;
        }

        string += '%c';
        string += ');';

        console.log(string, 'color: black', 'color: green', 'color: red', 'color: green');
    }

    getMethodName() {
        let userAgent = window.navigator.userAgent;
        let msie = userAgent.indexOf('.NET ');

        if (msie > 0) {
            return false;
        }

        let e = new Error('dummy');
        let stack = e.stack.split('\n')[2]
            // " at functionName ( ..." => "functionName"
            .replace(/^\s+at\s+(.+?)\s.+/g, '$1');
        let split = stack.split(".");

        if (stack !== 'new') {
            return split[1];
        } else {
            return 'constructor';
        }
    }
}
/*endRemoveIf(production)*/