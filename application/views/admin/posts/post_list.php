<div class="row">
    <div class="span12">
       <div class="btn-group">
         <a href="<?php echo base_url() ?>index.php/admin/post/add" class="btn btn-success"><i class="icon-plus-sign"></i> Add</a>
        </div> 

      <?php echo form_open('admin/post/delete'); ?>
        <table class="table table-striped">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left"><b>Post Title</b></td>
              <td class="left"><b>Description<b></td>
              <td class="right"><b>Action<b></td>
              <td class="right"><b>Action<b></td>
            </tr>
          </thead>
          <tbody>
             <?php foreach ($post as $c) : ?>
            <tr>
              <td style="text-align: center;">
              <input type="checkbox" name="selected" value="<?php echo $c->post_id; ?>" /></td>
              <td class="left"><?php echo $c->post_title; ?></td>
              <td class="left"><?php echo $c->description; ?></td>
              <td class="right"><a onclick="location = '<?php echo base_url() ?>index.php/admin/post/edit/<?php echo $c->post_id; ?>'" class="btn btn-info" ><i class="icon-edit"></i>Edit</a></td>
              <td class="right"><a onclick="location = '<?php echo base_url() ?>index.php/admin/post/delete/<?php echo $c->post_id; ?>'" class="btn btn-danger" ><i class="icon-trash icon-white"></i>Delete</a></td>
            </tr>
                    <?php endforeach;  ?>
          </tbody>
        </table>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>