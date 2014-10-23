	
	
	
	<div id="content">
	
		<form id="form_rent_car" class="form-horizontal" method="POST" action="<?php echo base_url()."web/saveimage"?>" name="form" enctype="multipart/form-data">	
			<table>
			<?php
				FOR($i=0;$i<10;$i++){
			?>	
				<tr>
					<td>value <?php echo $i+1?></td>
					<td></td>
					<td><input name="<?php echo $i?>" type="file"></td>
				</tr>
			<?php
				}
			?>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" value="save"></td>
				</tr><br>
				<tr>
					<td>value 1</td>
					<td></td>
					<td><input id="val_1" name="val_1" type="text" value=""></td>
				</tr>
				<tr>
					<td>value 2</td>
					<td></td>
					<td><input id="val_2" name="val_2" type="text" value=""></td>
				</tr>
				<tr>
					<td>value 3</td>
					<td></td>
					<td><input id="val_3" name="val_3" type="text" value=""></td>
				</tr>
				<tr>
					<td><input type="button" id="tes2" value="Hitung"></td>
					<td></td>
					<td><input name="total" type="text" value=""></td>
					<!--  ::PROSES KE CONTROLER::
					<td><input type="button" id="hitung" value="Hitung"></td>
					<td></td>
					<td><input id="rent_lunas" name="rent_lunas" type="text" value=""></td>
					-->		
				</tr>
			</table>
		</form>
		
	</div>
	
    <input type="hidden" id="base_url" name="base_url" value="<?php echo base_url(); ?>">
	
	<script type="text/javascript">
			function cek(){
				if(form.val_1.value == "" || form.val_2.value == "" || form.val_3.value == ""){
				alert("data kosong"); //jika angka kosong maka pesan akan tampil
				exit;
				}
			}
			$('#tes2').click(function(){
					cek(); //panggil function cek
					a=eval(form.val_1.value); //mengisi variabel a dengan isi dari input name angka1
					b=eval(form.val_2.value); //mengisi variabel b dengan isi dari input name angka2
					c=eval(form.val_3.value); //mengisi variabel b dengan isi dari input name angka2
					d=a+b+c //menjumlahkan kedua variabel
					form.total.value = d; //memberikan hasil penjumlahan ke input name total
			});
		
		/**** PROSES KE CONTROLER
		$(document).ready(function(){		
            base_url = $('#base_url').val();
			
    		function input_money(nominal){

				var exp = nominal.split('.');
				var value = nominal;
				var value_asli = value;

				if(parseInt(exp[1]) > 0 )
				{
					cents = exp[1];
					value = exp[0].replace(/[^0-9-]/g, '') + '.' + cents;
				}
				else
				{
					value = exp[0].replace(/[^0-9-]/g, '');
				}
				return value;
    		}

			val_1 	= $('#val_1'); // terima data dari input type dibentuk var val_1
			val_2 	= $('#val_2');
			val_3 	= $('#val_3');
			
    		col_lunas 		= $('#rent_lunas');

    		$('#hitung').click(function(){
				nilai_1	 	= input_money(val_1.val()); //ambil variabel data val_1 buat variebel baru nilai_1
				nilai_2 	= input_money(val_2.val());
				nilai_3		= input_money(val_3.val());

				$.post(base_url+'web/hitung', { 
					val_1:nilai_1, // kirim data ke controler dengan nama variabel val_1
					val_2:nilai_2,
					val_3:nilai_3
				}, function(hasil){ // mengambil variabel data yang sudah dijumlahkan 
					col_lunas.val(hasil); //mengirim variabel hasil ke col_lunas
				});

    		});

    	});
		***/
	
	</script>
	
	
	