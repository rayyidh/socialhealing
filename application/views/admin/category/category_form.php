<?php
if(isset($category_id)){
  $category_id = @field($this->url->segment(3, NULL), $this->validation->category_id, 'X');
}
?>
<div class="row">
<div class="span7">
  <div class="btn-group">
    <a href="<?php echo base_url() ?>index.php/admin/category" class="btn btn-success"><i class="icon-plus-sign"></i> Cancel</a>
  </div>
</div>
	  <div class="span8">
        <fieldset class="form-horizontal">
          <?php echo validation_errors('<p class="error">');
          echo form_open('admin/category/save'); ?>
          <?php
    $category_id = @field($this->validation->category_id, $category->category_id);
             echo form_input(array(
                   'name' => 'category_id',
                   'id' => 'category_id',
                   'size' => '20',
                   'maxlength' => '50',
                   'value' => $category_id,
                   'type'=> 'hidden',
               ));
             ?>
          <legend accesskey="D" tabindex="1">Category Information</legend>
          <div class="control-group">
          <label for='name'>Name </label>
            <div class="controls">
              <?php
                $name = @field($this->validation->name, $category->name);
                echo form_input(array(
                    'name' => 'name',
                    'id' => 'name',
                    'size' => '20',
                    'maxlength' => '50',
                    'value' => $name,
                ));
              ?>
              <?php echo @field($this->validation->name_error) ?>
            </div>
          </div>
          <div class="control-group">
          <label for='categoryname'>Category : </label>
            <div class="controls">
              <select id="category_id" name="parent_id">
                <?php if($category->parent_id == 0) :
                echo "<option value='0'>parent</option>";
                else :
                echo "<option value='$category->parent_id'>$category->parent_id</option>";
                endif ; ?>
                <?php foreach ($parentcat as $c) : ?>
               <option value='<?php echo $c->category_id; ?>'><?php echo $c->name; ?></option>
                <?php endforeach;  ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label for='desc'>Description : </label>
            <div class="controls">
              <?php
                $description = @field($this->validation->description, $category->description);
                echo form_textarea(array(
                    'name' => 'description',
                    'id' => 'description',
                    'size' => '50',
                    'rows' => '3',
                    'maxlength' => '255',
                    'value' => $description,
                ));
              ?>
              <?php echo @field($this->validation->description_error) ?>
            </div>
          </div>
          <div class="form-actions">

         <?php echo form_submit('submit','Save') ?> 
         <?php echo anchor('admin/category', 'Cancel') ?>
          </div>
        </fieldset>
	 </div>
</div>