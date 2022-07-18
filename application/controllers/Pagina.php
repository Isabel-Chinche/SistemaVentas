<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

	public function index()
	{

		/*if ($this->session->userdata("login")) {*/
		if ($this->session->userdata("principal")) {
			redirect(base_url()."pagina");
		}else{
            $this->load->view("pagina");
			$this->load->view("layout/js/signin");
		}

	}
}

?>