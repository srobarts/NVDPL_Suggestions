

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
		              		<span class="uneditable-input"><?php echo $row->staffFirstName . " " . $row->staffLastName; ?></span>
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
		              <textarea class="xxlarge" name="textarea" id="textarea" rows="3" disabled>
		              		<?php echo $row->suggestion; ?>
		              </textarea>
		            </div>
		          </div><!-- /clearfix -->
			</fieldset>
			</form>
	<?php 
		}
	}
	?>

	<?php
		$uri_seg = "comments/add_comment" . "/" . $suggestionIdLocal;
		echo anchor($uri_seg, 'Add Comment/Note', 'class="btn"');
		echo "<br><br>";
	?>

	<div class="row">
		<div class="span16">
			<h2>Existing Comments:</h2>
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

	
       	
</div>
</div>




