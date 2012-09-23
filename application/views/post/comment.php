<div class="row">
    <div class="span7">
       <div class="btn-group">
         <a href="<?php echo base_url() ?>index.php/post/insert" class="btn btn-success"><i class="icon-plus-sign"></i> Add Discussion</a>
        </div>
      </div>
      <div class="span7">
             <?php if(isset($posts)) : foreach ($posts as $r) : ?>
              <div class="post">
                           <br>
                <div class="left">
                <?php $im=$r->image; ?>
                <?php if($im != NULL) : ?> 
                <a href="<?php echo base_url()?>images/upload/<?php echo $im; ?>"><img src="<?php echo base_url()?>images/upload/thumbs/<?php echo $im; ?>" /></a>
                <?php else : ?>
                <a href="<?php echo base_url()?>images/no_image.jpg"><img src="<?php echo base_url()?>images/no_image.jpg" /></a>
                <?php endif ; ?>
                </div>
                <div class="right">
                <div class="title"><h3><?php echo $r->post_title;?></h3></div>
                <div class="date"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($r->date_added));?></div>
                <br clear="all" />
                <div class="disc"><?php echo $r->description;?></div>
                <div style="float:right; font-size:12px; margin:0 5px;">
                  <a href="<?php echo base_url() ?>comment/comm/<?php echo $r->post_id; ?>">Like</a>
                  <?php if($total_comments > 1)
                    {echo $total_comments.' comments';}
                    else if($total_comments === 1)
                    {echo $total_comments.' comment';}
                    else{ echo 'No comment yet!';}?></a></div>
               
                <hr />
              </div>
            </div><!-- Close post -->
          <?php endforeach;  ?>
          <?php else :?>
          <?php endif ; ?>
      </div>
      <div class="span7">
           <div id="comment">  
           <?php if($comments): foreach($comments as $row):?>
            <div class="commentor">
                <div>
                  <strong>
                  <?php echo $row->username;?></strong> says on <span style="font-size:10px;"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($row->date_added));?></span>
                </div>
                <div><?php echo $row->comment;?></div>
            </div>
            <?php endforeach; else: ?>
            <h3>No comment yet!</h3>
            <?php endif;?> 
           <fieldset class="form-horizontal">
            <legend>Add a Comment</legend>
            <span class="label label-important">You Must be Logged in to Comment</span> 
            <?php if(validation_errors()){echo validation_errors('<p class="error">','</p>');} ?>        
                
            <?php echo form_open('comment/add_post_comm');?>
             <label for='desc'>Comment : </label>
            <div class="controls">
              <input type="hidden" name="post_id" value="<?php echo $post_id;?>" />
              <input type="hidden" name="category" value="post" />
              <textarea rows="3" id="textarea" class="input-xlarge" name="comment"></textarea>
            </div>
            <div class="form-actions">
           <?php echo form_submit('submit','Add Comment');?>
            <?php echo form_close(); ?>
          </div>
          </fieldset>
                <hr />
          </div><!-- Close comment -->
      </div>
    </div>
  </div>