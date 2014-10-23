<?php 
class Combobox extends CI_Controller {
	 
	function __construct() {
		parent::__construct();
                $this->load->model("main_model");
	}
	 
	public function index()	{
		$theme["negara"] = $this->main_model->get_country();
		$this->load->view('combobox',$theme);
	}
	
	function get_city($id) {
		$tmp 	= '';
		$data 	= $this->main_model->get_city_by_state($id);
		if(!empty($data)){
			$tmp .=	"<option value=''>Pilih Kota / Kabupaten</option>";	
			foreach($data as $row) {	
				$tmp .= "<option value='".$row->city_id."'>".$row->city_name."</option>";
			}
		} else {
			$tmp .=	"<option value=''>Pilih Kota / Kabupaten</option>";	
		}
		die($tmp);
	}
	
	function get_state($id) {
		$tmp 	= '';
		$data 	= $this->main_model->get_state_by_country($id);
		if(!empty($data)) {
			$tmp .=	"<option value=''>Pilih Provinsi</option>";	
			foreach($data as $row){	
			     $tmp .= "<option value='".$row->state_id."'>".$row->state_name."</option>";
			}
		} else {
			$tmp .=	"<option value=''>Pilih Provinsi</option>";	
		}
		die($tmp);
	}
}