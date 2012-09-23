<div class="row">
    <div class="span8">
        <div id="myCarousel" class="carousel slide">
          <div class="carousel-inner">
            <div class="item active">
              <img alt="" src="<?php echo base_url()?>images/slideshow/index.jpg" width="750" height="300">
              <div class="carousel-caption">
                <h4>First Thumbnail label</h4>
              </div>
            </div>
            <div class="item">
              <img alt="" src="<?php echo base_url()?>images/slideshow/index2.jpg" width="750" height="300">
              <div class="carousel-caption">
                <h4>Third Thumbnail label</h4>
              </div>
            </div>
            <div class="item">
              <img alt="" src="<?php echo base_url()?>images/slideshow/index3.jpg" width="750" height="300">
              <div class="carousel-caption">
                <h4>Third Thumbnail label</h4>
              </div>
            </div>
            <div class="item">
              <img alt="" src="<?php echo base_url()?>images/slideshow/index4.jpg" width="750" height="300">
              <div class="carousel-caption">
                <h4>Third Thumbnail label</h4>
              </div>
            </div>
            <div class="item">
              <img alt="" src="<?php echo base_url()?>images/slideshow/index5.jpg" width="750" height="300">
              <div class="carousel-caption">
                <h4>Third Thumbnail label</h4>
              </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
      </div>
    </div>
</div>
<div class="row-fluid">
          <div class="span6">
             <h3 class="">Whats New Here?</h3>
             <?php if($comments): foreach($comments as $row):?>
                <div id="comment">  
                <div class="commentor">
                    <div>
                      <strong>
                      <?php echo $row->username;?></strong> says on <span style="font-size:10px;"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($row->date_added));?></span>
                    </div>
                    <div><?php echo $row->comment;?></div>
                    <div style="float:right; font-size:12px; margin-bottom:0 0;">
                  <a class="btn btn-primary" href="<?php echo base_url() ?>comment/commpost/<?php echo $row->post_id; ?>">MORE>></a>
                </div> 
                </div>

            </div>
          <?php endforeach;  ?>
          <?php else :?>
          <?php endif ; ?>
    </div>
     <div class="span6">
      <h3 class="">Upcoming Events</h3>
     <?php if(isset($events)) : foreach ($events as $r) : ?>
     <?php $time=$r->start_date;
     ?>
      <div class="post">
          <div class="left">
          <?php $im=$r->image; ?>
          <?php if($im != NULL) : ?> 
          <a href="<?php echo base_url()?>images/event/<?php echo $im; ?>"><img width="70" height="50" src="<?php echo base_url()?>images/event/thumbs/<?php echo $im; ?>" /></a>
          <?php else : ?>
          <a href="<?php echo base_url()?>images/no_image.jpg"><img  width="70" height="50"src="<?php echo base_url()?>images/no_image.jpg" /></a>
          <?php endif ; ?>
          </div>
          <div class="right">
          <div style="float:right; font-size:12px; margin:0 5px;"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($r->date_added));?></div>
          <h3><?php echo $r->event_name;?></h3>
          <?php echo substr($r->description, 0, 100);?> 
          <div style="float:right; font-size:12px; margin-bottom:0 0;">
            <a class="btn btn-primary" href="<?php echo base_url() ?>comment/commevent/<?php echo $r->event_id; ?>">Read more>></a>
          </div>  
        </div>
    </div><!-- Close post -->
  <?php endforeach;  ?>
  <?php else :?>
  <?php endif ; ?>
    </div>
</div>
</div>