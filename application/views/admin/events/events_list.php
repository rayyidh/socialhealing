<div class="row">
    <div class="span12">
       <div class="btn-group">
         <a href="<?php echo base_url() ?>index.php/admin/events/add" class="btn btn-success"><i class="icon-plus-sign"></i> Add</a>
        </div> 

      <?php echo form_open('admin/event/delete'); ?>
        <table class="table table-striped">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left"><b>Organization Name</b></td>
              <td class="left"><b>Event Title</b></td>
              <td class="left"><b>Venue</b></td>
              <td class="left"><b>Description<b></td>
              <td class="left"><b>Organization Email<b></td>
              <td class="right"><b>Action<b></td>
              <td class="right"><b>Action<b></td>
            </tr>
          </thead>
          <tbody>
             <?php foreach ($event as $c) : ?>
            <tr>
              <td style="text-align: center;">
              <input type="checkbox" name="selected" value="<?php echo $c->event_id; ?>" /></td>
              <td class="left"><?php echo $c->org_name; ?></td>
              <td class="left"><?php echo $c->event_name; ?></td>
              <td class="left"><?php echo $c->venue; ?></td>
              <td class="left"><?php echo $c->description; ?></td>
              <td class="left"><?php echo $c->org_email; ?></td>
              <td class="right"><a onclick="location = '<?php echo base_url() ?>index.php/admin/events/edit/<?php echo $c->event_id; ?>'" class="btn btn-info" ><i class="icon-edit"></i>Edit</a></td>
              <td class="right"><a onclick="location = '<?php echo base_url() ?>index.php/admin/events/delete/<?php echo $c->event_id; ?>'" class="btn btn-danger" ><i class="icon-trash icon-white"></i>Delete</a></td>
            </tr>
                    <?php endforeach;  ?>
          </tbody>
        </table>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>