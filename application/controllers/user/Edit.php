<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("User_model");
        if (!$this->session->userdata("login")) {
			redirect(base_url()."login");
		}
	}

	public function index($id)
	{   

        $data = $this->User_model->getUser($id); 
        $this->session->set_userdata('idUser', $id);
        
        if($data){
            $this->load->view('layout/head');
            $this->load->view('layout/sidenav');
            $this->load->view('layout/topnav');
            $this->load->view('user/edit',$data);
            $this->load->view('layout/footer');
            $this->load->view('layout/js/user');
        }

    }
    
    public function update($id){

        $name = $this->input->post("name");
        $email = $this->input->post("email");
        $phoneNumber = $this->input->post("phoneNumber");
        $rolId = $this->input->post("rolId");
        $data = $this->User_model->getUser($id); 
        $validate_email = "";
        
        if($email!=$data->email){
            $validate_email = "|is_unique[user.email]";
        }

        $this->form_validation->set_rules("name","Nombre","required|min_length[3]");
        $this->form_validation->set_rules("email","Email","required|valid_email".$validate_email);
        $this->form_validation->set_rules("phoneNumber","Número de celular","required");
        $this->form_validation->set_rules("rolId","Rol","required");

		if ($this->form_validation->run()==TRUE) {

			$data  = array(
                'name' => $name,
                'email' => $email,
                'phone_number' => $phoneNumber,
                'rol_id' => $rolId,
                'modified_at' => date("Y-m-d h:i:s")
			);

			$this->User_model->update($data,$id);
            $this->session->set_flashdata("success","Se modificó correctamente!");
            redirect(base_url()."usuarios");
            
		}else{
			$this->index($id);
		}
    }
  
}
