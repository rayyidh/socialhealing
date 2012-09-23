 <div class="span4">
<?php echo validation_errors('<p class="error">'); ?>
<?php echo form_open('users/create_member'); ?>
<legend>Registration</legend>
<div class="offset1">
  <input placeholder="First Name" id="firstname" style="margin-bottom: 15px;" type="text" name="firstname" size="30" />
  <input placeholder="Last Name" id="lastname" style="margin-bottom: 15px;" type="text" name="lastname" size="30" />
  <input placeholder="Username" id="username" style="margin-bottom: 15px;" type="text" name="username" size="30" />
  <input placeholder="Password" id="password" style="margin-bottom: 15px;" type="password" name="password" size="30" />
  <input placeholder="Confirm Password" id="cpassword" style="margin-bottom: 15px;" type="password" name="confirm" size="30" />
  <input placeholder="Phone No" id="phoneno" style="margin-bottom: 15px;" type="text" name="phone_no" size="30" />
  <select id="place_id" name="county_id">
  <?php foreach ($places as $p) : ?>
    <option value="<?php echo $p->place_id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach;  ?>
  </select>
  <input placeholder="Email Address" id="email" style="margin-bottom: 15px;" type="text" name="email" size="30" />
  <select id="gender" name="gender">
    <option value="">Gender</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
  </select><BR>
  Image<BR>
  <input type="file" name="userfile" size="20" />
  <input class="btn btn-success" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="submit" value="Register" />
</div>
<?php echo form_close(); ?>
</div>
</div>