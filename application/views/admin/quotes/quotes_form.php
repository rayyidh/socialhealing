<?php
if(!isset($quote_id)){
  $quote_id = @field($this->uri->segment(3, NULL), $this->validation->quote_id, 'X');
}
echo validation_errors('<p class="error">');
echo form_open('admin/quotes/save',
  array('class' => 'cssform', 'id' => 'quote_add'),
  array('quote_id' => $quote_id)
);

?>
<?php
    $quote_id = @field($this->validation->quote_id, $quote->quote_id);
             echo form_input(array(
                   'name' => 'quote_id',
                   'id' => 'quote_id',
                   'size' => '20',
                   'maxlength' => '50',
                   'value' => $quote_id,
                   'type'=> 'hidden',
               ));
             ?>
<div class="row">
<div class="span7">
  <div class="btn-group">
    <a href="<?php echo base_url() ?>index.php/admin/quotes" class="btn btn-success"><i class="icon-plus-sign"></i> Cancel</a>
  </div>
</div>
	  <div class="span8">
        <fieldset class="form-horizontal">
          <legend accesskey="D" tabindex="1">Quote Information</legend>
          <div class="control-group">
          <label for='name'>Name </label>
            <div class="controls">
              <?php
                $name = @field($this->validation->name, $quote->name);
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
          <label for='quotename'>Quotes : </label>
            <div class="controls">
              <select id="quote_id" name="admin_id">
                <option value="0">Admin</option>
                <?php foreach ($childquote as $c) : ?>
               <option value='<?php echo $c->quote_id; ?>'><?php echo $c->name; ?></option>
                <?php endforeach;  ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label for='quote'>Quote : </label>
            <div class="controls">
              <?php
                $quote = @field($this->validation->quote, $quote->quote);
                echo form_textarea(array(
                    'name' => 'quotes',
                    'id' => 'quotes',
                    'size' => '50',
                    'rows' => '3',
                    'maxlength' => '255',
                    'value' => $quote,
                ));
              ?>
              <?php echo @field($this->validation->quote_error) ?>
            </div>
          </div>
          <div class="form-actions">
         <?php echo form_submit('submit','Save') ?> 
         <?php echo anchor('admin/quotes', 'Cancel') ?>
          </div>
        </fieldset>
	 </div>
</div>