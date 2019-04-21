<?php

namespace app\controllers;

class ApbooksController extends \yii\web\Controller
{
	public $modelClass = 'app\models\Books';
	
	    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
            ],
        ]);
    }
	
	
    public function actionIndex()
    {
        return $this->render('index');
    }

}
