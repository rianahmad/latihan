<html>

	<head>
	<script src="<?php echo base_url()."../asset/js/"?>jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#pilih_status').live('change', function(){
					if( $(this).val() == 'aktif' )
					{
						$('#status_aktif').show();
						$('#status_nonaktif').hide();
					}
					else if( $(this).val() == 'non_aktif' )
					{
						$('#status_nonaktif').show();
						$('#status_aktif').hide();
					}
					else if( $(this).val() == '' )
					{
						$('#status_aktif').hide();
						$('#status_nonaktif').hide();
					}
				});

				//attr untuk disabled 
				//removeattr untuk aktif
			
				$('#id_ktp_aktif').live('click', function(){
					$('#aktifkan_mhs').attr('disabled', 'disabled');
					$('#aktifkan_ktp').removeAttr('disabled').focus();
				});
				$('#id_mahasiswa_aktif').live('click', function(){
					$('#aktifkan_ktp').attr('disabled', 'disabled');
					$('#aktifkan_mhs').removeAttr('disabled').focus();
				});
			});
		</script>
		
	</head>

	
	<body>
	
			  <button id="aktif_rian">aktif</button>
			  <button id="non_rian">non aktif</button>

			<input id="formrian" type="text" value="rian">
			<input id="formahmad" type="text" value="ahmad">
			
			
		
<script type="text/javascript">
   
	$(document).ready(function(){
		$('#formrian').hide();
		$('#formahmad').hide();
			
			$("#aktif_rian").click(function(){
				$('#formrian').show();
				$('#formahmad').show();
			});
			$("#non_rian").click(function(){
				$('#formrian').hide();
				$('#formahmad').hide();
			});
	});
	</script>
	
	
	
	
	<div class="control-group" id="status_combobox">
		<label class="control-label" for="nomor">Pilih Status</label>
		<div class="controls">
			<select id="pilih_status" name="pilih_status">
				<option value=""></option>
				<option value="aktif">buat baru</option>
				<option value="non_aktif">Perpanjang</option>
			</select>
		</div>
	</div>
	
	
	<!-- aktif -->
	<div class="control-group" id="status_aktif" style="display:none;">
		<div class="controls">
			<label class="control-label" for="nomor">
				<input type="radio" name="id_ktp_aktif" id="id_ktp_aktif" value="Id KTP">
					Id KTP
					<input type="text" name="id_ktp" id="aktifkan_ktp">
			</label>
			<label class="control-label" for="nomor">
				<input type="radio" name="id_mahasiswa_aktif" id="id_mahasiswa_aktif" value="Id MHS">
					Id MHS
					<input type="text" name="id_mhs" id="aktifkan_mhs">
			</label>
		</div>
	</div>
	
	<!-- non aktif -->
	<div id="status_nonaktif" style="display:none;">
		<div class="control-group">
			<label class="control-label" for="nomor">Masukan Nomer Sim</label>
			<div class="controls">
				<input type="text" name="no_sim">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nomor">Masukan Jenis Motor</label>
			<div class="controls">
				<input type="text" name="jenis_motor">
			</div>
		</div>
	</div>
	
		
		
		
		<div class="btn-group btn-toggle"> 
			<button id="hidup" class="btn btn-default">ON</button>
			<button id="mati" class="btn btn-primary active">OFF</button>
		</div>
					<label><====  NILAI DEFAULT DATABASE ===== > </label>
                     
					<label>Off Margin</label>
                            <div class="input-append">
                                <input readonly="readonly" class="input-mini" id="of_margin" name="of_margin" type="text" value="">
                                <span class="add-on">%</span>
                            </div>
                             <label>DP</label>
                            <div class="input-append">
                                <input readonly="readonly" class="input-mini" id="dp" name="dp" type="text" value="">
                                <span class="add-on">%</span>
                            </div>
                              <label>Bunga</label>
                            <div class="input-append">
                                <input readonly="readonly" class="input-mini" id="bunga" name="bunga" type="text" value="">
                                <span class="add-on">%</span>
                            </div>
                             <label>Asuransi</label>
                            <div class="input-append">
                                <input readonly="readonly" class="input-mini" id="finance" name="finance" type="text" value="">
                                <span class="add-on">%</span>
                            </div>
							<label>Hasil</label>
							<div class="input-append">
								<input readonly="readonly" class="input-mini" id="hasil_tambah" name="hasil_tambah" type="text" value="">
								<span class="add-on">%</span>
							</div>
							
					
	<script type="text/javascript">
   
	$(document).ready(function(){
		$("#hidup").click(function(){
		  
				$("#of_margin").removeAttr('readonly');
				 $("#dp").removeAttr('readonly');
				  $("#bunga").removeAttr('readonly');
				   $("#finance").removeAttr('readonly');
		});
		$("#mati").click(function(){
				$("#of_margin").attr('readonly', 'readonly');
				 $("#dp").attr('readonly', 'readonly');
				  $("#bunga").attr('readonly', 'readonly');
				   $("#finance").attr('readonly', 'readonly');
		});
		
	});
	</script>		
							
							
							
	</body>



</html>