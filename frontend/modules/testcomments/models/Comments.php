<?php

namespace frontend\modules\testcomments\models;

use Yii;
use common\models\User;
use yii\behaviors\TimestampBehavior;

class Comments extends \yii\db\ActiveRecord
{

	 
	 
	 
    public static function tableName()
    {
        return 'comments';
    }


	  public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
	
	
	
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['parent_id', 'category_id', 'user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'site'], 'string', 'max' => 255],
        ];
    }
   public function getArticles(){
	 
        return $this->hasOne(Article::className(), ['id' => 'articles_id']);
    }
	   public function getUser(){
        return $this->hasMany(User::className(), ['id' => 'user_id']);
		//из таблицы user id
    }
	/*
	   public function getParents(){
        return $this->hasMany($this::className(), ['parent_id' => 'id_comments']);
		//из таблицы user id
    }
	*/
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'name' => 'Name',
            'email' => 'Email',
            'site' => 'Site',
            'parent_id' => 'Parent ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'category_id' => 'Category ID',
            'user_id' => 'User ID',
        ];
    }
}
