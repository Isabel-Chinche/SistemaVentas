<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Profile_model");
        if (!$this->session->userdata("login")) {
            redirect(base_url()."login");
        }
    }

	public function index()
	{   
        $this->load->view('layout/head');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/topnav');
        $this->load->view('profile');
        $this->load->view('layout/footer');
        $this->load->view('layout/js/profile');
    }

    public function save(){

		$idUser	= $this->session->userdata("id");
		$name = $this->input->post("name");
		$email  = $this->input->post("email");
        $phoneNumber  = $this->input->post("phoneNumber");
        $validate_email = "";
        
        if($email!=$this->session->userdata("email")){
            $validate_email = "|is_unique[user.email]";
        }

        $this->form_validation->set_rules("name","Nombre","required|min_length[3]");
        $this->form_validation->set_rules("email","Email","required|valid_email".$validate_email);
        $this->form_validation->set_rules("phoneNumber","Número de celular","required");
        
		if ($this->form_validation->run()==TRUE) {
    
			$data  = array(
                'name' => $name,
                'email' => $email,
                'phone_number' => $phoneNumber,
			);

            $this->Profile_model->save($data,$idUser);
            redirect(base_url()."Signin/UpdateSession");
		}else{

            $this->load->view('layout/head');
            $this->load->view('layout/sidenav');
            $this->load->view('layout/topnav');
            $this->load->view('profile');
            $this->load->view('layout/footer');
            $this->load->view('layout/js/profile');
		}

    }

    public function upload(){

        $id    = $this->session->userdata("id");
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
