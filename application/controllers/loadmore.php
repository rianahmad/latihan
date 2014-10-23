<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class loadmore extends CI_Controller {
	
	public function __construct(){
	
		parent::__construct();
		$this->load->model('main_model');
	}
	 
	public function index()
	{
		
		$data = array(
			'allDataBerita' => $this->main_model->getBerita(),
			'title' => 'Load More'
		);
		// pre($data);exit;
		
		$this->load->view('include/header', $data);
		$this->load->view('v_loadmore');
		$this->load->view('include/footer');
	}
	
	public function getLoad(){
		
		$id = $this->uri->segment(3);
		// pre($id);exit;
		if($id){
			$query = 'SELECT * FROM berita WHERE id_berita < "'.$id.'" ORDER BY id_berita DESC LIMIT 0,5';
			$hasil = mysql_query($query);
				while($r = mysql_fetch_array($hasil)) {
					$isi = strip_tags(substr($r['isi_berita'],0,300));
					echo '<div class="baris" kode="'.$r['id_berita'].'"><b>'.$r['judul'].'</b><br>
					<span class=date>'.$r['hari'].', '.$r['tanggal'].' - '.$r['jam'].' WIB</span><br>
					<img src="http://localhost/latihan/asset/loadmore/berita/small_'.$r['gambar'].'" class="img">
					'.$isi.'.... <b>[Baca Selengkapnya]</b><br>
					</div>';
				}
		}
		
	}
	
	
}
