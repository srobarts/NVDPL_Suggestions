		<div class="row">
			<div class="span16 offset2">

				<p class="page_title" title="users"></p>
				<h2>Manage Users</h2>
				
				<?php
					if( ($this->session->userdata('staffName') == 'Administrator') )
					{
						//add user
						$uri_seg = "users/add_user" . "/" . 1;
						echo anchor($uri_seg, 'Add User', 'class="btn"');
						echo "<br><br>";
					}
				?>


				<table class="zebra-striped">
					<tr>
						<th width="200">Staff Name</th>
						<th width="400">Staff Email</th>
					</tr>

				<?php

				if(isset($query))
				{
					foreach($query->result() as $row)
					{
						echo "<tr>";
						$uri_seg = "players/edit_player/" . $row->id;
						echo "<td>";
						echo ($row->staffName);
						echo "</td>";
						echo "<td>" . $row->staffEmail . "</td>";
						echo "</tr>";
					}
				}

				?>
				</table>
			</div> <!-- span -->
		</div> <!-- row -->