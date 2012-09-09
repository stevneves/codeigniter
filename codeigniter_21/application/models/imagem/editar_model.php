<?php
class Editar_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function getProdutos(){
        $produtoDB = new Produto();
        $produtoDB->select('id');
        $produtoDB->select('referencia');
        $produtoDB->where('status', '1');
        $produtoDB->order_by("referencia", "asc");
        return $produtoDB->get();
    }

    public function editarImagem($id, $img_name){
        $imagemDB = new Imagem();
        $imagemDB->where("id", $id)->get();
        $imagemDB->sufixo = $this->input->post('sufixo');
        $imagemDB->produto_id = $this->input->post('produto_id');
        if($img_name): // Se o nome da imagem foi alterado - STeV
            $img_full_path = FCPATH . "uploads\\".$imagemDB->imagem;
            unlink($img_full_path); // Remover imagem atual do server - STeV
            $imagemDB->imagem = $img_name; // Mudar nome da imagem no banco - STeV
        endif;
        
        if($imagemDB->save()) return true;
        else return false;
    }
    
    public function getImagem($id){
        $imagemDB = new Imagem();
        return $imagemDB->where("id", $id)->get(1);
    }
}
?>
