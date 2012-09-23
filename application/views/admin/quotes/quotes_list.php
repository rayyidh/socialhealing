<div class="row">
    <div class="span11">
       <div class="btn-group">
         <a href="<?php echo base_url() ?>index.php/admin/quotes/add" class="btn btn-success"><i class="icon-plus-sign"></i> Add</a>
        </div> 

      <?php echo form_open('admin/quotes/delete'); ?>
        <table class="table table-striped">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left">Admin</td>
              <td class="left">Quotes</td>
              <td class="right">Action</td>
              <td class="right">Action</td>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($quotes as $q) : ?>
            <tr>
              <td style="text-align: center;">
              <input type="checkbox" name="selected" value="<?php echo $c->quote_id; ?>" /></td>
              <td class="left"><?php echo $c->name; ?></td>
              <td class="left"><?php echo $c->quote; ?></td>
              <td class="right"><a onclick="location = '<?php echo base_url() ?>index.php/admin/quotes/edit/<?php echo $c->quote_id; ?>'" class="btn btn-info" ><i class="icon-edit"></i>Edit</a></td>
              <td class="right"><a onclick="location = '<?php echo base_url() ?>index.php/admin/quotes/delete/<?php echo $c->quote_id; ?>'" class="btn btn-danger" ><i class="icon-trash icon-white"></i>Delete</a></td>
            </tr>
                    <?php endforeach;  ?>
          </tbody>
        </table>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>