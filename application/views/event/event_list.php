 <div class="row">
     <div class="span7">
    <ul class="nav nav-tabs">
    <li class="active"><a href="<?php echo base_url() ?>index.php/events">Events</a></li>
    <li><a href="<?php echo base_url() ?>index.php/events/pastevent">Past Events</a></li>
    <li><a href="<?php echo base_url() ?>index.php/events/postevent">Post an Event</a></li>
    </ul>
  </div>
  <div class="span7">
     <?php if(isset($events)) : foreach ($events as $r) : ?>
     <?php $time=$r->start_date;
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
          <div style="float:right; font-size:12px; margin:0 0;">
            <a class="btn btn-primary" href="<?php echo base_url() ?>comment/comm/<?php echo $r->event_id; ?>">Like</a>
            <a class="btn btn-primary" href="<?php echo base_url() ?>comment/commevent/<?php echo $r->event_id; ?>">Comment</a>
          </div>
        </table>
      </div>
    </div><!-- Close post -->
  <?php endforeach;  ?>
  <?php else :?>
  <?php endif ; ?>
    </div>
</div>
</div>