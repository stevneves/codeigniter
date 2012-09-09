<?php
class Excluir extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
        $this->load->model('categoria/excluir_model');
    }
    
    public function index(){
        if($this->input->post('remover')):
            foreach($this->input->post('remover') as $id) $this->excluir_model->removeCategoria($id);
        endif;
        redirect(site_url('categoria/lista'));
    }
    
    public function item($id = 0){
        if($id > 0):
            if($this->excluir_model->removeCategoria($id)) redirect(site_url('categoria/lista'));
        endif;
    }
}
?>
