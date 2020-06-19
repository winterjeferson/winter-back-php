<?php

namespace Application\Model\Admin;

require_once __DIR__ . '/../../core/Session.php';

class BlogThumbnail
{
    public function __construct()
    {
        $this->objSession = new \Application\Core\Session();
    }

    function build()
    {
        $arr = [
            'title' => $this->objSession->getArray('translation', 'selectImage'),
            'translationImage' => $this->objSession->getArray('translation', 'image'),
            'translationAction' => $this->objSession->getArray('translation', 'actions'),
            'translationName' => $this->objSession->getArray('translation', 'name'),
            'list' => $this->buildList('blog/thumbnail'),
        ];

        return $arr;
    }

    function buildList($path)
    {
        $string = '';
        $arrFile = $this->getFile($path);

        if (is_null($arrFile)) {
            return $this->buildListEmpty();
        } else {
            foreach ($arrFile as $key => $value) {
                if ($value !== 'default.jpg') {
                    $string .= $this->buildListHtml($path, $value);
                }
            }

            return $string;
        }
    }

    function buildListHtml($path, $value)
    {
        $string = '
            <tr>
                <td class="minimum">
                    <img data-src="assets/img/' . $path . '/' . $value . '" data-lazy-load="true">
                </td>
                <td data-id="fileName">
                    ' . $value . '
                </td>
                <td class="minimum">
                    <nav class="menu menu-horizontal text-right">           
                        <ul>           
                            <li>
                                <button type="button" class="bt bt-red bt-sm has-tooltip" data-action="delete" data-tooltip="true" data-tooltip-color="black" title="' . $this->objSession->getArray('translation', 'delete') . '">   
                                    <span class="fa fa-close" aria-hidden="true"></span>
                                </button>
                            </li>           
                        </ul>        
                    </nav>
                </td>
            </tr>
        ';

        return removeLineBreak($string);
    }

    function buildListEmpty()
    {
        $string = '
            <tr>
                <td colspan="3" class="text-center">
                ' . $this->objSession->getArray('translation', 'emptyList') . '
                </td>
            </tr>
        ';

        return removeLineBreak($string);
    }

    function getFile($path)
    {
        $directory = '../../../assets/img/' . $path;
        $isDir = is_dir($directory);

        if ($isDir) {
            $scannedDirectory = array_diff(scandir($directory), array('..', '.'));
            return $scannedDirectory;
        }
    }

    function buildGallery($path)
    {
        $string = '';
        $arrFile = $this->getFile($path);

        if (is_null($arrFile)) {
            return $this->buildListEmpty();
        } else {
            foreach ($arrFile as $key => $value) {
                $string .= $this->buildGalleryHtml($path, $value);
            }

            return $string;
        }
    }

    function buildGalleryHtml($path, $value)
    {
        $string = '
            <div class="col-es-3">
                <div class="card card-es card-grey">
                    <header>
                        <div class="truncate">
                            <h6 data-id="imageName">
                            ' . $value . '
                            </h6>
                        </div>
                    </header>
                    <div class="row card-body">
                        <div class="col-es-12">
                            <div class="padding-re">
                                <button type="button" onclick="objWbAdminBlog.selectImage(this)" >
                                    <img src="assets/img/' . $path . '/' . $value . '" class="img-responsive">
                                </button>
                            </div>
                        </div>
                    </div>
                    <footer>
                    </footer>
                </div>
            </div>
        ';

        return removeLineBreak($string);
    }
}
