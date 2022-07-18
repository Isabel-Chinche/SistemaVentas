<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Order_model");
        $this->load->model("Client_model");

        if (!$this->session->userdata("login")) {
            redirect(base_url()."login");
        }
    }

    public function index(){

        $id=$this->Order_model->getId();
        $this->session->set_userdata('idOrder', $id);

        $this->load->view('layout/head');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/topnav');
        $this->load->view('order/add');
        $this->load->view('layout/footer');
        $this->load->view('layout/js/order');
    }
    
    public function save(){
        $clientId = $this->input->post("clientId");
        $description = $this->input->post("description");
        $cant = $this->input->post("cant");
        $typeState = $this->input->post("typeState");
       /*$date = $this->input->post("date");*/
        $product = $this->input->post("product");
        $typePayment = $this->input->post("typePayment");
        $typeDelivery = $this->input->post("typeDelivery");
        $address = $this->input->post("address");
        $id    = $this->session->userdata("idOrder");

        $this->form_validation->set_rules("clientId","Cliente","required");
        $this->form_validation->set_rules("description","Descripción","required");
        $this->form_validation->set_rules("cant", "Cantidad","required");
        $this->form_validation->set_rules("typeState","Estado del pedido","required");
        $this->form_validation->set_rules("product","Producto");
        $this->form_validation->set_rules("typePayment","Tipo de pago","required");
        $this->form_validation->set_rules("typeDelivery","Tipo de entrega","required");
        $this->form_validation->set_rules("address","Direccion de envio","required");
/*        $this->form_validation->set_rules("date","Fecha de entrega");*/
        

        if ($this->form_validation->run()==TRUE) {
    
            $data  = array(
                'client_id' => $clientId,
                'description' => $description,
                'cant' => $cant,
                'type_state' => $typeState,
/*                'date' => $date,*/
                'product' => $product,
                'type_payment' => $typePayment,
                'type_delivery' => $typeDelivery,
                'address' => $address
            );

            $this->Order_model->save($data);
            
            $this->session->set_flashdata("success","Se guardó correctamente!");
            redirect(base_url()."ordenes");
        }else{
            $this->load->view('layout/head');
            $this->load->view('layout/sidenav');
            $this->load->view('layout/topnav');
            $this->load->view('order/add');
            $this->load->view('layout/footer');
            $this->load->view('layout/js/order');
        }
    }
}

