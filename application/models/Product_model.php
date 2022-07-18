<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {


    public function save($data){
		$this->db->query('ALTER TABLE product AUTO_INCREMENT 1');
		return $this->db->insert("product",$data);
	}

	public function update($data,$id){
		$this->db->where("id",$id);
		return $this->db->update("product",$data);
	}

	public function getProduct($id){
		$this->db->select("p.*");
		$this->db->from("product p");
		$this->db->where("p.id",$id);
		$result = $this->db->get();
		return $result->row();
	}
	
	public function getProducts(){
		$this->db->select("p.*, c.name as category");
		$this->db->from("product p");
		$this->db->join("category c","c.id=p.category_id");
		$results = $this->db->get();
		return $results->result();
	}

	public function delete($id){
		$this->db->where("id", $id);
		$this->db->db_debug = false;
		if($this->db->delete("product")){
			return array("success","Se eliminó correctamente!");
		}else{
			return array("error","No se puede eliminar productos que se han vendido!");
		}
	}

	public function getCategorys(){
		$this->db->select("c.id, c.name");
		$this->db->from("category c");
		$results = $this->db->get();
		return $results->result();
	}

	public function getId(){
		$this->db->select("p.id");
		$this->db->from("product p");
		$this->db->order_by("p.id","desc");
		$this->db->limit(1);
		$result = $this->db->get();
		if($result->row()){
			return $result->row()->id+1;
		}else{
			return 0;
		}
	}	

}