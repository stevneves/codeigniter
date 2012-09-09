<?php
class Adicionar_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }

    public function adicionarCategoria(){
        $categoriaDB = new Categoria();
        $categoriaDB->nome = $this->input->post('nome');
        
        if($categoriaDB->save()) return true;
        else return false;
    }
}
?>
