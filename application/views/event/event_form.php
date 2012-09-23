<div class="row">
  <div class="span7">
    <ul class="nav nav-tabs">
    <li><a href="<?php echo base_url() ?>index.php/events">Events</a></li>
    <li><a href="<?php echo base_url() ?>index.php/events/pastevent">Past Events</a></li>
    <li class="active"><a href="<?php echo base_url() ?>index.php/events/postevent">Post an Event</a></li>
    </ul>
  </div>
  <div class="span8">
       <div class="btn-group">
         <a href="<?php echo base_url() ?>index.php/events" class="btn btn-success"><i class="icon-plus-sign"></i> Cancel</a>
        </div>
      </div>
	  <div class="span6">
        <fieldset class="form-horizontal">
          <legend>Add an Event</legend>
          <div class="offset1">
          <?php echo validation_errors('<p class="error">'); ?>
          <?php echo form_open_multipart('events/add_event'); ?>
          <input placeholder="Organisation Name" id="org_name" style="margin-bottom: 15px;" type="text" name="org_name" class="input-xlarge" />
          <input placeholder="Organisation Email" id="org_email" style="margin-bottom: 15px;" type="text" name="org_email" class="input-xlarge" />
          <input placeholder="Event Name" id="event_name" style="margin-bottom: 15px;" type="text" name="event_name" class="input-xlarge" /><BR>
          Town<select id="place_id" name="place_id"  placeholder="Town">
          <option value="">Select County</option>
          <?php foreach ($places as $p) : ?>
            <option value="<?php echo $p->place_id; ?>"><?php echo $p->name; ?></option>
          <?php endforeach;  ?>
          </select><BR>
          <input placeholder="Time" id="firstname" style="margin-bottom: 15px;" type="text" name="time"class="input-xlarge"/>
          <input placeholder="Venue/Place" id="username" style="margin-bottom: 15px;" type="text" name="venue" class="input-xlarge" />
          <input placeholder="Start date" id="startdate" style="margin-bottom: 15px;" type="text" name="start_date" class="input-xlarge" />
          <input placeholder="End Date" id="enddate" style="margin-bottom: 15px;" type="text" name="end_date" class="input-xlarge" />
          <textarea placeholder="Description" rows="3" id="textarea" class="input-xlarge" name="desc"></textarea><BR>
          Image <input type="file" name="userfile" size="25" />
          </div>
          <div class="form-actions">
         <a href=""><?php echo form_submit('submit','Create Event');?></a>
            <?php echo form_close(); ?>
          </div>
        </fieldset>
   </div>
 </div>
</div>