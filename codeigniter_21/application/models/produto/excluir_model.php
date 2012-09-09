<?php
class Excluir_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    public function removeProduct($id){
        $produtoDB = new Produto();
        $produtoDB->where("id", $id)->get();
        if($produtoDB->delete()) return true;
        else return false;
    }
}
?>