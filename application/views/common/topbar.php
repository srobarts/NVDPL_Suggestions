

<div class="topbar-wrapper" style="z-index: 5;">
    <div class="topbar">
      <div class="fill">
        <div class="container">
          <h3><a href="#">NVDPL Suggestions</a></h3>
          		<ul>
					<?php
						$staffName = $this->session->userdata('staffName');
						if(!isset($staffName) || $staffName == "")
						{  //user is not logged in
							echo "<li><a href=\"" . base_url() . "index.php/login/login\">Login</a></li>";
						} else {
							echo "<li><a href=\"" . base_url() . "index.php/login/logout\">Logout (" . $staffName . ")</a></li>";
						}
					?>
				</ul>
        </div>
      </div><!-- /fill -->
    </div><!-- /topbar -->
  </div><!-- /topbar-wrapper -->
 
