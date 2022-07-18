<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_model extends CI_Model {


	public function getSale($id){
		$this->db->select("s.*, s.id as ids, c.*,v.name as voucher");
		$this->db->from("sale s");
		$this->db->join("client c","c.id=s.client_id");
		$this->db->join("voucher v","v.id=s.voucher_id");
		$this->db->where("s.id",$id);
		$results = $this->db->get();
		return $results->row();
	}

	public function getSalesDetail($id){
		$this->db->select("s.*, p.name as product_name");
		$this->db->from("sale_detail s");
		$this->db->join("product p","p.id=s.product_id");
		$this->db->where("s.sale_id",$id);
		$results = $this->db->get();
		return $results->result();
	}

}
