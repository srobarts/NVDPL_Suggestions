

<div class="row">
<div class="span8 offset4">

<h2>View Suggestion / Add Note</h2>

<p class="page_title" title="suggestions"></p>

<div class="input_table_buttons_container">
	<?php echo anchor('main', 'Back to Suggestion Listing', 'class="button"'); ?>
</div>

<br />

	<?php
	if(isset($query))
	{
		foreach($query->result() as $row)
		{
			$suggestionIdLocal = $row->id;
	?>
			<!-- read only suggestion information -->
      		<form>
			<fieldset>
		  		<legend>Suggestion Information:</legend>
		          	<div class="clearfix">
		            	<label>Submitter:</label>
		            	<div class="input">
		              		<span class="uneditable-input"><?php echo $row->staffName; ?></span>
		            	</div>
		          	</div><!-- /clearfix -->
		          	<div class="clearfix">
		            	<label>Submitter Email:</label>
		            	<div class="input">
		              		<span class="uneditable-input"><?php echo $row->staffEmail; ?></span>
		            	</div>
		          	</div><!-- /clearfix -->
		          	<div class="clearfix">
		            	<label>Submission Date:</label>
		            	<div class="input">
		              		<span class="uneditable-input"><?php echo $row->timestamp; ?></span>
		            	</div>
		          	</div><!-- /clearfix -->
				  	<div class="clearfix">
		            <label for="disabledInput">Suggestion:</label>
		            <div class="input">
		              <textarea class="xxlarge" name="textarea" id="textarea" rows="10"><?php echo $row->suggestion; ?></textarea>
		            </div>
		          	</div><!-- /clearfix -->


		          	<?php echo form_open('main/save_mgmt_decision'); ?>
					<fieldset>
						<input type="hidden" name="suggestionId" id="suggestionId" value="<?php echo( $this->uri->segment(3) ); ?>" />
	  					<legend>Management Decision:</legend>
					       	<div class="clearfix">
							<label for="textarea">Management Decision</label>
							<div class="input">
								<textarea class="xxlarge" id="mgmtDecision" name="mgmtDecision" rows="3">
									<?php echo $row->mgmtDecision; ?>
								</textarea>
							  		<span class="help-block">
										Enter final decision with regards to the suggestion - will be visible to staff.
							  		</span>
								</div>
						  	</div><!-- /clearfix -->
						<div class="actions">
				    		<input type="submit" class="btn primary" name="action" value="Add Decision">&nbsp;
				    		<button type="submit" class="btn" name="action" value="Cancel">Cancel</button>
				   		</div>
				   	</fieldset> 
				    </form>
			
	<?php 
		}
	}
	?>


	<div class="row">
		<div class="span12">
			<hr />
			<h2>Comments:</h2>

			<?php
				$uri_seg = "comments/add_comment" . "/" . $suggestionIdLocal;
				echo anchor($uri_seg, 'Add Comment', 'class="btn"');
				echo "<br><br>";
			?>

			<table class="zebra-striped">
				<tr>
					<!-- <th width="100">Comment Id</th> -->
					<!-- <th width="100">Suggestion Id</th> -->
					<th width="200">Submitter</th>
					<th width="200">Timestamp</th>
					<th width="400">Comment</th>
				</tr>

			<?php

			if(isset($comments))
			{
				foreach($comments->result() as $row)
				{
					echo "<tr>";
					//$uri_seg = "comments/view_comment/" . $row->id;
					//echo "<td>" . $row->id . "</td>";
					//echo "<td>" . $row->suggestionId . "</td>";
					echo "<td>" . $row->staffName . "</td>";
					echo "<td>" . $row->timestamp . "</td>";
					echo "<td>" . $row->comment . "</td>";
					echo "</tr>";
				}
			}

			?>
			</table>
		</div> <!-- span -->
	</div> <!-- row -->

	<div class="row">
		<div class="span 8 offset 4">

		<div class="alert-message block-message info">
	    	<a class="close" href="#"></a>
	    	<p><strong>Set Status of Suggestion</strong></p>
	    	<div class="alert-actions">
	    		<?php $uri_seg_not = "main/set_not_responded/" . $suggestionIdLocal; ?>
	    		<?php echo anchor($uri_seg_not, 'Set Not Responded', 'class="btn"'); ?>
	    		<?php $uri_seg = "main/set_responded/" . $suggestionIdLocal; ?>
	    		<?php echo anchor($uri_seg, 'Set Responded', 'class="btn success"'); ?>
	    		<?php $uri_seg_not = "main/set_final/" . $suggestionIdLocal; ?>
	    		<?php echo anchor($uri_seg_not, 'Set Final', 'class="btn danger"'); ?>
	    	</div>
	    </div>

	    </div>
	</div>

	
       	
</div>
</div>




