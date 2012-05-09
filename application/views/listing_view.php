

		<div class="row">
			<div class="span16 offset2">

				<p class="page_title" title="suggestions"></p>
				<h2>Manage Suggestions</h2>

				<table class="zebra-striped" id="sortTableExample">
					<thead>
						<tr>
							<th width="20">#</th>
							<th width="200">Submitter</th>
							<th width="200">Date Submitted</th>
							<th width="500">Suggestion</th>
							<th width="120">Status</th>
						</tr>
					</thead>

				<?php

				if(isset($query))
				{
					echo "<tbody>";
					foreach($query->result() as $row)
					{
						echo "<tr>";
						$uri_seg = "main/edit_suggestion/" . $row->id;
						echo "<td>" . $row->id . "</td>";
						echo "<td>";
						echo anchor($uri_seg, $row->staffName);
						echo "</td>";
						echo "<td>" . $row->timestamp . "</td>";
						echo "<td>";
						//trucate suggestion
						$shortSuggestion = $this->customlibraries->myTruncate($row->suggestion, 30, " ");
						echo $shortSuggestion;
						echo "</td>";
						echo "<td>";
							if($row->finalStatus == TRUE) {
								//suggestion is finalized
								echo "<span class=\"label important\">FINAL</span>";
								echo " ";
							}
							if($row->respondStatus == FALSE) {
								//show not responded icon
								echo "<span class=\"label warning\">NOT RESP</span>";
							}
						echo "</td>";
						echo "</tr>";
					}
					echo "</tbody>";
				}

				?>
				</table>

	
			</div> <!-- span -->
		</div> <!-- row -->





