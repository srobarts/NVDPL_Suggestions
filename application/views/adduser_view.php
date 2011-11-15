

<div class="row">
<div class="span8 offset4">

<h2>Add User</h2>

<p class="page_title" title="users"></p>

<div class="input_table_buttons_container">
	<?php echo anchor('users', 'Back to User List', 'class="button"'); ?>
</div>

	<?php echo form_open('users/process_adduser'); ?>
		<fieldset>
	  		<legend>Enter User Information:</legend>
				<div class="clearfix">
					<label for="userFirstName">Staff Name:</label>
					<div class="input">
						<input class="input" name="staffName" id="staffName" size="30" type="text" />
					</div>
			  	</div><!-- /clearfix -->
				<div class="clearfix">
					<label for="userEmail">Staff Email:</label>
					<div class="input">
						<input class="input" id="staffEmail" name="staffEmail" size="30" type="text" />
					</div>
			  	</div><!-- /clearfix -->
				<div class="clearfix">
					<label for="userEmail">Password:</label>
					<div class="input">
						<input class="input" id="password" name="password" size="30" type="text" />
					</div>
			  	</div><!-- /clearfix -->
		</fieldset>
		
		<div class="actions">
        	<input type="submit" class="btn primary" name="action" value="Add User">&nbsp;
        	<button type="submit" class="btn" name="action" value="Cancel">Cancel</button>
       	</div>
    </form>
       	
</div>
</div>




