<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class autocomplete extends CI_Controller {

	
	public function index(){
	
		$this->load->model('main_model');
		$this->load->view('autocomplete/show');
	}
	
	public function lookup(){
		$this->load->model('main_model');
		// process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
		// pre($_POST);EXIT;
        $data['response'] = 'false'; //Set default response
        $query = $this->main_model->lookup($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
                $data['message'][] = array( 
                                        'id'=>$row->city_id,
                                        'value' => $row->city_name,
                                        ''
                                     );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        else
        {
            $this->load->view('autocomplete/index',$data); //Load html view of search results
        }
	}
	
	public function tes(){
		pre($_POST);exit;
	}

}
