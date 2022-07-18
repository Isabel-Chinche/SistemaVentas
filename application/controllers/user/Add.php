<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("User_model");
        if (!$this->session->userdata("login")) {
			redirect(base_url()."login");
		}
	}

	public function index(){

        $id=$this->User_model->getId();
        $this->session->set_userdata('idUser', $id);
        
        $this->load->view('layout/head');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/topnav');
        $this->load->view('user/add');
        $this->load->view('layout/footer');
        $this->load->view('layout/js/user');
    }
    
    public function save(){

        $name = $this->input->post("name");
        $email = $this->input->post("email");
        $phoneNumber = $this->input->post("phoneNumber");
        $password = $this->input->post("password");
        $repeatPassword = $this->input->post("repeatPassword");
        $rolId = $this->input->post("rolId");
        $id = $this->session->userdata("idUser");
		$picture   ="img".$id.".png";

        $this->form_validation->set_rules("name","Nombre","required|min_length[3]");
        $this->form_validation->set_rules("email","Email","required|valid_email|is_unique[user.email]");
        $this->form_validation->set_rules("phoneNumber","Número de celular","required");
        $this->form_validation->set_rules("password","Contraseña","required");
        $this->form_validation->set_rules("repeatPassword","Repite la contraseña","required|matches[password]");
        $this->form_validation->set_rules("rolId","Rol","required");

		if ($this->form_validation->run()==TRUE) {
    
			$data  = array(
                'name' => $name,
                'email' => $email,
                'phone_number' => $phoneNumber,
                'password' => md5($password),
                'picture' => $picture,
                'rol_id' => $rolId
			);

            $this->User_model->save($data);
            
			$this->session->set_flashdata("success","Se guardó correctamente!");
			redirect(base_url()."usuarios");
		}else{
            $this->load->view('layout/head');
            $this->load->view('layout/sidenav');
            $this->load->view('layout/topnav');
            $this->load->view('user/add');
            $this->load->view('layout/footer');
            $this->load->view('layout/js/user');
		}
    }
    

	public function upload(){

        $id    = $this->session->userdata("idUser");
		$picture   ="img".$id.".png";

		$config['upload_path'] 		 = './assets/img/user';
		$config['allowed_types'] = 'jpg|png';
		$config['overwrite']   = true;
		$config['file_name']  = $picture;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('picture')) {

			$resp= array('type' => "error",'message' => substr($this->upload->display_errors(), 3, -4));

		} else {
            $this->upload->data();
			$resp= array('type' => "success", 'message' => "La imagen se subió correctamente");
		}

		echo json_encode($resp);

	}
}
