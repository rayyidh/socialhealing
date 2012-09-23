<?php
if(!isset($members_id)){
  $members_id = @field($this->uri->segment(3, NULL), $this->validation->members_id, 'X');
}
echo validation_errors('<p class="error">');
echo form_open('admin/members/save',
  array('class' => 'cssform', 'id' => 'members_add'),
  array('members_id' => $members_id)
);

?>
<?php
    $members_id = @field($this->validation->members_id, $members->user_id);
             echo form_input(array(
                   'name' => 'members_id',
                   'id' => 'members_id',
                   'size' => '20',
                   'maxlength' => '50',
                   'value' => $members_id,
                   'type'=> 'hidden',
               ));
             ?>
<div class="row">
<div class="span7">
  <div class="btn-group">
    <a href="<?php echo base_url() ?>index.php/admin/members" class="btn btn-success"><i class="icon-plus-sign"></i> Cancel</a>
  </div>
</div>
	  <div class="span8">
        <fieldset class="form-horizontal">
          <legend accesskey="D" tabindex="1">Members Information</legend>
          <div class="control-group">
          <label for='name'>Name </label>
            <div class="controls">
              <?php
                $name = @field($this->validation->name, $members->first_name);
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
          <label for='membersname'>Members : </label>
            <div class="controls">
              <select id="members_id" name="user_id">
                <option value="0">Username</option>
                <?php foreach ($childmem as $c) : ?>
               <option value='<?php echo $c->user_id; ?>'><?php echo $c->first_name; ?></option>
                <?php endforeach;  ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label for='desc'>Username : </label>
            <div class="controls">
              <?php
                $Username = @field($this->validation->username, $members->username);
                echo form_textarea(array(
                    'name' => 'username',
                    'id' => 'username',
                    'size' => '50',
                    'rows' => '3',
                    'maxlength' => '255',
                    'value' => $Username,
                ));
              ?>
              <?php echo @field($this->validation->username) ?>
            </div>
          </div>
          <div class="form-actions">
         <?php echo form_submit('submit','Save') ?> 
         <?php echo anchor('admin/username', 'Cancel') ?>
          </div>
        </fieldset>
	 </div>
</div>