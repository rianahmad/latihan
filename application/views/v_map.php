	
	<!--
	<form method="POST">
	<input type="text" name>
	-->
	
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
	<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
	
    <style>
		body { font-size: 75%; }
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		a{text-decoration:none;}
		{font-size:60%};
	</style>
	
	<script>
		$(function() {
		
			$( "#dialog:ui-dialog" ).dialog( "destroy" );
			
			$( "#dialog-confirm" ).dialog({
			autoOpen: false,
			resizable: false,
			height:180,
			modal: true,
			hide: 'Slide',
			buttons: {
				"Delete": function() {
						var del_id = {id : $("#del_id").val()};
						$.ajax({
							type: "POST",
							url : "<?php echo base_url().'map/delete'?>",
							data: del_id,
							success: function(msg){
								$('#show').html(msg);
								$('#dialog-confirm' ).dialog( "close" );
							}
						});

					},
					Cancel: function() {
						$( this ).dialog( "close" );
					}
				}
			});	
			
			
			$( "#form_input" ).dialog({	
			autoOpen: false,
			height: 300,
			width: 350,
			modal: false,
			hide: 'Slide',
			buttons: { 
				"add": function() {									// jika button add di klik buat nama variabel form_data yang berisi inputan post dan beri ajax dengan nilai 1 
					var form_data = {
						id_map: $('#id_map').val(),
						lat: $('#lat').val(),
						lang: $('#lang').val(),
						nama_lokasi: $('#nama_lokasi').val(),
						ajax:1 
				  	};
				  
  					$('#lat').attr("disabled",true);
					$('#lang').attr("disabled",true);
					$('#nama_lokasi').attr("disabled",true);

				  $.ajax({
					url : "<?php echo base_url().'map/submit'?>",	// kirim ke controller submit
					type : 'POST',									// dengan type data POST
					data : form_data,								// dengan data variabel form_data yang telah dibuat diatas == tunggu diproses controler ==
					success: function(msg){							// jika controler sudah proses buat variabel $('#show').html(msg), penjelsan show id html isi data dari controller 
						$('#show').html(msg),
						$('#lat').val(''),
						$('#id_map').val(''),
						$('#lang').val(''),
						$('#nama_lokasi').val(''),
						$('#lat').attr("disabled",false);
						$('#lang').attr("disabled",false);
						$('#nama_lokasi').attr("disabled",false);
						$( "#form_input" ).dialog( "close" )
					}
				  });
				
				},
				Cancel: function() {
					$('#id_map').val(''),
					$('#lat').val('');
					$('#lang').val('');
					$('#nama_lokasi').val('');
					$( this ).dialog( "close" );
				}
			},
				close: function() {
					$('#id_map').val(''),
					$('#lat').val('');
					$('#lang').val('');
					$('#nama_lokasi').val('');
				}
			});
			
			$( "#create-daily" )
			.button().click(function() { 							// jika create-daily atau input new di klik di jalankan funtion id = form input kemudian membuka dialog modal
				$( "#form_input" ).dialog( "open" );
			});
			
		});
		
		
		
		$(".delbutton").live("click",function(){
			var element = $(this);
			var del_id = element.attr("id");
			var info = 'id=' + del_id;
			$('#del_id').val(del_id);
			$( "#dialog-confirm" ).dialog( "open" );
			
			return false;
		});
		

		
	</script>
	<div id="show">
		<table>
				<tr >
					<th>No</th>
					<th>lat</th>
					<th>long</th>
					<th>nama lokasi</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php			
					$res = $this->db->query("SELECT * FROM t_map");
					if($res->num_rows() > 0);
					$allDataMap = $res->result('array'); 
					if(empty($allDataMap)){
						echo "data kosong";
					}else{
				
						$i=0;
						foreach ($allDataMap as $map){
							$i++;
				?>
				<tr class="record">
					<td><?php echo $i;?></td>
					<td><?php echo $map['lat']?></td>
					<td><?php echo $map['long']?></td>
					<td><?php echo $map['nama_lokasi']?></td>
					<td><a href="#" class="edit" id="<?php echo $map['id_map']?>" date="<?php echo $map['lat']?>" name="<?php echo $map['long']?>" amount="<?php echo $map['nama_lokasi']?>">Edit</a></td>
					<td><a href="#" class="delbutton" id="<?php echo $map['id_map']?>">Delete</a></td>
				</tr>
				<?php
						}
					}
				?>
		</table>
	</div>
	
	
		<p>
			<button id="create-daily">Input New</button>
		</p>
	
	<div id="form_input" title="Input / Edit Data">
	  <table>
		
		<input type="hidden" value='' id="id_map" name="id_map">
		
		<tr >
			<td>Latitude</td>
			<td><input type="text" name="lat" id="lat"></td>
		</tr>
		<tr >
			<td>Logtitude</td>
			<td><input type="text" name="lang" id="lang"></td>
		</tr>
		<tr >
			<td>Nama Lokasi</td>
			<td><input type="text" name="nama_lokasi" id="nama_lokasi"></td>
		</tr>
	  </table>
	</div>
	
	<div id="dialog-confirm" title="Delete Item ?"> 
		<p>
			<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
			<input type="hidden" value='' id="del_id" name="del_id">Are you sure?
		</p> 
	</div> 
	
	
	
	
	
	
	
	
	<!-- MAP -->
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<div id="map_div" style="width: 400px; height: 300px"></div>
	<script type="text/javascript">
		  google.load("visualization", "1", {packages:["map"]});
		  google.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
				
					['Lat', 'Long', 'Name'],
				<?php
				
				
				//*** database masih nagaco, set dlu
				
				$res = $this->db->query("SELECT * FROM t_map");
								if($res->num_rows() > 0);
								$allDataMap = $res->result('array'); 
								
					foreach($allDataMap as $map){
				?>          
					[<?php echo $map['lat'].",".$map['long'].",'".$map['nama_lokasi']."'"?>],
				<?php
					}
				?>

			]);

			var map = new google.visualization.Map(document.getElementById('map_div'));
			map.draw(data, {showTip: true});
		  }
	</script>
	
	
	