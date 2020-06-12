<?php 

class M_login extends CI_Model{	

	function cek_login($username,$password){
		// $this->load->database('default', TRUE);
		$query = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'";
		return $this->db->query($query);

	}


}