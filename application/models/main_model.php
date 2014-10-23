<?php
class Main_model extends CI_Model
{		    
    function get_state(){
        $this->db->order_by("state_id", "ASC");
        return $this->db->get("master_state");        
    }
    
    function get_city() {
        $this->db->order_by("city_id", "ASC");
        return $this->db->get("master_city");        
    }
	
    function get_country() {
        $this->db->order_by("country_id", "ASC");
        return $this->db->get("master_country");        
    }
	
    function get_city_by_state($id) {
        $this->db->order_by("city_name", "ASC");
        $this->db->where("city_state_id", $id);
        $query = $this->db->get("master_city");
        if ($query->num_rows() > 0) return $query->result();              
    }
	
    function get_state_by_country($id) {
        $this->db->order_by("state_name", "ASC");
        $this->db->where("state_country_id", $id);
        $query = $this->db->get("master_state");
        if ($query->num_rows() > 0) return $query->result();              
    }	
	
	function getAll(){
	
		$res = $this->db->query("SELECT * FROM `t_map` order by `id_map` = 'asc' ");
			if($res->num_rows > 0)
			return $res->result('array');
	}
	
	/// load more
	function getBerita(){
	
		$res = $this->db->query("SELECT * FROM `berita` order by `id_berita` = 'asc' DESC LIMIT 0,5 ");
			if($res->num_rows > 0)
			return $res->result('array');
	}
	function getMore($id){
	
		$res = $this->db->query("SELECT * FROM berita WHERE id_berita < '$id' ORDER BY id_berita DESC LIMIT 0,5");
			if($res->num_rows > 0)
			return $res->result('array');
	}
	// end loadmore
  
   function save(){
    $id_map   = $this->input->post('id_map');
    $lat = $this->input->post('lat');
    $lang = $this->input->post('lang');
    $nama_lokasi=$this->input->post('nama_lokasi');
    $data = array(
      'lat'=>$lat,
      'long'=>$lang,
      'nama_lokasi'=>$nama_lokasi
    );
    $this->db->insert('t_map',$data);
  }
  
	function update(){
    $id_map   = $this->input->post('id_map');
    $lat = $this->input->post('lat');
    $lang = $this->input->post('lang');
    $nama_lokasi=$this->input->post('nama_lokasi');
    $data = array(
      'lat'=>$lat,
      'long'=>$lang,
      'nama_lokasi'=>$nama_lokasi
    );
    $this->db->where('id_map',$id_map);
    $this->db->update('t_map',$data);
  }
	
	
	
	function lookup($keyword){
		$this->db->select('*')->from('master_city');
        $this->db->like('city_name',$keyword,'after');
        $query = $this->db->get();    
        
        return $query->result();
	}
	
}
?>