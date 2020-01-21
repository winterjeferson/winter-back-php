var projectAdress = 'E:/development/site/';
var projectVersion = '12_0_0/';
var projectName = 'framework/';

module.exports = {
    projectAdress: projectAdress,
    projectVersion: projectVersion,
    projectName: projectName,
    branches: projectAdress + 'branches/' + projectName + projectVersion,
    branchesPublic: projectAdress + 'branches/' + projectName + projectVersion + 'public/',
    tags: projectAdress + 'tags/' + projectName + projectVersion,
    trunk: projectAdress + 'trunk/' + projectName + projectVersion,
}