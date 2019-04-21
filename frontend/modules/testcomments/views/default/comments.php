<?foreach($value as $k=>$item):?>


<li id="li-comment-<?=$item['id'] ?>" class="comment even <?=($item['user_id'] === $item['user'][0]['id']) ? 'bypostauthor odd' : ''?>">

<?if($item['user_id'] === $item['user'][0]['id'] && $item['user_id']!=0 && isset(Yii::$app->user->id)):?>

<?else:?>

<?if($item['parent_id'] == 0):?>
	<?=$item['id']?>
	<select name='ozenka' class='ozenka' data-commentsid="<?=$item['id']?>">
	 <option value='0'>поставьте оценку</option>
	  <option value='1'>1</option>
	  <option value='2'>2</option>
	   <option value='3'>3</option>
	    <option value='4'>4</option>
		 <option value='5'>5</option>
		 </select>



<?endif?>
<?endif?>



<div id="comment-<?=$item['id']?>" class="comment-container">

	<div class="comment-author vcard">
	   <? if($item['email']) {
		  $hash = md5($item['email']); 
	     }else{
		 $hash = md5($value['user'][0]['email']);
		}
	?>
	<img alt="" src="https://www.gravatar.com/avatar/{{$hash}}?d=mm&s=75" class="avatar" height="75" width="75" />
    <cite class="fn">
	<?if($item['name']):?>
	   <?=$item['name']?>
	   <?else:?>
	   
	   <?=$item['user'][0]['username']?>
	<?endif?>
	
	</cite>       
</div>


<div class="comment-meta commentmetadata">
	<div class="intro">
		<div class="commentDate">
		    <a href="#comment-2">
			<?if($item['created_at']){
				$date_sec=$item['created_at'];
				echo date("d-m-Y h:i:s", $date_sec);
			}
			?>
		      </a>              
		</div>
<div class="commentNumber">#&nbsp;</div>
	</div>
	<div class="comment-body">
	<p><?=$item['text']?></p>
	</div>
	<div class="reply group">
	<a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-<?=$item['id']?>&quot;, &quot;<?=$item['id']?>&quot;, &quot;respond&quot;, &quot;<?$item['articles_id']?>&quot;)">Ответить</a>                    
	</div>
	</div>
</div>

	<?if($item['childs']):?>
	<ul class="children">
<?$value = $item['childs'];?>
	<?include "comments.php"?>
	</ul>
<?endif?>

</li>
<?endforeach;?>