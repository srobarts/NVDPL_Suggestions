

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
						<input class="input" name="userFirstName" id="userFirstName" size="30" type="text" />
					</div>
			  	</div><!-- /clearfix -->
				<div class="clearfix">
					<label for="userEmail">Staff Email:</label>
					<div class="input">
						<input class="input" id="userEmail" name="userEmail" size="30" type="text" />
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
        	<input type="submit" class="btn primary" value="Add User">&nbsp;<button type="reset" class="btn">Cancel</button>
       	</div>
       	
</div>
</div>




