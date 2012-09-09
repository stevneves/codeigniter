<?php
class Adicionar extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
        $this->load->model('produto/adicionar_model');
    }
    
    public function index(){
        $data = array(
            'page_title' => 'Novo produto',
            'content_title' => 'Adicionar novo produto'
        );
        $data['message'] = "";
        $data['categorias'] = $this->adicionar_model->getCategories();
        $data['form_values'] = "";
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('referencia', 'Referência', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('categoria_id', 'Categoria', 'required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        
        if ($this->form_validation->run()):
            if($this->adicionar_model->adicionarProduto()) $data['message'] = "Produto cadastrado com sucesso";
        endif;
        
        $this->load->view('templates/header', $data);
        $this->load->view('produto/form_view', $data);
        $this->load->view('templates/footer', $data);
    }
}
?>
