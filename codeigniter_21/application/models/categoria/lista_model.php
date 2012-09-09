<?php
class Lista_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function get_categorias($id = false){
        $categoriaDB = new Categoria;
        
        if($id === false){
            return $categoriaDB->get();
        }

        $categoriaDB->where("id", $id);
        return $categoriaDB->get();
    }
    
    public function categoriaToggleStatus($id){
        $categoriaDB = new Categoria;
        $categoriaDB->where("id", $id)->get(1);
        $categoriaDB->status =($categoriaDB->status == 1)?0:1; 
        $categoriaDB->save();
        return $categoriaDB->status; // Retorna novo status - STeV
    }
}
?>
