<?php
class Adicionar extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
        $this->load->model('categoria/adicionar_model');
    }
    
    public function index(){
        $data = array(
            'page_title' => 'Nova categoria',
            'content_title' => 'Adicionar nova categoria'
        );
        $data['message'] = "";
        $data['form_values'] = "";
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        
        if ($this->form_validation->run()):
            if($this->adicionar_model->adicionarCategoria()) $data['message'] = "Categoria cadastrado com sucesso";
        endif;
        
        $this->load->view('templates/header', $data);
        $this->load->view('categoria/form_view', $data);
        $this->load->view('templates/footer', $data);
    }
}
?>
