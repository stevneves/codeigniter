<?php
class Editar extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
        $this->load->model('categoria/editar_model');
    }
    
    public function index($id = 0){
        $data = array(
            'page_title' => 'Editar categoria',
            'content_title' => 'Editar categoria'
        );
        $data['message'] = "";
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        
        if ($this->form_validation->run()):
            if($this->editar_model->editarCategoria($id)) $data['message'] = "Categoria editada com sucesso";
        endif;
        
        $data['form_values'] = ($id > 0)?$this->editar_model->getCategoria($id):''; // Deve ficar depois do evento de edição - STeV
        
        $this->load->view('templates/header', $data);
        $this->load->view('categoria/form_view', $data);
        $this->load->view('templates/footer');
    }
    
    function item($id = 0){
        // Route scapes - STeV
        $this->index($id);
    }
}
?>
