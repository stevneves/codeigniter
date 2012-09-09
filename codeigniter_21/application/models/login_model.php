<?php
class Login_model extends CI_Model {

    function validate() {
        $userDB = new User;
        
        $userDB->where('username', $this->input->post('username'));
        $userDB->where('password', md5($this->input->post('password')));
        $userDB->where('status', 1);

        if ($userDB->count() > 0) return true;
    }

    function logged() {
        $logged = $this->session->userdata('logged');

        if (!isset($logged) || $logged != true) {
            redirect(site_url('login'));
        }
    }
}