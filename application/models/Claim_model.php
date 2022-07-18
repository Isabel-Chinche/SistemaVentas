<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claim_model extends CI_Model {


    public function save($data){
		$this->db->query('ALTER TABLE claim AUTO_INCREMENT 1');
		return $this->db->insert("claim",$data);
	}

	public function update($data,$id){
		$this->db->where("id",$id);
		return $this->db->update("claim",$data);
	}

	public function getClaim($id){
		$this->db->select("c.*");
		$this->db->from("claim c");
		$this->db->where("c.id",$id);
		$result = $this->db->get();
		return $result->row();
	}
	
	public function getClaims(){
		$this->db->select("c.*, cl.name as client");
		$this->db->from("claim c");
		$this->db->join("client cl","cl.id=c.client_id");
		$results = $this->db->get();
		return $results->result();
	}

	public function delete($id){
		$this->db->where("id", $id);
		$this->db->db_debug = false;
		if($this->db->delete("claim")){
			return array("success","Se eliminó correctamente!");
		}else{
			return array("error","No se puede eliminar el reclamo!");
		}
	}

	public function getClients(){
		$this->db->select("cl.id, cl.name");
		$this->db->from("client cl");
		$results = $this->db->get();
		return $results->result();
	}


	public function getId(){
		$this->db->select("c.id");
		$this->db->from("claim c");
		$this->db->order_by("c.id","desc");
		$this->db->limit(1);
		$result = $this->db->get();
		if($result->row()){
			return $result->row()->id+1;
		}else{
			return 0;
		}
	}	

}