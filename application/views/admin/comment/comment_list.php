<div class="row">
    <div class="span11">
       <div class="btn-group">
         <a href="<?php echo base_url() ?>index.php/admin/comment/add" class="btn btn-success"><i class="icon-plus-sign"></i> Add</a>
        </div> 

      <?php echo form_open('admin/comment/delete'); ?>
        <table class="table table-striped">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left"><b>User Name</b></td>
              <td class="left"><b>comment<b></td>
              <td class="right"><b>Action<b></td>
              <td class="right"><b>Action<b></td>
            </tr>
          </thead>
          <tbody>
             <?php foreach ($comment as $c) : ?>
            <tr>
              <td style="text-align: center;">
              <input type="checkbox" name="selected" value="<?php echo $c->comment_id; ?>" /></td>
              <td class="left"><?php echo $c->user_id; ?></td>
              <td class="left"><?php echo $c->comment; ?></td>
              <td class="right"><a onclick="location = '<?php echo base_url() ?>index.php/admin/comment/edit/<?php echo $c->comment_id; ?>'" class="btn btn-info" ><i class="icon-edit"></i>Edit</a></td>
              <td class="right"><a onclick="location = '<?php echo base_url() ?>index.php/admin/comment/delete/<?php echo $c->comment_id; ?>'" class="btn btn-danger" ><i class="icon-trash icon-white"></i>Delete</a></td>
            </tr>
                    <?php endforeach;  ?>
          </tbody>
        </table>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>