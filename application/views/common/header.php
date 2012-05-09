<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title></title>

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le javascript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
    <!-- <link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css"> -->
	<link rel="stylesheet/less" href="<?php echo base_url(); ?>less/bootstrap.less">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/less.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.tablesorter.js"></script>

	
	<script>
		$(document).ready(function() {
			var title = $(".page_title").attr("title");
			//first remove all the classes
			$('#admin_nav ul.tabs li').removeClass('active');
			//then re-add the active class for the tab we want
			$('#admin_nav ul.tabs li#' + title).addClass('active');
			//sort table
			$("table#sortTableExample").trigger("update");
			$('table#sortTableExample:has(tbody tr)').tablesorter({
				sortList: [[0,1]]
			});
		});
	</script>
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