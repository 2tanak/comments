<li id="li-comment-<?=$comment->id_comments?>" class="comment even borGreen">
	<div id="comment-<?=$comment->id_comments?>" class="comment-container">
		<div class="comment-author vcard">			                                
			<img alt="" src="https://www.gravatar.com/avatar/{{$data['hash']}}?d=mm&s=75" class="avatar" height="75" width="75" />
		    <cite class="fn"><?=$comment->user[0]->username?></cite>                 
		</div>
						                            
		<div class="comment-meta commentmetadata">
			<div class="intro">
		<div class="commentDate">
		    <a href="#comment-2">
			<?if($comment->created_at){
				$date_sec=$comment->created_at;
				echo date("d-m-Y h:i:s", $date_sec);
			}
			?>
		      </a>              
		</div>
<div class="commentNumber">#&nbsp;</div>
	</div>
			<div class="comment-body">
				<p><?=$comment->text?></p>
			</div>
		</div>		                           
	</div>
</li>