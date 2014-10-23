
	<script type="text/javascript">
		$(document).ready(function(){
			$("#lihat").click(function (){
		    	$('#lihat').html('<center><img src="<?php echo base_url()."../asset/loadmore/berita/"?>/loading.gif" /></center>');
				$.ajax({
					url: "<?php echo base_url().'loadmore/getLoad/'?>" + $(".baris:last").attr("kode"),
					success: function(html){
						if(html){
							$("#content").append(html);
							$('#lihat').html('<center>Lihat Berita Terdahulu</center>');
						}else{
							$('#lihat').replaceWith('<div id="lihat"><center>Tidak Ada Berita</center></div>');
						}
					}
				});
		    });
		});
	</script>

	<style>
		body{
		margin:40px;
		font-family:Arial;
		font-size:12px;
		}
		#content{
		margin:0px auto;
		width:500px;
		padding:10px;
		border:1px dashed #666666;
		}
		.baris{
		padding:10px;
		border-bottom:1px dashed #666666;
		}
		.img{
		padding:2px;
		border:1px solid #666666;
		float:left;
		width:60px;
		margin:5px;
		}
		#lihat{
		margin:0px auto;
		padding:10px;
		border:1px dashed #666666;
		background-color:#FF9900;
		cursor:pointer;
		width:500px;
		}
		.date {
			font-size: 10px;
			line-height: 135%;
			font-style: italic;
		}
	</style>
	
	<div id="content">
		<?php
			
			// while($r = mysql_fetch_array($hasil)) {
				// $isi = strip_tags(substr($r['isi_berita'],0,300));
				// echo '<div class="baris" kode="'.$r['id_berita'].'"><b>'.$r['judul'].'</b><br>
				// <span class=date>'.$r['hari'].', '.$r['tanggal'].' - '.$r['jam'].' WIB</span><br>
				// <img src="berita/small_'.$r['gambar'].'" class="img">
				// '.$isi.'.... <b>[Baca Selengkapnya]</b><br>
				// </div>';
			// }
			
			FOREACH($allDataBerita as $berita){
				$isi = strip_tags(substr($berita['isi_berita'],0,300));
		?>
			<div class="baris" kode="<?php echo $berita['id_berita']?>">
				<b><?php echo $berita['judul']?></b> <br>
				<span class="date"><?php echo $berita['hari'].",".$berita['tanggal'].$berita['jam']?> WIB </span> <br>
				<img src="<?php echo base_url()."../asset/loadmore/berita/small_".$berita['gambar']?>" class="img">
				
				<?php echo $isi?>.... <b>[Baca Selengkapnya]</b><br>
			</div>
		<?php
			}
		?>
	</div>
	<div style="display:none;"><center><img src="<?php echo base_url()."../asset/loadmore/berita/"?>loading.gif" /></center></div>
	<br/>
	<div id="lihat"><center>Lihat Berita Terdahulu</center></div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	