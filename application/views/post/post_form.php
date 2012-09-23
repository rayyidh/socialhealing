<div class="row">
  <div class="span7">
       <div class="btn-group">
         <a href="<?php echo base_url() ?>index.php/post" class="btn btn-success"><i class="icon-plus-sign"></i> Cancel</a>
        </div>
      </div>
     <div class="span8">
        <fieldset class="form-horizontal">
          <legend>Add Discussion</legend>
          <?php echo validation_errors('<p class="error">'); ?>
          <?php echo form_open_multipart('post/add_post'); ?>
          <label for='title'>Title : </label>
            <div class="controls">
              <?php echo form_input('title',set_value('title','')); ?>
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
              <textarea rows="3" id="textarea" class="input-xlarge" name="desc"></textarea>
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
         <a href="<?php echo base_url() ?>post/postcat/<?php echo $this->input->post('category_id'); ?>"><?php echo form_submit('submit','Create Post');?></a>
            <?php echo form_close(); ?>
          </div>
        </fieldset>
   </div>
 </div>
</div>