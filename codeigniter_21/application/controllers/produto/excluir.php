<?php
class Excluir extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
        $this->load->model('produto/excluir_model');
    }
    
    public function index(){
        if($this->input->post('remover')):
            foreach($this->input->post('remover') as $id) $this->excluir_model->removeProduct($id);
        endif;
        redirect(site_url('produto/lista'));
    }
    
    public function item($id = 0){
        if($id > 0):
            if($this->excluir_model->removeProduct($id)) redirect(site_url('produto/lista'));
        endif;
    }
}
?>
