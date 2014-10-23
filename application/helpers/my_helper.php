<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function format_time($time) {	
	$exploded = explode(':', $time);	
	pre($exploded);
	$value_1 = $exploded[0] * 1;	
	$value_2 = $exploded[1] * 1;	
	pre($value_1);
	pre($value_2);
	if(is_array($exploded)) {
		if( ($exploded[0] < 24) && ($exploded[1] < 60) && ($value_1 == $exploded[0]) && ($value_2 == $exploded[1]) ) {
			return TRUE;
		}
		return FALSE;
	}
		return FALSE;
}

function admincon(){
	return "restrict/admin/";
}

function adminview(){
	return "restrict/";
}

function contentview(){
	return "content/";
}
function produkview(){
	return "produk/";
}
function userview(){
	return "user/";
}
function pemesananview(){
	return "pemesanan/";
}
function scmview(){
	return "scm/";
}

function my_uppercase($data_post) { //Make a string uppercase	
	if(is_array($data_post)) {					
		foreach($data_post as $key=>$uppered):
			$data[$key] = strtoupper($uppered);
		endforeach;
	}else{
		$data = strtoupper($data_post);
	}
	return $data;
}

function pre($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    echo '<hr />';
}

function l_query(){
    $ci->database =& get_instance();
    pre($ci->database->db->last_query());
}

function alertMsg($code, $msg="") {
    if($msg === "") { /*checking the error message come from. send by yudhi or system*/
        switch($code):
			case 1:
				$pesan = "rolename sudah ada";
				$class = "alert alert-info alert-dismissable";
				$i = "fa fa-info";
				$button = '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				break;
			case 2:
				$res = "Success Message";
				$class = "formee-msg-success";
				break;
            endswitch;
    }else {
        /*checking is the message for failed or success alert*/
        if($code !== 2)
			switch($code):
				case 1:
					$class = 'alert alert-info alert-dismissable';
					break;
				case 2:
					$class = 'alert alert-danger alert-dismissable';
					break;
				case 3:
					$class = 'alert alert-warning alert-dismissable';
					break;
				case 4:
					$class = 'alert alert-success alert-dismissable';
					break;
			endswitch;
        else
            $class = "alert alert-danger alert-dismissable";
			switch($code):
				case 1:
					$i = "fa fa-info";
					break;
				case 2:
					$i = "fa fa-ban";
					break;
				case 3:
					$i = "fa fa-warning";
					break;
				case 4:
					$i = "fa fa-check";
					break;
			endswitch;
			$button = '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        $pesan = $msg;
    }
    $data = "<div class='".$class."'><i class='".$i."'></i>".$button.$pesan."</div>	";
    return $data;
}

function parse_date($data_post) { 
		$x = "";
		$y = "";
		foreach($data_post as $key=>$d):
			$x .= ",".$key."";
			$y .= ",'".$d."'";
		endforeach;
		$patterns = array("'to_date", "DD-MM-YYYY')'");
		$changed = array("to_date", "DD-MM-YYYY')");
		$data_for_insert = str_replace($patterns, $changed, $y);
				
		$data['fields'] = substr($x, 1);
		$data['values'] = substr($data_for_insert, 1);	
	return $data;
}


