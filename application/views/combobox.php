<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Combobox dinamis</title>
        <script src="<?php echo base_url()."../" ?>asset/js/jquery.js"></script>
        <script src="<?php echo base_url()."../" ?>asset/js/jquery-1.7.2.min.js"></script>
    </head>
    <body>
        <form action="" method="post">
	    <table>
	        <tr>
		    <td>Negara</td>
		    <td>
                        <select name="negara" id="negara">
			    <option value="">Pilih Negara</option>
			    <?php
			        foreach ($negara->result() as $row)
				    echo "<option value='".$row->country_id."'>".$row->country_name."</option>";
			    ?>
			</select>
                    </td>
		</tr>
		<tr>
		    <td>Provinsi</td>
		    <td>
		        <select name="provinsi" id="provinsi">
			    <option value="">Pilih Provinsi</option>
 			</select>
		    </td>
		</tr>
		<tr>
		    <td>Kota</td>
		    <td>
		        <select name="kota" id="kota">
			    <option value="">Pilih Kota / Kabupaten</option>
			</select>
		    </td>
		</tr>
	    </table>
        </form>
        <script language="javascript">
	    $(document).ready(function(){		
		$('#negara').change(function(){
		    $.post("<?php echo base_url();?>combobox/get_state/"+$('#negara').val(),{},function(obj){
		        $('#provinsi').html(obj);
		    });
		});
		$('#provinsi').change(function(){
		    $.post("<?php echo base_url();?>combobox/get_city/"+$('#provinsi').val(),{},function(obj){
			$('#kota').html(obj);
		    });
	        });
	    });
        </script>
    </body>
</html>