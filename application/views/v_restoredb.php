
	<form action="<?php echo base_url()."restore_db/restore"?>" METHOD="POST" enctype="multipart/form-data">
		<input type="file" name="restore_db"><br>
		<input type="submit" value="restore" onclick="return confirm('Apakah Anda yakin akan restore database?')" name="restore">
	</form>