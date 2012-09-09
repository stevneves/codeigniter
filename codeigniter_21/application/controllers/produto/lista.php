<?php
class Lista extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
        $this->load->model('login_model', 'membership');
        $this->membership->logged();
        
        $this->load->model('produto/lista_model');
    }
    
    function index(){
        $data = array(
            'page_title' => 'Listagem de produtos',
            'content_title' => 'Produtos'
        );
        $data['produtos'] = $this->lista_model->get_produtos();
        
        $this->load->view('templates/header', $data);
        $this->load->view('produto/lista_view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    function input(){
        exit;
    }
    
}
?>