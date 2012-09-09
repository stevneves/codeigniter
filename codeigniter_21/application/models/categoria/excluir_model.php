<?php
class Excluir_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    public function removeCategoria($id){
        $categoriaDB = new Categoria();
        $categoriaDB->where("id", $id)->get();
        if($categoriaDB->delete()) return true;
        else return false;
    }
}
?>