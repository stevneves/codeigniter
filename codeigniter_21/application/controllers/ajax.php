<?php

class Ajax extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function toggleStatus() {
        // Não é permitido usando o return portanto teve que ficar if mesmo - STeV
//        if(!isset($this->input->post('id'))):
        
            $id = $this->input->post('id');
            if($id && is_numeric($id) && $id > 0):
                switch($this->input->post('type')):
                    case'categoria':
                        $this->load->model('categoria/lista_model');
                        $newStatus = $this->lista_model->categoriaToggleStatus($id);
                    break;
                    case'imagem':
                        $this->load->model('imagem/lista_model');
                        $newStatus = $this->lista_model->imagemToggleStatus($id);
                    break;
                    default: // product - STeV
                        $this->load->model('produto/lista_model');
                        $newStatus = $this->lista_model->productToggleStatus($id);
                    break;
                endswitch;
                echo ($newStatus == 0)?"Inativo":"Ativo";
            endif;
//        endif;
    }

}
?>