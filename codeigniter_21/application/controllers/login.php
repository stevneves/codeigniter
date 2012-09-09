<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('login_model', 'membership');
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
    }

    function index() {
        $data = array(
            'page_title' => 'Login',
            'content_title' => 'Login'
        );

        if ($this->form_validation->run() == FALSE):

            
            $this->load->view('templates/header_public', $data);
            $this->load->view('login_view', $data);
            $this->load->view('templates/footer');
        else:

            if ($this->membership->validate()) { // VERIFICA LOGIN E SENHA
                $data = array(
                    'username' => $this->input->post('username'),
                    'logged' => true
                );
                $this->session->set_userdata($data);
                redirect(site_url());
            } else {
                $this->load->view('templates/header_public', $data);
                $this->load->view('login_view', $data);
                $this->load->view('templates/footer');
            }
        endif;
    }
    
    public function doLogout(){
        $data = array(
            'username' => '',
            'logged' => ''
        );
        $this->session->unset_userdata($data);
        redirect(site_url('login'));
    }
}