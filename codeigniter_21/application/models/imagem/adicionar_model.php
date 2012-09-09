<?php
class Adicionar_model extends CI_Model{
    
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

    public function adicionarImagem($img_name){
        $imagemDB = new Imagem();
        $imagemDB->sufixo = $this->input->post('sufixo');
        $imagemDB->imagem = $img_name;
        $imagemDB->produto_id = $this->input->post('produto_id');
        
        if($imagemDB->save()) return true;
        else return false;
    }
}
?>
