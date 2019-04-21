<?php

namespace frontend\assets;
use yii\web\View;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
 
   public $css = [
        //'css/site.css',
		'css/style.css',
		'css/main.css',
		'css/style-minifield.css',
		
    ];
    public $js = [
	'source/jquery.cookie.js',
	'source/jquery.accordion.js',
	'source/main2.js',
	'source/image.js',
	'js/comment-reply.js',
	'js/myscripts.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
	
    ];
	  public $jsOptions = [
      'position' =>  View::POS_HEAD,//POS_END
    ];
}
