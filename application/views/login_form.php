<?php ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title></title>

	<!-- Le javascript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script></script>

	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css">
</head>
<body>
	<div id="wrapper">	

		<br /><br /><br /><br /><br /><br />

		<div class="modal" style="position: relative; top: auto; left: auto; margin: 0 auto; z-index: 1">
        	<div class="modal-header">
            	<h2>Please Log In:</h2>
            	<!-- <a href="#" class="close">&times;</a> -->
          	</div>
          	<div class="modal-body">

          	<?php echo form_open('login/validate'); ?>
          		<fieldset>
						<div class="clearfix">
							<label for="userFirstName">NVDPL Email Address:</label>
							<div class="input">
								<input class="input" name="emailAddress" id="emailAddress" size="30" type="text" />
							</div>
					  	</div><!-- /clearfix -->
						<div class="clearfix">
							<label for="userLastName">Password:</label>
							<div class="input">
								<input class="input" id="password" name="password" size="30" type="password" />
							</div>
					  	</div><!-- /clearfix -->
				</fieldset>

			  	<div class="modal-footer">
						<input type="submit" class="btn primary" value="Log Me In">
      			</div>
          	</div>
        </div>

		<?php echo form_close(); ?>

		</div>
	</div>
</div> <!-- login_form -->

	</div> <!-- wrapper -->
</body>
</html>