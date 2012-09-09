<?php
class Editar extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
        $this->load->model('produto/editar_model');
    }
    
    public function index($id = 0){
        $data = array(
            'page_title' => 'Editar produto',
            'content_title' => 'Editar produto'
        );
        $data['message'] = "";
        $data['categorias'] = $this->editar_model->getCategories();
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('referencia', 'Referência', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('categoria_id', 'Categoria', 'required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        
        if ($this->form_validation->run()):
            if($this->editar_model->editarProduto($id)) $data['message'] = "Produto editar com sucesso";
        endif;
        
        $data['form_values'] = ($id > 0)?$this->editar_model->getProduct($id):''; // Deve ficar depois do evento de edição - STeV
        
        $this->load->view('templates/header', $data);
        $this->load->view('produto/form_view', $data);
        $this->load->view('templates/footer');
    }
    
    function item($id = 0){
        // Route scapes - STeV
        $this->index($id);
    }
}
?>
