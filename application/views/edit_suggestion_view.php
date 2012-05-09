

<div class="row">
<div class="span12 offset6">


<?php
	if(isset($query))
	{
		foreach($query->result() as $row)
		{
			if($row->respondStatus == 0)
			{
				echo "<div class=\"alert-message block-message warning\">";
				echo "<p><strong>Heads Up:</strong> This suggestion has not been responded to.</p>";
				echo "</div>";
			}
			if($row->finalStatus == 0)
			{
				echo "<div class=\"alert-message block-message success\">";
				echo "<p><strong>Suggestion not in Final Status.</strong> This suggestion is in not in final status and is hidden from staff.</p>";
				echo "</div>";
			}
			else if($row->finalStatus == 1)
			{
				echo "<div class=\"alert-message block-message error\">";
				echo "<p><strong>Suggestion is in Final Status.</strong> This suggestion is in final status and is visible to staff.</p>";
				echo "</div>";
			}
		}
	}
?>


	
    		

</div>
</div>

<div class="row">
<div class="span8 offset4">

	<div class="input_table_buttons_container">
		<?php echo anchor('main', 'Back to Suggestion Listing', 'class="button"'); ?>
	</div>

	<br />
	<hr />

	<h2>Suggestion:</h2>

	<p class="page_title" title="suggestions"></p>


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
		  		<!-- <legend>Suggestion Information:</legend> -->
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
		            <label for="disabledInput">Original Suggestion:</label>
		            <div class="input">
		              <textarea class="xxlarge" name="textarea" id="textarea" rows="10"><?php echo $row->suggestion; ?></textarea>
		            </div>
		          	</div><!-- /clearfix -->
		        </fieldset> 
				</form>

				<?php echo form_open('main/save_edited_suggestion'); ?>
				<fieldset>
					<input type="hidden" name="suggestionId" id="suggestionId" value="<?php echo( $this->uri->segment(3) ); ?>" />
  					
				       	<div class="clearfix">
						<label for="textarea">Edited Suggestion</label>
						<div class="input">
							<textarea class="xxlarge" id="editedSuggestion" name="editedSuggestion" rows="10"><?php echo $row->editedSuggestion; ?></textarea>
						  		<span class="help-block">
									This edited suggestion will be visible to staff once status is finalized.
						  		</span>
							</div>
					  	</div><!-- /clearfix -->
					<div class="actions">
				    	<input type="submit" class="btn primary" name="action" value="Save Edit">&nbsp;
				    	<button type="submit" class="btn" name="action" value="Cancel">Cancel</button>
				   	</div>
			   	</fieldset> 
			    </form>

			<?php 
				}
			}
			?>

			    <br /><br />
			    <hr />

				<div class="row">
					<div class="span12">
						<h2>Management Notes:</h2>
						<table class="zebra-striped">
							<tr>
								<th width="50">Id</th>
								<!-- <th width="100">Suggestion Id</th> -->
								<th width="200">Submitter</th>
								<th width="200">Timestamp</th>
								<th width="400">Management Note</th>
							</tr>

				<?php

				if(isset($comments))
				{
					foreach($comments->result() as $row)
					{
						echo "<tr>";
						$uri_seg = "comments/view_single_comment/" . $row->id;
						echo "<td>";
						echo anchor($uri_seg, $row->id);
						echo "</td>";
						echo "<td>" . $row->staffName . "</td>";
						//echo "<td>" . $row->suggestionId . "</td>";
						//echo "<td>" . $row->staffName . "</td>";
						echo "<td>" . $row->timestamp . "</td>";
						//trucate comment
						$shortComment = $this->customlibraries->myTruncate($row->comment, 30, " ");
						echo "<td>" . $shortComment . "</td>";
						echo "</tr>";
					}
				}

				?>
				</table>
				</div> <!-- span -->
				</div> <!-- row -->

				<?php
					$uri_seg = "comments/add_comment" . "/" . $suggestionIdLocal;
					echo anchor($uri_seg, 'Add Management Note', 'class="btn"');
					echo "<br><br>";
				?>

				<br /><br />
				<hr />

			<?php
				if(isset($query))
				{
					foreach($query->result() as $row)
					{
						$suggestionIdLocal = $row->id;
			?>

	          	<?php echo form_open('main/save_mgmt_decision'); ?>
	          	<h2>Management Decision:</h2>
				<fieldset>
					<input type="hidden" name="suggestionId" id="suggestionId" value="<?php echo( $this->uri->segment(3) ); ?>" />
				       	<div class="clearfix">
						<label for="textarea">Management Decision</label>
						<div class="input">
							<textarea class="xxlarge" id="mgmtDecision" name="mgmtDecision" rows="10"><?php echo $row->mgmtDecision; ?></textarea>
						  		<span class="help-block">
						  		</span>
							</div>
					  	</div><!-- /clearfix -->
					<div class="actions">
				    	<input type="submit" class="btn primary" name="action" value="Save Decision">&nbsp;
				    	<button type="submit" class="btn" name="action" value="Cancel">Cancel</button>
				   	</div>
			   	</fieldset> 
			    </form>

			    
			
			<?php 
				}
			}
			?>

	<div class="row">
		<div class="span 8 offset 4">

		<div class="alert-message block-message info">
	    	<a class="close" href="#"></a>
	    	<p><strong>Set Status of Suggestion</strong></p>
	    	<div class="alert-actions">
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




