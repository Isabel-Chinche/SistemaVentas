<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function getUser($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("user");
		return $resultado->row();
	}

	public function save($data,$id){
		$this->db->where("id",$id);
		return $this->db->update("user",$data);
	}

}
