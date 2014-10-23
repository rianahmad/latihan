<html>
    <head>
    <script src="<?php echo base_url()."../asset/jcrop/"?>js/jquery.min.js"></script>
    <script src="<?php echo base_url()."../asset/jcrop/"?>js/jquery.Jcrop.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()."../asset/jcrop/"?>css/jquery.Jcrop.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url()."../asset/jcrop/"?>css/demos.css" type="text/css" />
 
    <script language="Javascript">
 
      $(function(){
        var jcrop_api;
        
        $('#cropbox').Jcrop({
          aspectRatio: 1,
          onSelect: updateCoords,
          setSelect: [ 0, 0, 15, 15 ]
        },function(){
          jcrop_api = this;
        });
        
        jcrop_api.setOptions({ 
          bgFade: true,
          bgOpacity: 0.4
        });
      });
 
      function updateCoords(c)
      {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
      };
 
      function checkCoords()
      {
        if (parseInt($('#w').val())) return true;
        alert('Please select a crop region then press submit.');
        return false;
      };
 
    </script>
 
  </head>
 
  <body>
 
  <div id="outer">
  <div class="jcExample">
  <div class="article">
 
    <h1>Jcrop - Crop Behavior</h1>
 
    <?php
		IF($action == "upload"){
	?>
		<form action="<?php echo base_url()."upload/simpan";?>" method="post" enctype="multipart/form-data">
			<input type="file" name="gambar_crop"><br>
			 <input type="submit" value="Crop" />
		</form>
	 
	<?php
		}IF($action == "croping"){
	?>	
	 
		<form action="<?php echo base_url()."upload/do_crop";?>" method="post" onsubmit="return checkCoords();">
			<input type="hidden" value="<?php echo "../asset/jcrop/lain/".$nama?>" name="uri">
			<input type="hidden" value="<?php echo $nama;?>" name="nama">
		  <img src="<?php echo base_url()."../asset/jcrop/lain/".$nama?>" id="cropbox" />
		  <input type="hidden" id="x" name="x" />
		  <input type="hidden" id="y" name="y" />
		  <input type="hidden" id="w" name="w" />
		  <input type="hidden" id="h" name="h" />
		  <input type="submit" value="Simpan Crop" />
		</form>
	<?php
		}
	?>

  </div>
  </div>
  </div>
  </body>
 
</html>