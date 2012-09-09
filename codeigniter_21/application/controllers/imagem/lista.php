<?php
class Lista extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
        $this->load->model('login_model', 'membership');
        $this->membership->logged();
        
        $this->load->model('imagem/lista_model');
    }
    
    function index(){
        $data = array(
            'page_title' => 'Listagem de imagens',
            'content_title' => 'Imagens'
        );
        $data['imagens'] = $this->lista_model->get_imagens();
        
        $this->load->view('templates/header', $data);
        $this->load->view('imagem/lista_view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    function input(){
        exit;
    }
    
}
?>