<?php $this->load->view('common/slideshow'); ?>
<div class="span4">
    <div class="row">
      <div class="span4">
        <ul class="nav nav-tabs">
          <li><a href="<?php echo base_url() ?>home">POPULAR</a></li>
          <li><a href="<?php echo base_url() ?>home/latest">LATEST</a></li>
          <li class="active"><a href="<?php echo base_url() ?>home/comment">COMMENTS</a></li>
        </ul>
        </div>
        <div class="span4">
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
    <div class="span4">
        <h4 class="latest">Archives</h4>  
        <div class="hero-unit"></div>
        </div>
  </div>
</div>