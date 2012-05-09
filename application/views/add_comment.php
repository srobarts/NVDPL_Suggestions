
<div class="row">
<div class="span8 offset4">

<h2>Add Management Note</h2>

<p class="page_title" title="suggestions"></p>

<div class="input_table_buttons_container">
	<?php echo anchor('main', 'Back to Suggestion Listing', 'class="button"'); ?>
</div>

<br />

<?php date_default_timezone_set('UTC') ?>

	<?php echo form_open('comments/process_add_comment'); ?>
		<fieldset>
	  		<!-- <legend>Add Management Note:</legend> -->
	  			<input type="hidden" name="suggestionId" id="suggestionId" value="<?php echo( $this->uri->segment(3) ); ?>" />
				<div class="clearfix">
					<label for="staffName">Staff Name:</label>
					<div class="input">
		            	<span class="uneditable-input"><?php echo($this->session->userdata('staffName')); ?></span>
		            </div>
		            <input type="hidden" name="staffName" id="staffName" value="<?php echo($this->session->userdata('staffName')); ?>" />
			  	</div><!-- /clearfix -->
				<div class="clearfix"> 
					<label for="timestamp">Timestamp:</label>
					<div class="input">
		              	<span class="uneditable-input"><?php echo( date("Y-m-d H:i:s") ); ?></span>
		            </div>
		            <input type="hidden" name="timestamp" id="timestamp" value="<?php echo( date("Y-m-d H:i:s") ); ?>" />
			  	</div><!-- /clearfix -->
			  	<div class="clearfix">
				<label for="textarea">Note</label>
				<div class="input">
					<textarea class="xxlarge" id="comment" name="comment" rows="8"></textarea>
				  		<span class="help-block">
							Enter any notes or comments above related to the suggestion.
				  		</span>
					</div>
			  	</div><!-- /clearfix -->
		
	<div class="actions">
    	<input type="submit" class="btn primary" name="action" value="Add Note">&nbsp;
    	<button type="submit" class="btn" name="action" value="Cancel">Cancel</button>
   	</div>

   	</fieldset>
       
    </form>

</div>
</div>