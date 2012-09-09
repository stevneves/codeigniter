<?php
class Excluir_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    public function removeImagem($id){
        $imagemDB = new Imagem();
        $imagemDB->where("id", $id)->get();
        
        $img_full_path = FCPATH . "uploads\\".$imagemDB->imagem;
        if(!unlink($img_full_path)):
            $this->session->set_flashdata('message', "Não foi possível remover a imagem do sistema.");
            return false;
        endif;
        
        if($imagemDB->delete()) return true;
        else return false;
    }
}
?>