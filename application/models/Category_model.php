<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {


    public function save($data){
		$this->db->query('ALTER TABLE category AUTO_INCREMENT 1');
		return $this->db->insert("category",$data);
	}

	public function update($data,$id){
		$this->db->where("id",$id);
		return $this->db->update("category",$data);
	}

	public function getCategory($id){
		$this->db->select("c.*");
		$this->db->from("category c");
		$this->db->where("c.id",$id);
		$result = $this->db->get();
		return $result->row();
	}
	
	public function getCategorys(){
		$this->db->select("c.*");
		$this->db->from("category c");
		$results = $this->db->get();
		return $results->result();
	}

	public function delete($id){
		$this->db->where("id", $id);
		$this->db->db_debug = false;
		if($this->db->delete("category")){
			return array("success","Se eliminó correctamente!");
		}else{
			return array("error","No se puede eliminar una categoria que contiene productos!");
		}
	}

}