<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


    public function save($data){
		$this->db->query('ALTER TABLE user AUTO_INCREMENT 1');
		return $this->db->insert("user",$data);
	}

	public function update($data,$id){
		$this->db->where("id",$id);
		return $this->db->update("user",$data);
	}

	public function getUser($id){
		$this->db->select("u.*");
		$this->db->from("user u");
		$this->db->where("u.id",$id);
		$result = $this->db->get();
		return $result->row();
	}
	
	public function getUsers(){
		$this->db->select("u.*, r.name as rol");
		$this->db->from("user u");
		$this->db->join("rol r","r.id=u.rol_id");
		$results = $this->db->get();
		return $results->result();
	}

	public function delete($id){
		$this->db->where("id", $id);
		$this->db->db_debug = false;
		if($this->db->delete("user")){
			return array("success","Se eliminó correctamente!");
		}else{
			return array("error","No se puede eliminar un usuario activo!");
		}
	}

	public function getRols(){
		$this->db->select("r.id, r.name");
		$this->db->from("rol r");
		$results = $this->db->get();
		return $results->result();
	}

	public function getId(){
		$this->db->select("u.id");
		$this->db->from("user u");
		$this->db->order_by("u.id","desc");
		$this->db->limit(1);
		$result = $this->db->get();
		if($result->row()){
			return $result->row()->id+1;
		}else{
			return 0;
		}
	}

}