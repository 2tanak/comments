<?php

namespace frontend\models;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $names
 * @property string $keywords
 * @property string $description
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

	
	

	
   public function getComm(){
        return $this->hasMany(Comments::className(), ['category_id' => 'id']);
		//из таблицы comments category_id
    }
	
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['description'], 'string'],
            [['names', 'keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'names' => 'Names',
            'keywords' => 'Keywords',
            'description' => 'Description',
        ];
    }
}
