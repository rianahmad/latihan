	
	<SCRIPT type="text/javascript">
		$(document).ready(function(){
			$("#spanNama").hide();
			$("#spanHobby").hide();
			
			// $("#nama").focus();
			
			$("#nama").blur(function(){
				validasiNama();
			});
			
			$("#hobby").blur(function(){
				validasiHobby();
			});
			
			$("#formulir").submit(function(){
				if(!validasiNama())
					return false;
				if(!validasiHobby())
					return false;
			});
		});
		
		function validasiNama(){
			if($.trim($("#nama").val()) == "" ){
				$("#spanNama").show();
				return false;
			}else{
				$("#spanNama").hide();
				return true;
			}
		}
		function validasiHobby(){
			if($.trim($("#hobby").val()) == "" ){
				$("#spanHobby").show();
				return false;
			}else{
				$("#spanHobby").hide();
				return true;
			}
		}
	</script>
	<div id="content">
		
		<form id="formulir" action="web/mtk" method="post">
			<p>
				<label>Nama : </label>
				<input type="text" name="nama" id="nama" value="">
				<span id="spanNama">Nama Tidak Boleh Kosong</span>
			</p>
			<p>
				<label>Hobby : </label>
				<input type="text" name="hobby" id="hobby" value="">
				<span id="spanHobby">Hobby Tidak Boleh Kosong</span>
			</p>
			<p>
				<input type="submit" id="kirim" value="kirim">
			</p>
		</form>
		
	</div>
	