<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Claim_model");
        $this->load->model("Client_model");

        if (!$this->session->userdata("login")) {
            redirect(base_url()."login");
        }
    }

    public function index(){

        $id=$this->Claim_model->getId();
        $this->session->set_userdata('idClaim', $id);

        $this->load->view('layout/head');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/topnav');
        $this->load->view('claim/add');
        $this->load->view('layout/footer');
        $this->load->view('layout/js/claim');
    }
    
    public function save(){

        $description = $this->input->post("description");
        $clientId = $this->input->post("clientId");
        $typeMessage = $this->input->post("typeMessage");
        $id    = $this->session->userdata("idClaim");

        $this->form_validation->set_rules("description","Descripción","required");
        $this->form_validation->set_rules("clientId","Cliente","required");
        $this->form_validation->set_rules("typeMessage","Tipo de mensaje","required");


        if ($this->form_validation->run()==TRUE) {
    
            $data  = array(
 
                'description' => $description,
                'client_id' => $clientId,
                'type_message' => $typeMessage
            );

            $this->Claim_model->save($data);
            
            $this->session->set_flashdata("success","Se guardó correctamente!");
            redirect(base_url()."reclamos");
        }else{
            $this->load->view('layout/head');
            $this->load->view('layout/sidenav');
            $this->load->view('layout/topnav');
            $this->load->view('claim/add');
            $this->load->view('layout/footer');
            $this->load->view('layout/js/claim');
        }
    }
}

