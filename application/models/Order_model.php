<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {


    public function save($data){
		$this->db->query('ALTER TABLE p_order AUTO_INCREMENT 1');
		return $this->db->insert("p_order",$data);
	}

	public function update($data,$id){
		$this->db->where("id",$id);
		return $this->db->update("p_order",$data);
	}

	public function getOrder($id){
		$this->db->select("o.*");
		$this->db->from("p_order o");
		$this->db->where("o.id",$id);
		$result = $this->db->get();
		return $result->row();
	}
	
	public function getOrders(){
		$this->db->select("o.*, cl.name as client");
		$this->db->from("p_order o");
		$this->db->join("client cl","cl.id=o.client_id");
		$results = $this->db->get();
		return $results->result();
	}

	public function delete($id){
		$this->db->where("id", $id);
		$this->db->db_debug = false;
		if($this->db->delete("p_order")){
			return array("success","Se eliminó correctamente!");
		}else{
			return array("error","No se puede eliminar pedidos que se han vendido!");
		}
	}

	public function getClients(){
		$this->db->select("cl.id, cl.name");
		$this->db->from("client cl");
		$results = $this->db->get();
		return $results->result();
	}

	public function getId(){
		$this->db->select("o.id");
		$this->db->from("p_order o");
		$this->db->order_by("o.id","desc");
		$this->db->limit(1);
		$result = $this->db->get();
		if($result->row()){
			return $result->row()->id+1;
		}else{
			return 0;
		}
	}	

}