<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu extends CI_Controller {

	/**
	 * Index Page for this controller.
	
	 */
	 
	public function index()
	{
		$data['allDataUser'] = $this->m_rian->getAll('t_user','id_user');
		$data['allDataMenu'] = $this->m_rian->getAll('t_menu','id_menu');
		$data['dataRian'] 	= $this->m_rian->getAll('master_country','country_id');
		
		$getOne = $this->m_rian->getAll('t_user','id_user');
		IF(!empty($getOne)){
			$data['cabang'] 	= $getOne[0]['cabang'];
			IF(!empty($getOne[0]['tambah'])){
				$data['menuTambah'] = $this->m_rian->getMultipleIn('t_menu','id_menu',$getOne[0]['tambah']);
			}
			IF(!empty($getOne[0]['update'])){
				$data['menuUpdate'] = $this->m_rian->getMultipleIn('t_menu','id_menu',$getOne[0]['update']);
			}
			IF(!empty($getOne[0]['delete'])){
				$data['menuDelete'] = $this->m_rian->getMultipleIn('t_menu','id_menu',$getOne[0]['delete']);
			}
			IF(!empty($getOne[0]['view'])){
				$data['menuView'] 	= $this->m_rian->getMultipleIn('t_menu','id_menu',$getOne[0]['view']);
			}
			IF(!empty($getOne[0]['menu_akses'])){
				$data['menuAkses']	= $this->m_rian->getMultipleIn('t_menu','id_menu',$getOne[0]['menu_akses']);
			}
		}
			// pre($data['menuTambah']);exit;
	
	
		$this->load->view('v_menu',$data);
	}
	
	public function saveMenu()
	{
		$post = $_POST;
		
		IF(empty($post)){
			redirect(base_url()."menu");
		}
		
			foreach ($post as $key => $val){
				$getOne = $this->m_rian->getOne('t_menu','menu',$key);
				$menu_akses = $getOne[0]['id_menu'];
				// echo $menu_akses;
				
				IF($key == "blok"){
					foreach($val as $val1){
						$getOne = $this->m_rian->getOne('t_menu','menu',$key);
						$id_menu = $getOne[0]['id_menu'];
						IF($val1 == "tambah"){
							$data['blok_tambah']  = $id_menu;
						}
						IF($val1 == "update"){
							$data['blok_update']  = $id_menu;
						}
						IF($val1 == "delete"){
							$data['blok_delete']  = $id_menu;
						}
						IF($val1 == "view"){
							$data['blok_view']  = $id_menu;
						}
						// $data['blok'] = $data;
					// pre($data);
					}
				}
				
				IF($key == "galeri"){
					foreach($val as $val1){
						$getOne = $this->m_rian->getOne('t_menu','menu',$key);
						$id_menu = $getOne[0]['id_menu'];
						IF($val1 == "tambah"){
							$data['galeri_tambah']  = $id_menu;
						}
						
						IF($val1 == "update"){
							$data['galeri_update']  = $id_menu;
						}
						
						IF($val1 == "delete"){
							$data['galeri_delete']  = $id_menu;
						}
						
						IF($val1 == "view"){
							$data['galeri_view']  = $id_menu;
						}
						
					}
				}
				
				IF($key == "kavling"){
					foreach($val as $val1){
						$getOne = $this->m_rian->getOne('t_menu','menu',$key);
						$id_menu = $getOne[0]['id_menu'];
						IF($val1 == "tambah"){
							$data['kav_tambah']  = $id_menu;
						}
						
						IF($val1 == "update"){
							$data['kav_update']  = $id_menu;
						}
						
						IF($val1 == "delete"){
							$data['kav_delete']  = $id_menu;
						}
						
						IF($val1 == "view"){
							$data['kav_view']  = $id_menu;
						}
					}
				}
			}
			
			
		//ATUR MENU AKSES	
		IF($post['blok']){
			$getOne = $this->m_rian->getOne('t_menu','menu','blok');	
			$hasil = $getOne[0]['id_menu'];
		}	
		IF($post['galeri']){
			IF(empty($post['blok'])){
				$getOne = $this->m_rian->getOne('t_menu','menu','galeri');	
				$hasil3 = $getOne[0]['id_menu'];
			}else{
				$getOne = $this->m_rian->getOne('t_menu','menu','galeri');	
				$hasil3 = ",".$getOne[0]['id_menu'];
			}
		}	
		IF($post['kavling']){
			IF(empty($post['blok'])){
				IF(empty($post['galeri'])){
					IF(!empty($post['kavling'])){
						$getOne = $this->m_rian->getOne('t_menu','menu','kavling');	
						$hasil2 = $getOne[0]['id_menu'];
					}else{
						$hasil2 = "";
					}
				}else{
					IF(!empty($post['kavling'])){
						$getOne = $this->m_rian->getOne('t_menu','menu','kavling');	
						$hasil2 = ",".$getOne[0]['id_menu'];
					}
				}
			}else{
				IF(!empty($post['galeri'])){
					IF(!empty($post['kavling'])){
						$getOne = $this->m_rian->getOne('t_menu','menu','kavling');	
						$hasil2 = ",".$getOne[0]['id_menu'];
					}
				}else{
					IF(!empty($post['kavling'])){
						$getOne = $this->m_rian->getOne('t_menu','menu','kavling');	
						$hasil2 = ",".$getOne[0]['id_menu'];
					}else{
						$hasil2 = "";
					}
				}
			}
		}	
			
			//ATUR TAMBAH BLOK
			IF(EMPTY($data['blok_tambah'])){
				$blok_tambah = "";
			}else{
				$blok_tambah = $data['blok_tambah'];
			}
			
			//ATUR TAMBAH GALERI
			IF(trim($blok_tambah == "")){
				$galeri_tambah = $data['galeri_tambah'];
			}IF(!empty($blok_tambah)){
				IF(!empty($data['galeri_tambah'])){
					$galeri_tambah = ",".$data['galeri_tambah'];
				}
			}
			
			//ATUR TAMBAH KAVLING
			IF(trim($blok_tambah == "")){
				IF(trim($galeri_tambah == "")){
					IF(trim($data['kav_tambah'] == "")){
						$kav_tambah = "";
					}else{
						$kav_tambah = $data['kav_tambah'];
					}
				}else{
					IF(!empty($data['kav_tambah'])){
						$kav_tambah = ",".$data['kav_tambah'];
					}
				}
			}IF(!empty($blok_tambah)){
				IF(!empty($data['galeri_tambah'])){
					IF(!empty($data['kav_tambah'])){
						$kav_tambah = ",".$data['kav_tambah'];
					}
				}else{
					IF(!empty($data['kav_tambah'])){
						$kav_tambah = ",".$data['kav_tambah'];
					}else{
						$kav_tambah = "";
					}
				}
			}
			
			//ATUR UPDATE BLOK
			IF(EMPTY($data['blok_update'])){
				$blok_update = "";
			}else{
				$blok_update = $data['blok_update'];
			}
			
			//ATUR UPDATE GALERI
			IF(trim($blok_update == "")){
				$galeri_update = $data['galeri_update'];
			}IF(!empty($blok_update)){
				IF(!empty($data['galeri_update'])){
					$galeri_update = ",".$data['galeri_update'];
				}
			}
			
			//ATUR UPDATE KAVLING
			IF(trim($blok_update == "")){
				IF(trim($galeri_update == "")){
					IF(trim($data['kav_update'] == "")){
						$kav_update = "";
					}else{
						$kav_update = $data['kav_update'];
					}
				}else{
					IF(!empty($data['kav_update'])){
						$kav_update = ",".$data['kav_update'];
					}
				}
			}IF(!empty($blok_update)){
				IF(!empty($data['galeri_update'])){
					IF(!empty($data['kav_update'])){
						$kav_update = ",".$data['kav_update'];
					}
				}else{
					IF(!empty($data['kav_update'])){
						$kav_update = ",".$data['kav_update'];
					}else{
						$kav_update = "";
					}
				}
			}
			
			//ATUR DELETE BLOK
			IF(EMPTY($data['blok_delete'])){
				$blok_delete = "";
			}else{
				$blok_delete = $data['blok_delete'];
			}
			
			//ATUR DELETE GALERI
			IF(trim($blok_delete == "")){
				$galeri_delete = $data['galeri_delete'];
			}IF(!empty($blok_delete)){
				IF(!empty($data['galeri_delete'])){
					$galeri_delete = ",".$data['galeri_delete'];
				}
			}
			
			//ATUR DELETE KAVLING
			IF(trim($blok_delete == "")){
				IF(trim($galeri_delete == "")){
					IF(trim($data['kav_delete'] == "")){
						$kav_delete = "";
					}else{
						$kav_delete = $data['kav_delete'];
					}
				}else{
					IF(!empty($data['kav_delete'])){
						$kav_delete = ",".$data['kav_delete'];
					}
				}
			}IF(!empty($blok_delete)){
				IF(!empty($data['galeri_delete'])){
					IF(!empty($data['kav_delete'])){
						$kav_delete = ",".$data['kav_delete'];
					}
				}else{
					IF(!empty($data['kav_delete'])){
						$kav_delete = ",".$data['kav_delete'];
					}else{
						$kav_delete = "";
					}
				}
			}
			
			
			//ATUR VIEW BLOK 
			IF(EMPTY($data['blok_view'])){
				$blok_view = "";
			}else{
				$blok_view = $data['blok_view'];
			}
			
			//ATUR VIEW GALERI
			IF(trim($blok_view == "")){
				$galeri_view = $data['galeri_view'];
			}IF(!empty($blok_view)){
				IF(!empty($data['galeri_view'])){
					$galeri_view = ",".$data['galeri_view'];
				}
			}
			
			//ATUR VIEW KAVLING
			IF(trim($blok_view == "")){
				IF(trim($galeri_view == "")){
					IF(trim($data['kav_view'] == "")){
						$kav_view = "";
					}else{
						$kav_view = $data['kav_view'];
					}
				}else{
					IF(!empty($data['kav_view'])){
						$kav_view = ",".$data['kav_view'];
					}
				}
			}IF(!empty($blok_view)){
				IF(!empty($data['galeri_view'])){
					IF(!empty($data['kav_view'])){
						$kav_view = ",".$data['kav_view'];
					}
				}else{
					IF(!empty($data['kav_view'])){
						$kav_view = ",".$data['kav_view'];
					}else{
						$kav_view = "";
					}
				}
			}
			
		// pre($data);exit;
		echo $this->db->query("INSERT `t_user` values(
										'".rand(1,100)."',
										'".$post['cabang']."',
										'".$blok_tambah.$galeri_tambah.$kav_tambah."',
										'".$blok_update.$galeri_update.$kav_update."',
										'".$blok_delete.$galeri_delete.$kav_delete."',
										'".$blok_view.$galeri_view.$kav_view."',
										'".$hasil.$hasil3.$hasil2."'
									)");
									
			redirect(base_url()."menu");
		
		PRE($post);exit;
		
	}
	
	function delete(){
		$sql = $this->db->query("DELETE FROM `t_user`");
		redirect(base_url().'menu');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */