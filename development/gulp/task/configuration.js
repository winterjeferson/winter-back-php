var projectAdress = 'E:/development/site/';
var projectVersion = '';
var projectName = 'framework/winter-back-php/';

module.exports = {
    projectAdress: projectAdress,
    projectVersion: projectVersion,
    projectName: projectName,
    branches: projectAdress + 'branches/' + projectName + projectVersion + 'development/',
    branchesPublic: projectAdress + 'branches/' + projectName + projectVersion + 'homologation/',
    tags: projectAdress + 'branches/' + projectName + projectVersion + 'homologation/',
    trunk: projectAdress + 'branches/' + projectName + projectVersion + 'production/',
}