<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;

    //rules
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg, jpeg, png']
        ];
    }

    //function upload file
    public function uploadFile(UploadedFile $file, $currentImage)
    {
        $this->image = $file;


        if ($this->validate()) {

            $this->deleteCurrentImage($currentImage);

            return $this->saveImage();
        }
    }

    //directory files
    private function getFolder()
    {
        return Yii::getAlias('@web') . 'uploads/';
    }

    //generate unique filename
    private function generateFileName()
    {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }

    //delete file
    public function deleteCurrentImage($currentImage)
    {
        if ($this->fileExists($currentImage)) {
            unlink($this->getFolder() . $currentImage);
        }
    }

    //file exists?
    public function fileExists($currentImage)
    {
        if (!empty($currentImage) && $currentImage != null) {
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    //saving image
    public function saveImage()
    {
        $filename = $this->generateFileName();
        $this->image->saveAs($this->getFolder() . $filename);
        return $filename;
    }
}