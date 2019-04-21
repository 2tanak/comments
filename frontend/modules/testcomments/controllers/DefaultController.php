<?php

namespace app\modules\testcomments\controllers;
use frontend\modules\testcomments\models\Comments;
use frontend\modules\testcomments\models\Article;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
/**
 * Default controller for the `testcomments` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
	$comments1 = Comments::find()->asArray()->with('user')->orderBy(['id_comments' => SORT_ASC])->all();

	if($comments1){
		foreach($comments1 as $item){
			 $arr2[$item['id']]= $item;
			 
		 }
		
    $tree = [];
	$data= $arr2;
	foreach ($data as $id3=>&$node) {
            if (!$node['parent_id'])
                $tree[$id3] = &$node;
            else
                $data[$node['parent_id']]['childs'][$node['id_comments']] = &$node;
        }
	$comments = $tree;
	//echo "<pre>";print_r($comments);echo "</pre>";exit();
	}else{
		$comments = false;
	}
	return $this->render('index',compact('comments'));
    }
}
