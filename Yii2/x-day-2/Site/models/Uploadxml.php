<?php

namespace app\models;

use DOMDocument;
use SimpleXMLElement;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class Uploadxml extends Model
{
    public $file;

    //rules
    public function rules()
    {
        return [
            [['file'], 'required'],
            [['file'], 'file', 'extensions' => 'xml']
        ];
    }

    //upload file
    public function uploadFile(UploadedFile $file)
    {
        $file->saveAs(Yii::getAlias('@web') . 'uploads/' . 'file.xml');

        if (file_exists('./uploads/file.xml')) {
            $xml = simplexml_load_file('./uploads/file.xml');

            foreach ($xml->specialist as $specialist) {
                $doctor = new Specialists();
                $doctor->surname = (string)$specialist->surname;
                $doctor->name = (string)$specialist->name;
                $doctor->patronymic = (string)$specialist->patronymic;
                $doctor->email = (string)$specialist->email;
                $doctor->phone = (string)$specialist->phone;
                $doctor->specialty = (string)$specialist->specialty;
                $doctor->save();
            }
            unlink('./uploads/file.xml');

            return Yii::$app->getResponse()->redirect('./');

        } else {
            echo 'File not found!';
        }
    }
}