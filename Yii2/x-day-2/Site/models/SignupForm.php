<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{

    public $name;
    public $surname;
    public $patronymic;
    public $email;
    public $password;
    public $hash;

    //rules
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'email', 'password'], 'required'],
            [['name', 'surname', 'patronymic'], 'string'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'email']
        ];
    }

    //value attributes
    public function attributeLabels()
    {
        return [
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'email' => 'E-mail',
            'password' => 'Пароль',
        ];
    }

    //signup
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            $this->password = $hash;
            $user->attributes = $this->attributes;

            return $user->create();
        }
    }
}