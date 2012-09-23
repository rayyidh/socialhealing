 <div class="span3">
<legend>login</legend>
<?php echo validation_errors('<p class="error">'); ?>
<?php echo form_open('login/validate_credentials'); ?>
<input placeholder="Username" id="user_username" style="margin-bottom: 15px;" type="text" name="username" size="30" />
<input placeholder="Password" id="user_password" style="margin-bottom: 15px;" type="password" name="password" size="30" /><BR>
<input id="user_remember_me" style="float: left; margin-right: 10px;" type="checkbox" name="remember_me" value="1" />
<label class="string optional" for="user_remember_me"> Remember me</label>
<input class="btn btn-success" type="submit" name="submit" value="Sign In" />
<?php echo anchor('users','Register') ?>
<?php echo form_close(); ?>


</div>
</div>