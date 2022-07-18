<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Claim_model");
        if (!$this->session->userdata("login")) {
            redirect(base_url()."login");
        }
    }

    public function index($id)
    {   

        $data = $this->Claim_model->getClaim($id); 
        $this->session->set_userdata('idClaim',$id);
 
        if($data){
            $this->load->view('layout/head');
            $this->load->view('layout/sidenav');
            $this->load->view('layout/topnav');
            $this->load->view('claim/edit',$data);
            $this->load->view('layout/footer');
            $this->load->view('layout/js/claim');
        }

    }
    
    public function update($id){

        $description = $this->input->post("description");
        $clientId = $this->input->post("clientId");
        $typeMessage = $this->input->post("typeMessage");

        $data = $this->Claim_model->getClaim($id); 
        
        $this->form_validation->set_rules("description","Descripción","required");
        $this->form_validation->set_rules("typeMessage","Tipo de Mensaje","required");
        
        if ($this->form_validation->run()==TRUE) {
            
            $data  = array(
                'description' => $description,
                'client_id' => $clientId,
                'type_message' => $typeMessage,
                'modified_at' => date("Y-m-d h:i:s")
            );

            $this->Claim_model->update($data,$id);
            $this->session->set_flashdata("success","Se modificó correctamente!");
            redirect(base_url()."reclamos");
            
        }else{
            $this->index($id);
        }
    }
  
}
