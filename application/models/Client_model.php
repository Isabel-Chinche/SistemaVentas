<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {


    public function save($data){
		$this->db->query('ALTER TABLE client AUTO_INCREMENT 1');
		return $this->db->insert("client",$data);
	}

	public function update($data,$id){
		$this->db->where("id",$id);
		return $this->db->update("client",$data);
	}

	public function getClient($id){
		$this->db->select("c.*");
		$this->db->from("client c");
		$this->db->where("c.id",$id);
		$result = $this->db->get();
		return $result->row();
	}
	
	public function getClients(){
		$this->db->select("c.*");
		$this->db->from("client c");
		$results = $this->db->get();
		return $results->result();
	}

	public function delete($id){
		$this->db->where("id", $id);
		$this->db->db_debug = false;
		if($this->db->delete("client")){
			return array("success","Se eliminó correctamente!");
		}else{
			return array("error","No se puede eliminar un cliente activo!");
		}
	}

}