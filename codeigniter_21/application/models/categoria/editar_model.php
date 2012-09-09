<?php
class Editar_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }

    public function editarCategoria($id){
        $categoriaDB = new Categoria();
        $categoriaDB->where("id", $id)->get();
        $categoriaDB->nome = $this->input->post('nome');
        
        if($categoriaDB->save()) return true;
        else return false;
    }
    
    public function getCategoria($id){
        $categoriaDB = new Categoria();
        return $categoriaDB->where("id", $id)->get(1);
    }
}
?>
