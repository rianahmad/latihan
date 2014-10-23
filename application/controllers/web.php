<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class web extends CI_Controller {

	/**
	 * Index Page for this controller.
	
	 */
	 
	public function index()
	{
		$this->load->view('include/header');
		// $this->load->view('v_mtk');
		$this->load->view('include/footer');
	}
	
	public function mtk()
	{
		$data = array(
			"title" => 'penjumlahan'
		);
	
		$this->load->view('include/header', $data);
		$this->load->view('v_mtk');
		$this->load->view('include/footer');
	}
	public function saveimage()
	{
		$image = $_FILES;
		
			FOR($i=0;$i<10;$i++){
				IF(!empty($image[$i]['name'])){
					$z[][$i] = $image[$i];
				}
				// pre($image[$i]);
			}
					pre(count($z));
		// pre($image);
	}
	/****
	public function hitung()
	{
		$val_1 	= $this->input->post('val_1');
		$val_2 		= $this->input->post('val_2');
		$val_3 		= $this->input->post('val_3');

		$hasil = $val_1 + $val_2 + $val_3;

		echo json_encode($hasil);
	}
	*/
		
	public function validasi_span()
	{
		$data = array(
			"title" => 'validasi'
		);
		
		$this->load->view('include/header', $data);
		$this->load->view('v_validasi_span');
		$this->load->view('include/footer');
	}
	
	public function show()
	{
		$data = array(
			"title" => 'validasi'
		);
		
		// $this->load->view('include/header', $data);
		$this->load->view('v_show');
		// $this->load->view('include/footer');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */