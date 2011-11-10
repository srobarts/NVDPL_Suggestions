

		<div class="row">
			<div class="span16 offset2">

				<p class="page_title" title="suggestions"></p>
				<h2>Manage Suggestions</h2>


				<table class="zebra-striped">
					<tr>
						<th width="100">Number</th>
						<th width="200">Submitter</th>
						<th width="200">Date Submitted</th>
						<th width="400">Suggestion</th>
					</tr>

				<?php

				if(isset($query))
				{
					foreach($query->result() as $row)
					{
						echo "<tr>";
						$uri_seg = "main/edit_suggestion/" . $row->id;
						echo "<td>" . $row->id . "</td>";
						echo "<td>";
						echo anchor($uri_seg, $row->staffFirstName . " " . $row->staffLastName);
						echo "</td>";
						echo "<td></td>";
						echo "<td>" . $row->suggestion . "</td>";
						echo "</tr>";
					}
				}

				?>
				</table>
			</div> <!-- span -->
		</div> <!-- row -->





