<?php ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title></title>

	<!-- Le javascript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
	<link rel="stylesheet/less" href="<?php echo base_url(); ?>less/bootstrap.less">
	<script src="<?php echo base_url(); ?>js/less.js" type="text/javascript"></script>

</head>
<body>
	<div id="wrapper">	

		<div class="row">
		<div class="span16 offset2">

		<br /><br /><br /><br /><br /><br /><br /><br /><br />

		<div class="modal" style="position: relative; top: auto; left: auto; margin: 0 auto; z-index: 1">
        	<div class="modal-header">
            	<h2>NVDPL Suggestions - Please Log In:</h2>
            	<!-- <a href="#" class="close">&times;</a> -->
          	</div>
          	<div class="modal-body">

          	<?php echo form_open('login/validate'); ?>
				<label for="userFirstName">NVDPL Email Address:</label>
				<div class="input">
					<input name="emailAddress" id="emailAddress" size="30" type="text" />
				</div>

				<br /><br />
					  	
				<label for="userLastName">Password:</label>
				<div class="input">
					<input name="password" id="password"  size="30" type="password" />
				</div>

				<br />
	

			  	<div class="modal-footer">
						<input type="submit" class="btn primary" value="Log Me In">
      			</div>
          	</div>
        </div>

		<?php echo form_close(); ?>

		</div>
	</div>
</div> <!-- login_form -->

	</div>
	</div>

	</div> <!-- wrapper -->
</body>
</html>