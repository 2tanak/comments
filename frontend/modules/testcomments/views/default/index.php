</br></br>
<div id="comments">
  <?if($comments):?>
  
   <form action="/testcomments/ajax/send3" method="get" >
	
	</br></br></br>
   
	<input type='hidden' name='ozenka' value='ozenkaplus'>
	<input style='font-size:16px' name="submit" type="submit" id="submit" class='btn btn-primary btn-md' value="по лучшим оценкам" />
	</p>                
	</form>
  
   <form action="/testcomments/ajax/send3" method="get" >
	

   
	<input type='hidden' name='ozenka' value='ozenkaminus'>
	<input style='font-size:16px' name="submit" type="submit" id="submit" class='btn btn-primary btn-md' value="по худшим оценкам" />
	</p>                
	</form>
  
  <?$value = $comments?>
   <ol class="commentlist group" style='overflow:hidden'>
		<?include "comments.php"?>
  </ol>
<?endif?>
		
<h2 id="trackbacks"></h2>
<ol class="trackbacklist"></ol>		
<p><em></em></p>
	
<div id="respond">
	<h3 id="reply-title"><span>Ответить</span> 
	   <small>
	      <a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Закрыть</a>
	   </small>
	</h3>
	
   <form action="" method="post" id="commentform">
	   <?if(!Yii::$app->user->id):?>
	      <p class="comment-form-author">
	         <label for="author">Имя</label> 
	         <input id="name" name="name" type="text" size="30" required placeholder='ваше имя' value=""/>
	      </p>
	      <p class="comment-form-email">
	         <label for="email">Email</label> 
			 
	         <input required placeholder='email' id="email" name="email" type="text" value="" size="30" aria-required="true" />
	     </p>
	     <p class="comment-form-url">
		     <label for="url">сайт</label>
	        <input id="url" name="site" type="text" value="" size="30" />
	     </p>
	 <?endif?>
	 
	<input id='token' type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
	
	<p class="comment-form-comment">
	
	    <label for="comment">Вашь коментарий</label>
		<textarea id="comment" name="text" cols="45" rows="8"></textarea>
	</p>
	<div class="clear"></div>
	<p class="form-submit">
   
	<input id="comment_parent" type="hidden" name="comment_parent" value="0" />
	<input name="submit" type="submit" id="submit" value="Post Comment" />
	</p>                
	</form>
	</div>
	
	
</div>
<div class="wrap_result"></div>