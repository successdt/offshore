<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8"/>
	<link rel="shortcut icon" href="<?php echo $this->Html->url('/img/favicon.ico') ?>" type="image/x-icon">
	<title>
		<?php echo isset($title_description) ? $title_description :  $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
	<?php echo $this->fetch('meta'); ?>
	
	<?php echo $this->Html->css(array('bootstrap', 'admin'), 'stylesheet') ?>
	<?php echo $this->fetch('css'); ?>
</head>

<body>
	<?php echo $this->element('Layouts/admin_menu'); ?>
	<div id="header" class="navbar">
		<div class="top-banner">
			<div class="logo">
			</div>
			<div class="top-links">
				<div class="btn-group">
					<a href="#" class="btn btn-success">Admin</a>
					<a href="#" class="btn btn-success">Logout</a>
				</div>
			</div>
		</div>
		
	</div><!-- // END HEADER -->
	
	<div id="content">
		<?php echo $this->fetch('content') ?>
	</div><!-- // END CONTENT -->

	<div id="footer">
		<div class="footer-inner">
			Copyright 2013. .......... All rights reserved.
		</div>
	</div><!-- // END FOOTER -->
	<div id="lightbox">
		<div class="loading">
		</div>
	</div>
	<!-- javascript
	================================================== -->
	<?php echo $this->Html->script(array(
		'live',
		'jquery.min',
		'bootstrap.min',
		'admin'
	)) ?>
	<?php echo $this->fetch('script'); ?>
	
	<?php echo $this->Html->scriptStart() ?>
		$(document).ready(function(){
			$('a').tooltip({});
		});
	<?php echo $this->Html->scriptEnd() ?>
</body>
</html>