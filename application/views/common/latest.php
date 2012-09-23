<div class="span4">
    <div class="row">
      <div class="span4">
        <ul class="nav nav-tabs">
          <li class="active"><a href="<?php echo base_url() ?>home">POPULAR</a></li>
          <li><a href="<?php echo base_url() ?>home/latest">LATEST</a></li>
          <li><a href="<?php echo base_url() ?>home/comment">COMMENTS</a></li>
        </ul>
        </div>
        <div class="span4">
             <?php if(isset($popular)) : foreach ($popular as $r) : ?>
              <div class="post">
                <div class="left">
                <?php $im=$r->image; ?>
                <?php if($im != NULL) : ?> 
                <a href="<?php echo base_url()?>images/upload/<?php echo $im; ?>"><img width="70" height="50" src="<?php echo base_url()?>images/upload/thumbs/<?php echo $im; ?>" /></a>
                <?php else : ?>
                <a href="<?php echo base_url()?>images/no_image.jpg"><img  width="70" height="50"src="<?php echo base_url()?>images/no_image.jpg" /></a>
                <?php endif ; ?>
                </div>
                <div class="right">
                <div style="float:right; font-size:12px; margin:0 5px;"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($r->date_added));?></div>
                <h3><?php echo $r->post_title;?></h3>
                <?php echo substr($r->description, 0, 100);echo "...";?> 
                <div style="float:right; font-size:12px; margin-bottom:0 0;">
                  <a class="btn btn-primary" href="<?php echo base_url() ?>comment/commpost/<?php echo $r->post_id; ?>">Read more>></a>
                </div>  
              </div>
            </div><!-- Close post -->
          <?php endforeach;  ?>
          <?php else :?>
          <?php endif ; ?>
    </div>
    <div class="span4 offset1">
         <div id="datepicker"></div>
    </div><!--/span--> 
</div>
</div>