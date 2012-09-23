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
                  <a class="btn btn-primary" href="<?php echo base_url() ?>comment/comm/<?php echo $r->post_id; ?>">Like</a>
                  <a class="btn btn-primary" href="<?php echo base_url() ?>comment/commpost/<?php echo $r->post_id; ?>">Comment</a>
                </div>
              </div>
            </div><!-- Close post -->
          <?php endforeach;  ?>
          <?php else :?>
          <?php endif ; ?>
    </div>
  </div>
</div>