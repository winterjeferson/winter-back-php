// var projectAdress = 'D:/development/project/';
var projectAdress = 'E:/development/site/branches/';
var projectVersion = '';
// var projectName = 'winter-back-php/';
var projectName = 'framework/winter-back-php/';

module.exports = {
    projectAdress: projectAdress,
    projectVersion: projectVersion,
    projectName: projectName,
    development: projectAdress + projectName + projectVersion + 'development/',
    homologation: projectAdress + projectName + projectVersion + 'homologation/',
    production: projectAdress + projectName + projectVersion + 'production/',
    assets: 'assets/',
}