<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title></title>

	<!-- Le javascript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script>
		$(document).ready(function() {
			var title = $(".page_title").attr("title");
			//first remove all the classes
			$('#admin_nav ul.tabs li').removeClass('active');
			//then re-add the active class for the tab we want
			$('#admin_nav ul.tabs li#' + title).addClass('active');
		});

	</script>

	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css">

</head>
<body>

	

	<div id="wrapper">
		<div id="topbar">
			<?php $this->load->view('common/topbar'); ?>
		</div>
		<br /><br /><br />
		<div id="adminnav">
			<?php $this->load->view('common/admin_nav'); ?>
		</div>