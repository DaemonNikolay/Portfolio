<?php

namespace app\modules\users;
use Yii;
use yii\filters\AccessControl;

/**
 * users module definition class
 */
class Module extends \yii\base\Module
{

    public $layout = '/users';
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\users\controllers';

    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    throw new \yii\web\NotFoundHttpException();
                },
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return !Yii::$app->user->identity->isAdmin && !Yii::$app->user->isGuest;
                        }
                    ]
                ]
            ]
        ];
    }

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
