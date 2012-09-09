<?php
class Editar_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    public function getCategories(){
        $categoriaDB = new Categoria();
        return $categoriaDB->where('status', '1')->get();
    }

    public function editarProduto($id){
        $produtoDB = new Produto();
        $produtoDB->where("id", $id)->get();
        $produtoDB->referencia = $this->input->post('referencia');
        $produtoDB->descricao = $this->input->post('descricao');
        $produtoDB->categoria_id = $this->input->post('categoria_id');
        
        if($produtoDB->save()) return true;
        else return false;
    }
    
    public function getProduct($id){
        $produtoDB = new Produto();
        return $produtoDB->where("id", $id)->get(1);
    }
}
?>
