<?php

namespace Application\Controller\Home;

require __DIR__ . '/../Main.php';

class Home extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function build()
    {
        $model = $this->getModel();
        $view = $this->getView($model);

        echo $view;
    }

    function getModel()
    {
        $data = [
            ['id' => 'home', 'folder' => 'home', 'file' => 'home'],
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = ['folder' => 'home', 'file' => 'home', 'model' => $model,];

        return $this->renderView($data);
    }
}
