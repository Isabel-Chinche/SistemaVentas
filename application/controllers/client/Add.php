<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Client_model");
        if (!$this->session->userdata("login")) {
			redirect(base_url()."login");
		}
	}

	public function index()
	{   
        $this->load->view('layout/head');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/topnav');
        $this->load->view('client/add');
        $this->load->view('layout/footer');
        $this->load->view('layout/js/client');
    }
    
    public function save(){

        $name	= $this->input->post("name");
        $typeClient = $this->input->post("typeClient");
        $typeDocument = $this->input->post("typeDocument");
        $numDocument = $this->input->post("numDocument");
        $phoneNumber = $this->input->post("phoneNumber");
        $address = $this->input->post("address");
        $email = $this->input->post("email");

        $this->form_validation->set_rules("name","Nombre","required");
        $this->form_validation->set_rules("typeClient","Tipo de cliente","required");
		$this->form_validation->set_rules("typeDocument","Tipo de documento","required");
        $this->form_validation->set_rules("numDocument","Número de documento","required|is_unique[client.num_document]");
        $this->form_validation->set_rules("phoneNumber","Número de teléfono","required");
        $this->form_validation->set_rules("address","Dirección","required");
        $this->form_validation->set_rules("email","Email","required|valid_email");

		if ($this->form_validation->run()==TRUE) {
			$data  = array(
				'name' => $name,
                'type_client' => $typeClient,
                'type_document' => $typeDocument,
                'num_document' => $numDocument,
                'address' => $address,
                'phone_number' => $phoneNumber,
                'email' => $email
			);

			$this->Client_model->save($data);

			$this->session->set_flashdata("success","Se guardó correctamente!");
            
            redirect(base_url()."clientes");

		}else{
			$this->load->view('layout/head');
			$this->load->view('layout/sidenav');
			$this->load->view('layout/topnav');
			$this->load->view('client/add');
			$this->load->view('layout/footer');
			$this->load->view('layout/js/client');
		}
	}
}
