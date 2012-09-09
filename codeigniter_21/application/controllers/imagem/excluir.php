<?php
class Excluir extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
        $this->load->model('imagem/excluir_model');
    }
    
    public function index(){
        if($this->input->post('remover')):
            foreach($this->input->post('remover') as $id) $this->excluir_model->removeImagem($id);
        endif;
        redirect(site_url('imagem/lista'));
    }
    
    public function item($id = 0){
        if($id > 0):
            if($this->excluir_model->removeImagem($id)) redirect(site_url('imagem/lista'));
        endif;
    }
}
?>
