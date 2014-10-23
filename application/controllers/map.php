<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class map extends CI_Controller {

	/**
	 * Index Page for this controller.
	
	 */
	 
	public function index()
	{
		
	$this->load->model('main_model');
		// $this->load->view('include/header');
		
      	$data['query'] = $this->main_model->getAll();
		$this->load->view('v_map',$data);
		// $this->load->view('include/footer');
	}
	
	function submit(){
	
	$this->load->model('main_model');
	
	
		if ($this->input->post('ajax')){
		  if ($this->input->post('id')){
			$this->main_model->update();
			$data['query'] = $this->main_model->getAll();
			$this->load->view('v_map',$data);
		  }else{
			$this->main_model->save();
			$data['query'] = $this->main_model->getAll();
			$this->load->view('v_map',$data);
		  }

		}else{
		  if ($this->input->post('submit')){
			  if ($this->input->post('id')){
				$this->MDaily->update();
				redirect('daily/index');
			  }else{
				$this->MDaily->save();
				redirect('daily/index');
			  }
		  }
		}
	}
	
	function delete(){
	$this->load->model('main_model');
	
		$id = $this->input->post('id');
		$this->db->delete('t_map', array('id_map' => $id));
		$data['query'] = $this->main_model->getAll();
		$this->load->view('v_map',$data);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */