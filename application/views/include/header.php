<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title?></title>

		<style type="text/css">
			#header ul{
				// text-decoration:none;
				// list-style-type:none;
			}
			ul a{
				text-decoration:underline;
				list-style-type:none;
				color:red;
			}
			ul a:hover{
				text-decoration:none;
				list-style-type:none;
				color:red;
			}
			a{
				text-decoration:none;
				list-style-type:none;
				color:red;
			}
			a:hover{
				text-decoration:none;
				list-style-type:none;
			}
		</style>
		
		<script src="<?php echo base_url()."../asset/js/"?>jquery.js" type="text/javascript"></script>  
		<script src="<?php echo base_url()."../asset/js/"?>jquery-1.7.2.min.js" type="text/javascript"></script>  


		
	</head>
	<body>

	<?php
		// pre($_SERVER);exit;
		$ip = $_SERVER['REMOTE_ADDR'];
		ECHO $ip;
	?>
	
	
		<div id="container">
			<div id="header">
				<ul>
					<li><a href="<?php echo base_url()."web/mtk"?>">mtk</a></li>
					<li><a href="<?php echo base_url()."web/validasi_span"?>">validasi span</a></li>
					<li><a href="<?php echo base_url()."web/show"?>">Show Hide</a></li>
					<li><a href="<?php echo base_url()."combobox"?>">combobox bertingkat</a></li>
					<li><a href="<?php echo base_url()."upload"?>">jcrop</a></li>
					<li><a href="<?php echo base_url()."backup_db"?>">backup db</a></li>
					<li><a href="<?php echo base_url()."restore_db"?>">Restore db</a></li>
					<li><a href="<?php echo base_url()."map"?>">Map</a></li>
					<li><a href="<?php echo base_url()."loadmore"?>">Load More</a></li>
					<li><a href="<?php echo base_url()."autocomplete"?>">Auto Complete</a></li>
				</ul>
			</div>