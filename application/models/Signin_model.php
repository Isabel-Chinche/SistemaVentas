<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin_model extends CI_Model {

	public function signIn($email, $password){
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $results = $this->db->get("user");
        if ($results->num_rows() > 0) {
            return $results->row();
        }else{
            return false;
        }
    }

}
