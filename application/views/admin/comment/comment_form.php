<?php
if(isset($comment_id)){
  $comment_id = @field($this->uri->segment(3, NULL), $this->validation->comment_id, 'X');
}

?>
<div class="row">
<div class="span7">
  <div class="btn-group">
    <a href="<?php echo base_url() ?>index.php/admin/comment" class="btn btn-success"><i class="icon-plus-sign"></i> Cancel</a>
  </div>
</div>
    <div class="span8">
        <fieldset class="form-horizontal">
          <?php echo validation_errors('<p class="error">');
          echo form_open('admin/comment/save'); ?>
          <?php
    $comment_id = @field($this->validation->comment_id, $comment->comment_id);
             echo form_input(array(
                   'name' => 'comment_id',
                   'id' => 'comment_id',
                   'size' => '20',
                   'maxlength' => '50',
                   'value' => $comment_id,
                   'type'=> 'hidden',
               ));
             ?>
          <legend accesskey="D" tabindex="1">Comment Information</legend>
          
          
          <div class="control-group">
            <label for='comment'>Comment : </label>
            <div class="controls">
             <?php $comm = @field($this->validation->comment, $comment->comment); ?>
          <textarea placeholder="Comment" rows="3" id="textarea" class="input-xlarge" name="comm" ><?php echo $comm; ?></textarea><BR>
            </div>
          </div>
          <div class="form-actions">
         <?php echo form_submit('submit','Save') ?> 
         <?php echo anchor('admin/comment', 'Cancel') ?>
          </div>
        </fieldset>
   </div>
</div>