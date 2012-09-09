<?php
class Adicionar_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    public function getCategories(){
        $categoriaDB = new Categoria();
        return $categoriaDB->where('status', '1')->get();
    }

    public function adicionarProduto(){
        $produtoDB = new Produto();
        $produtoDB->referencia = $this->input->post('referencia');
        $produtoDB->descricao = $this->input->post('descricao');
        $produtoDB->categoria_d = $this->input->post('categoria_id');
        
        if($produtoDB->save()) return true;
        else return false;
    }
}
?>
