<?php
if(isset($event_id)){
  $event_id = @field($this->uri->segment(3, NULL), $this->validation->event_id, 'X');
}
?>

<div class="row">
<div class="span7">
  <div class="btn-group">
    <a href="<?php echo base_url() ?>index.php/admin/events" class="btn btn-success"><i class="icon-plus-sign"></i> Cancel</a>
  </div>
</div>
    <div class="span6">
        <fieldset class="form-horizontal">
          <?php echo validation_errors('<p class="error">');
          echo form_open('admin/events/save'); ?>
          <?php
    $event_id = @field($this->validation->event_id, $event->event_id);
             echo form_input(array(
                   'name' => 'event_id',
                   'id' => 'event_id',
                   'size' => '20',
                   'maxlength' => '50',
                   'value' => $event_id,
                   'type'=> 'hidden',
               ));
             ?>
          <legend><?php echo $title ?></legend>
          <div class="offset1">
          <?php $org_name = @field($this->validation->event_id, $event->org_name); ?>
          <input placeholder="Organisation Name" id="org_name" style="margin-bottom: 15px;" type="text" name="org_name" class="input-xlarge" value="<?php echo $org_name; ?>" />
         
          <?php $org_email = @field($this->validation->event_id, $event->org_email); ?>
          <input placeholder="Organisation Email" id="org_email" style="margin-bottom: 15px;" type="text" name="org_email" class="input-xlarge" value="<?php echo $org_email?>" />
          
          <?php $event_name = @field($this->validation->event_id, $event->event_name); ?>
          <input placeholder="Event Name" id="event_name" style="margin-bottom: 15px;" type="text" name="event_name" class="input-xlarge" value="<?php echo $event_name; ?>"/><BR>
          
          Town<select id="place_id" name="place_id"  placeholder="Town">
          <option value="">Select County</option>
          <?php foreach ($places as $p) : ?>
          <option value="<?php echo $p->place_id; ?>"><?php echo $p->name; ?></option>
          <?php endforeach;  ?>
          </select><BR>
          
          <?php $time = @field($this->validation->event_id, $event->time); ?>
          <input placeholder="Time" id="firstname" style="margin-bottom: 15px;" type="text" name="time"class="input-xlarge" value="<?php echo $time; ?>"/>
          
          <?php $venue = @field($this->validation->event_id, $event->venue); ?>
          <input placeholder="Venue/Place" id="username" style="margin-bottom: 15px;" type="text" name="venue" class="input-xlarge" value="<?php echo $venue; ?>"/>
          
          <?php $start_date = @field($this->validation->event_id, $event->start_date); ?>
          <input placeholder="Start date" id="startdate" style="margin-bottom: 15px;" type="text" name="start_date" class="input-xlarge" value="<?php echo $start_date; ?>"/>
         
         <?php $end_date = @field($this->validation->event_id, $event->end_date); ?>
          <input placeholder="End Date" id="enddate" style="margin-bottom: 15px;" type="text" name="end_date" class="input-xlarge" value="<?php echo $start_date; ?>"/>
          
          <?php $description = @field($this->validation->event_id, $event->description); ?>
          <textarea placeholder="Description" rows="3" id="textarea" class="input-xlarge" name="desc" ><?php echo $description; ?></textarea><BR>
          
          <?php $userfile = @field($this->validation->event_id, $event->userfile); ?>
          Image <input type="file" name="userfile" size="25" />
          </div>
          <div class="form-actions">
         <a href=""><?php echo form_submit('submit','Create Event');?></a>
            <?php echo form_close(); ?>
          </div>
        </fieldset>
   </div>
</div>