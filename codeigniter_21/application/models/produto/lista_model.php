<?php
class Lista_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function get_produtos($id = false){
        $produtoDB = new Produto;
        
        if($id === false){
            return $produtoDB->get();
        }

        $produtoDB->where("id", $id);
        return $produtoDB->get();
    }
    
    public function productToggleStatus($id){
        $produtoDB = new Produto;
        $produtoDB->where("id", $id)->get(1);
        $produtoDB->status =($produtoDB->status == 1)?0:1; 
        $produtoDB->save();
        return $produtoDB->status; // Retorna novo status - STeV
    }
}
?>
