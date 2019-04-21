<?php

namespace app\modules\testcomments\controllers;
use frontend\modules\testcomments\models\Comments;
use frontend\modules\testcomments\models\Article;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
/**
 * Default controller for the `testcomments` module
 */
 class AjaxController extends Controller
{
	
	  public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
     public function beforeAction($action){
		if( $action->id == 'send' ){
        $this->enableCsrfValidation = false;
        }
			if( $action->id == 'send2' ){
        $this->enableCsrfValidation = false;
        }
	   if( $action->id == 'send3' ){
        $this->enableCsrfValidation = false;
        }
	 return parent::beforeAction($action);
   }
   
    public function actionSend3($ozenka)
    {
		
		
      if($ozenka == 'ozenkaplus'){
		 $comments1 = Comments::find()->asArray()->with('user')->orderBy(['ozenka' => SORT_DESC])->all();
		
		 
	  }
  if($ozenka == 'ozenkaminus'){
		  $comments1 = Comments::find()->asArray()->with('user')->orderBy(['ozenka' => SORT_ASC])->all();
	  }
	  
	  if($comments1){
		foreach($comments1 as $item){
			 $arr2[$item['id_comments']]= $item;
			 
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
	}
	return $this->render('/default/index',compact('comments'));
	}
   
   
   
    public function actionSend2()
    {
		$ozenka= $_POST['ozenka'];
		$id= $_POST['id'];
		
        $model = Comments::findOne($id);
		$model->ozenka = $ozenka;
	    $model->save(false);
		
		echo json_encode(array('success' => TRUE));exit();
		exit();
 }
 
 
 
    public function actionSend()
    {
      
	   $text= $_POST['text'];
	   $name= $_POST['name'];
	   $url= $_POST['url'];
	   $email= $_POST['email'];
	   $parent= $_POST['parent'];
	   //echo $parent;exit();
	   $comment = new Comments();
	   $comment->user_id = \Yii::$app->user->identity->id;
	   $comment->text = $text;
	   $comment->name = $name;
	   $comment->site = $url;
	   $comment->email= $email;
	   $comment->parent_id = $parent;
	   $comment->save(false);
	   $this->layout = false;
	   $view_comment = $this->render('content_one_comment', compact('comment'));
	   $comment= (array) $comment;
	   $arr4['parent_id'] = $parents;
        echo json_encode(array('success' => TRUE,'comment'=>$view_comment,'data'=>$arr4));exit();

	   
	   
	   
	   
	   
	   
    }
}
