<?php

namespace Application\Model\Admin;

class Image
{
    public function __construct()
    {
        require_once __DIR__ . '/Login.php';
        require_once __DIR__ . '/Admin.php';
        require_once __DIR__ . '/../../core/Session.php';

        $this->objLogin = new \Application\Model\Admin\Login();
        $this->objSession = new \Application\Core\Session();
        $this->objAdmin = new \Application\Model\Admin\Admin();

        $this->pathDynamic = 'assets/img/dynamic/';
        $this->pathBlog = 'blog/';
    }

    function build()
    {
        $this->objLogin->verifyLogin();
        $this->objAdmin->verifyPermissionPage(2);

        $arr = [
            $folder = 'thumbnail',
            $arrFile = $this->getFile($this->pathBlog . $folder),
            'listThumbnail' => [
                'list' => $this->buildList($folder, $arrFile),
                'isEmpty' => count($arrFile) === 0 ? true : false,
            ],
            $folder = 'banner',
            $arrFile = $this->getFile($this->pathBlog . $folder),
            'listBanner' => [
                'list' => $this->buildList($folder, $arrFile),
                'isEmpty' => count($arrFile) === 0 ? true : false,
            ]
        ];

        return $arr;
    }

    function buildList($path, $arrFile)
    {
        $arr = [];

        if (!is_null($arrFile)) {
            foreach ($arrFile as $key => $value) {
                $arr[$key] = [$path, $value];
            }
        }

        return $arr;
    }

    function getFile($path)
    {
        $dirAjax = __DIR__ . '/../../../';
        $dirRegular = $this->pathDynamic . $path;
        $directory = is_dir($dirRegular) ? $dirRegular : $dirAjax . $dirRegular;
        $isDir = is_dir($directory);

        if ($isDir) {
            $scannedDirectory = array_diff(scandir($directory), array('..', '.'));
            return $scannedDirectory;
        }
    }
}
