<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Upload extends CI_Controller {
 
    public function index()
  {
    # panggil view crop
   
	$data = array(
		'action' => 'upload'
	);

	$this->load->view('crop', $data);
  }
  
  public function simpan() {
		$image = $_FILES['gambar_crop']['name'];
	
			$config['upload_path'] = './asset/jcrop/lain';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '200000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;			
			$config['file_name'] = time().$_FILES['gambar_crop']['name'];
			$this->load->library('upload', $config);
			
			$this->upload->do_upload('gambar_crop');
			
			$data = array(
				'action' 	=> 'croping',
				'nama'		=> $config['file_name']
			);
		
		$this->load->view('crop', $data);
	}
  
  public function do_crop() {
	
	$post = $_POST;
	// pre($post);Exit;
	
    # ambil width crop
    $targ_w = $_POST['w'];
    # abmil heigth crop
    $targ_h = $_POST['h'];
    # rasio gambar crop
    $jpeg_quality = 90;
 
    # folder tempat gambar yang mau di crop
    $src = APPPATH . $post['uri'];
    
    # inisial handle copy gambar
    $img_r = imagecreatefromjpeg($src);
    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
    
    # simpan hasil croping pada folder lain
    // $path_img_crop = realpath(APPPATH . '../images/result');
    $path_img_crop = realpath(APPPATH . '../asset/jcrop/lain');
    # nama gambar yg di crop
    $img_name_crop = "crop".$post['nama'];

    # proses copy
    imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
    
    # buat gambar
    imagejpeg($dst_r,$path_img_crop .'/'. $img_name_crop,$jpeg_quality);
	
	echo "asli <img src='".base_url()."../asset/jcrop/lain/".$post['nama']."' style='width:200px; height:200px;'>";
	echo "<br>";
	echo "hasil crop<img src='".base_url()."../asset/jcrop/lain/crop".$post['nama']."'>";
	
	
  }
}
 
/* End of file upload.php */
/* Location: ./application/controllers/upload.php */