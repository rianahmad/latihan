<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class restore_db extends CI_Controller {

	/**
	 * Index Page for this controller.
	
	 */
	 
	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('v_restoredb');
		$this->load->view('include/footer');
	}
	
	public function restore(){
		
		$nama_file	=	$_FILES['restore_db']['name'];
		$ukuran		=	$_FILES['restore_db']['size'];
		// pre($nama_file);EXIT;
	
	
	
	
	
		IF(trim($nama_file == "")){
			echo "file kosong";
		}else{
			
			$uploaddir='./asset/';
			$alamatfile=$uploaddir.$nama_file;

			if (move_uploaded_file($_FILES['restore_db']['tmp_name'],$alamatfile)){
			
				$filename = './asset/'.$nama_file.'';
				
				// Temporary variable, used to store current query
				$templine = '';
				
				// Read in entire file
				$lines = file($filename);
					
					// Loop through each line
					foreach ($lines as $line){
						// Skip it if it's a comment
						if (substr($line, 0, 2) == '--' || $line == '')
							continue;
					 
						// Add this line to the current segment
						$templine .= $line;
						// If it has a semicolon at the end, it's the end of the query
						if (substr(trim($line), -1, 1) == ';')
						{
							// Perform the query
							mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
							// Reset temp variable to empty
							$templine = '';
						}
					}
					
					echo "<center>Berhasil Restore Database, silahkan di cek.</center>";
					redirect(base_url()."",'refresh:1000000');
			}else{
				//jika gagal
				redirect(base_url()."",'refresh:50');
				echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
			}	
		}
		
		
	}
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */