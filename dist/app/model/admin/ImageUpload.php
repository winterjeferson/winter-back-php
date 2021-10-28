<?php

namespace App\Model\Admin;

class ImageUpload
{
    public function __construct()
    {
    }

    function build()
    {
        return $this->upload();
    }

    function upload()
    {
        $path = filter_input(INPUT_POST, 'p', FILTER_DEFAULT);
        $fileName = $_FILES['f']['name'];
        $fileTmpName = $_FILES['f']['tmp_name'];
        $fileSize = $_FILES['f']['size'];
        $url = '../../../assets/img/dynamic/' . $path;
        $targetFile = $url . basename($fileName);
        $extension  = pathinfo($fileName, PATHINFO_EXTENSION);
        $randomName  = uniqid() . time();
        $basename  = $randomName . '.' . $extension;

        if (!is_dir($url)) {
            exit('invalidPath');
        }

        $this->validateLarge($fileSize);
        $this->validateSize($fileTmpName);
        $this->validateFormat($targetFile);

        move_uploaded_file($fileTmpName, $url . $basename);
        return 'uploadDone';
    }

    function validateSize($fileTmpName)
    {
        $check = getimagesize($fileTmpName);
        if (!$check) {
            exit('uploadInvalid');
        }
    }

    function validateFormat($targetFile)
    {
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $arrFile = ['jpg', 'jpeg', 'png', 'gif', 'svg'];

        if (!in_array($imageFileType, $arrFile)) {
            exit('uploadInvalid');
        }
    }

    function validateLarge($fileSize)
    {
        if ($fileSize > 500000) {
            exit('uploadInvalid');
        }
    }
}
