<html>
<head>
		<script src="<?php echo base_url()."../" ?>asset/js/jquery.js"></script>
        <script src="<?php echo base_url()."../" ?>asset/js/jquery-1.7.2.min.js"></script>
</head>
<body>
<a href="<?php echo base_url()."menu/delete"?>" id="hapusdb">Hapus</a>

	<form action="<?php echo base_url()."menu/saveMenu"?>" METHOD="POST">
		
		<br>
		<Select name="cabang">
			<option></option>
			<option value="primavera">Primavera</option>
			<option value="simpenen">Simpenan</option>
			<option value="garut">Griya</option>
		</select>
		<br>
		
		
		
		<span>Blok</span>
		<select name="blok[]" multiple>
			<option value="tambah">TAMBAH</option>
			<option value="update">UPDATE</option>
			<option value="delete">DELETE</option>
			<option value="view">VIEW</option>
		</select>
		<br>
		<span>Galeri</span>
		<select name="galeri[]" multiple>
			<option value="tambah">TAMBAH</option>
			<option value="update">UPDATE</option>
			<option value="delete">DELETE</option>
			<option value="view">VIEW</option>
		</select>
		<br>
		<span>Kavling</span>
		<select name="kavling[]" multiple>
			<option value="tambah">TAMBAH</option>
			<option value="update">UPDATE</option>
			<option value="delete">DELETE</option>
			<option value="view">VIEW</option>
		</select>
		
		
		<BR>
		<input type="submit" value="save">
	</form>
	
	
	<?php
		if(!empty($menuAkses)){
			foreach($menuAkses as $key => $Akses){
	?>		
			<li><a href="<?php echo base_url().$cabang."/administrator/".$Akses['link_to']?>"><?php echo $Akses['menu']?></li>
	<?php
			}
		}
	?>
	<br>
	<br>
	<br>
	<?php
	if(!empty($menuTambah)){
		Foreach($menuTambah as $tambahKavling){
			IF($tambahKavling['menu'] == "kavling"){
	?>	
		<a href="<?php echo base_url()."tambah_kavling"?>">Tambah Kavling</a>
	<?php
			}
		}
	}
	?>
	
	<table border=1>
		<tr>
			<td style="text-align:center">Nama</td>
			<td style="text-align:center">Aksi</td>
		</tr>
		<?php
			foreach($dataRian as $rian){
		?>	
							<tr>
								<td><?php echo $rian['country_name']?></td>
								<td>
									<?php
									IF(!empty($menuUpdate)){
										foreach($menuUpdate as $update){
											IF($update['menu'] == "kavling"){
									?>		
									<a href="update">UPDATE</a> |
									<?php
											}
										}
									}
									?>
									<?php
									IF(!empty($menuDelete)){
										foreach($menuDelete as $delete){
											IF($delete['menu'] == "kavling"){
									?>		
									<a href="delete">DELETE</a>
									<?php
											}
										}
									}
									?>
								</td>
							</tr>
		<?php
			}
		?>
	</table>
	
	
</body>
</html>
	
	
	
	