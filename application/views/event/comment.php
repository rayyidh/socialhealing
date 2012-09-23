<div class="row">
    <div class="span7">
       <div class="btn-group">
         <a href="<?php echo base_url() ?>index.php/events/insert" class="btn btn-success"><i class="icon-plus-sign"></i> Add Event</a>
        </div>
      </div>
      <div class="span7">
     <?php if(isset($events)) : foreach ($events as $r) : ?>
     <?php $time=$r->start_date;
      $format='DATE_RFC850';
     ?>
      <div class="post">
        <div class="left">
        <?php $im=$r->image; ?>
        <?php if($im != NULL) : ?> 
        <a href="<?php echo base_url()?>images/event/<?php echo $im; ?>"><img src="<?php echo base_url()?>images/event/thumbs/<?php echo $im; ?>" /></a>
        <?php else : ?>
        <a href="<?php echo base_url()?>images/no_image.jpg"><img src="<?php echo base_url()?>images/no_image.jpg" /></a>
        <?php endif ; ?>
        </div>
        <div class="right">
        <table>
          <tr><td>Event Name :</td><td><?php echo $r->event_name?></td></tr>
          <tr><td>Venue :</td><td><?php echo $r->venue?></td></tr>
          <tr><td>Date :</td><td><?php echo $time ?></td></tr>
          <tr><td>Time :</td><td><?php echo $r->time?></td></tr>
          <div style="float:right; font-size:12px; margin:0 5px;">
                  <a href="<?php echo base_url() ?>comment/comm/<?php echo $r->event_id; ?>">Like</a>
                  <?php if($total_comments > 1)
                    {echo $total_comments.' comments';}
                    else if($total_comments === 1)
                    {echo $total_comments.' comment';}
                    else{ echo 'No comment yet!';}?></a></div>
              </div>
        </table>
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
                  <?php echo $row->comment_id;?></strong> says on <span style="font-size:10px;"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($row->date_added));?></span>
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
                
            <?php echo form_open('comment/add_event_comm');?>
             <label for='desc'>Comment : </label>
            <div class="controls">
              <input type="hidden" name="post_id" value="<?php echo $event_id;?>" />
              <input type="hidden" name="category" value="events" />
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