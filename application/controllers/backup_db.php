<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class backup_db extends CI_Controller {

	/**
	 * Index Page for this controller.
	
	 */
	 
	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('v_backupdb');
		$this->load->view('include/footer');
	}
	
	public function backup(){
		$this->load->dbutil();
		$prefs = array(
			// 'tables'      => array('master_city', 'master_country'),  
			'ignore'      => array(),           
			'format'      => 'txt',             
			'filename'    => 'mybackup.sql',    
			'add_drop'    => TRUE,              
			'add_insert'  => TRUE,              
			'newline'     => "\n"               
		);
		
		// Backup your entire database and assign it to a variable
		$backup =& $this->dbutil->backup($prefs);

		// Load the file helper and write the file to your server
		$this->load->helper('file');
		$date = date('dmy');
		$file_name = $date.'-latihan.sql';
		write_file('/'.$file_name, $backup);

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download($file_name, $backup);
	}
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */