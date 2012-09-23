<?php
if(isset($post_id)){
  $post_id = @field($this->url->segment(3, NULL), $this->validation->post_id, 'X');
}
?>
<div class="row">
<div class="span7">
  <div class="btn-group">
    <a href="<?php echo base_url() ?>index.php/admin/post" class="btn btn-success"><i class="icon-plus-sign"></i> Cancel</a>
  </div>
</div>
     <div class="span8">
        <fieldset class="form-horizontal">
          <?php echo validation_errors('<p class="error">');
          echo form_open('admin/post/save'); ?>
          <?php
    $post_id = @field($this->validation->post_id, $post->post_id);
             echo form_input(array(
                   'name' => 'post_id',
                   'id' => 'post_id',
                   'size' => '20',
                   'maxlength' => '50',
                   'value' => $post_id,
                   'type'=> 'hidden',
               ));
             ?>
         <legend><?php echo $title ?></legend>
          <label for='title'>Title : </label>
            <div class="controls">
          <?php $title = @field($this->validation->post_id, $post->post_title); ?>
          <input placeholder="Title" id="title" style="margin-bottom: 15px;" type="text" name="title" class="input-xlarge" value="<?php echo $title; ?>" />
            </div>
          <label for='category_id'>Category :</label>
            <div class="controls">
              <select id="category_id" name="category_id">
                <option value=''>Category</option>
                
                <?php foreach ($categories as $c) : ?>
                <option value='<?php echo $c->category_id; ?>'><?php echo $c->name; ?></option>
                   <?php endforeach;  ?>
              </select>
          </div>
          <label for='desc'>Description : </label>
            <div class="controls">
              <?php $description = @field($this->validation->post_id, $post->description); ?>
          <textarea placeholder="Description" rows="3" id="textarea" class="input-xlarge" name="desc" ><?php echo $description; ?></textarea><BR>
            </div>
          <label for="town">Town</label>
            <div class="controls">
              <select id="place_id" name="place_id">
              <?php foreach ($places as $p) : ?>
                <option value="<?php echo $p->place_id; ?>"><?php echo $p->name; ?></option>
              <?php endforeach;  ?>
              </select>
            </div>
            <label for="fileInput">Image</label>
            <div class="controls">
              <input type="file" name="userfile" size="20" />
            </div>
          <div class="form-actions">
         <?php echo form_submit('submit','Save') ?> 
         <?php echo anchor('admin/post', 'Cancel') ?>
            <?php echo form_close(); ?>
          </div>
        </fieldset>
   </div>
</div>