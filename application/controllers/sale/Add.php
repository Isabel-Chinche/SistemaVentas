<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->model("Sale_model");
		$this->load->model("Product_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url()."login");
		}
	}

	public function index()
	{   
		$data = array(
			"vouchers" => $this->Sale_model->getVouchers(),
			"clients" => $this->Sale_model->getClients()
		); 

        $this->load->view('layout/head');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/topnav');
        $this->load->view('sale/add',$data);
        $this->load->view('layout/footer');
        $this->load->view('layout/js/sale');
    }
    
    public function save(){

		$subtotal = $this->input->post("subtotal");
		$igv = $this->input->post("igv");
		$discount = $this->input->post("discount");
		$total = $this->input->post("total");
		$userId	= $this->session->userdata("id");;
		$clientId = $this->input->post("clientId");
		$voucherId	= $this->input->post("voucherId");
		
		$ids = $this->input->post("ids");
		$prices	= $this->input->post("prices");
		$cants	= $this->input->post("cants");

		if($total <= 0){
			$resp= array('type' => "error", 'message' => "Para realizar la venta agregue productos");
			echo json_encode($resp);
		} else if($clientId == null){
			$resp= array('type' => "error", 'message' => "Antes de finalizar la venta seleccione un cliente");
			echo json_encode($resp);
		} else {
			$data  = array(
				'subtotal' => $subtotal,
				'igv' => $igv,
				'discount'=>$discount,
				'total' => $total,
				'user_id' => $userId,
				'client_id' => $clientId,
				'voucher_id' => $voucherId,
			);
			
			$this->Sale_model->save($data);
			$idSale = $this->Sale_model->getId();
			$this->detail($idSale,$ids,$cants,$prices,$discount);
		}
		
	}

	private function detail($idSale,$ids,$cants,$prices,$discount){
		for ($i=0; $i < count($ids); $i++) { 
			$data  = array(
				'sale_id' => $idSale,
				'product_id' => $ids[$i],
				'cant'=> $cants[$i],
				'price' => $prices[$i],
				'discount' => $discount[$i]
			);
			$this->Sale_model->saveDetail($data);
			$this->updateStock($ids[$i],$cants[$i]);
		}
	}
/*----- opción de actualización del stock de producto después de la venta------*/
	private function updateStock($id,$cant){
		$product = $this->Product_model->getProduct($id);
		$data = array(
			'stock' => $product->stock - $cant, 
		);
		$this->Product_model->update($data,$id);
		$this->session->set_flashdata("success","Venta exitosa!");
	}

}
