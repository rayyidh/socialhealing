<div class="row">
  <div class="span7">
     <?php if(isset($news)) : foreach ($news as $r) : ?>
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
          <tr><td>News Title :</td><td><?php echo $r->news_title?></td></tr>
          <tr><td>Description :</td><td><?php echo $r->description?></td></tr>
        </table>
      </div>
    </div><!-- Close post -->
  <?php endforeach;  ?>
  <?php else :?>
  <h3>No Data </h3>
  <?php endif ; ?>
  <h3>No Data </h3>
    </div>
</div>
</div>