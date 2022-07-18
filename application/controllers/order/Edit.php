<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Order_model");
        if (!$this->session->userdata("login")) {
			redirect(base_url()."login");
		}
	}

	public function index($id)
	{   

        $data = $this->Order_model->getOrder($id); 
        $this->session->set_userdata('idOrder',$id);

        if($data){
            $this->load->view('layout/head');
            $this->load->view('layout/sidenav');
            $this->load->view('layout/topnav');
            $this->load->view('order/edit',$data);
            $this->load->view('layout/footer');
            $this->load->view('layout/js/order');
        }

    }
    
    public function update($id){

        $clientId = $this->input->post("clientId");
        $description = $this->input->post("description");
        $cant = $this->input->post("cant");
        $typeState = $this->input->post("typeState");
        $date = $this->input->post("date");
        $product = $this->input->post("product");
        $typePayment = $this->input->post("typePayment");
        $typeDelivery = $this->input->post("typeDelivery");
        $address = $this->input->post("address");

        $data = $this->Order_model->getOrder($id); 
        
        $this->form_validation->set_rules("description","Descripción","required");
        $this->form_validation->set_rules("cant","Cantidad","required"); 
        $this->form_validation->set_rules("typeState","Estado de pedidos","required");
        $this->form_validation->set_rules("date","Fecha","required");
        $this->form_validation->set_rules("product","Producto","required");
        $this->form_validation->set_rules("typePayment","Tipo de pago","required");
        $this->form_validation->set_rules("typeDelivery","Medio de entrega", "required");
        $this->form_validation->set_rules("address","Address", "required");


		if ($this->form_validation->run()==TRUE) {
            
			$data  = array(
                'client_id' => $clientId,
                'description' => $description,
                'cant' => $cant,
                'type_state' => $typeState,
                'date' => $date,
                'product' => $product,
                'type_payment'=> $typePayment,
                'type_delivery' => $typeDelivery,
                'address' => $address,
                'modified_at' => date("Y-m-d h:i:s")
			);

			$this->Order_model->update($data,$id);
            $this->session->set_flashdata("success","Se modificó correctamente!");
            redirect(base_url()."ordenes");
            
		}else{
			$this->index($id);
		}
    }
  
}
