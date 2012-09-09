<?php
class Lista extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
        $this->load->model('login_model', 'membership');
        $this->membership->logged();
        
        $this->load->model('categoria/lista_model');
    }
    
    function index(){
        $data = array(
            'page_title' => 'Listagem de categorias',
            'content_title' => 'Categorias'
        );
        $data['categorias'] = $this->lista_model->get_categorias();
        
        $this->load->view('templates/header', $data);
        $this->load->view('categoria/lista_view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    function input(){
        exit;
    }
    
}
?>