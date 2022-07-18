<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Category_model");
        if (!$this->session->userdata("login")) {
			redirect(base_url()."login");
		}

        if($this->session->userdata("rol")==2){ 
            $this->session->set_flashdata("error","No tiene permisos para editar categorias");
            redirect(base_url()."categorias");
  
        }
	}

	public function index($id)
	{   

        $data = $this->Category_model->getCategory($id); 
        
        if($data){
            $this->load->view('layout/head');
            $this->load->view('layout/sidenav');
            $this->load->view('layout/topnav');
            $this->load->view('category/edit',$data);
            $this->load->view('layout/footer');
            $this->load->view('layout/js/category');
        }

    }
    
    public function update($id){

        $name	= $this->input->post("name");
        $description = $this->input->post("description");

        $data = $this->Category_model->getCategory($id); 
        $validate_name = "";
        
        if($name!=$data->name){
            $validate_name = "|is_unique[category.name]";
        }
        
		$this->form_validation->set_rules("name","Nombre","required".$validate_name);
		$this->form_validation->set_rules("description","Descripción","required");

		if ($this->form_validation->run()==TRUE) {

			$data  = array(
				'name' => $name,
                'description' => $description,
                'modified_at' => date("Y-m-d h:i:s")
			);

			$this->Category_model->update($data,$id);
            $this->session->set_flashdata("success","Se modificó correctamente!");
            redirect(base_url()."categorias");
            
		}else{
			$this->index($id);
		}
	}
}
