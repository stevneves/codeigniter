<?php
class Lista_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function get_imagens($id = false){
        $imagemDB = new Imagem;
        
//        echo'<pre>';
//        print_r($imagemDB->produto->get());
//        echo'</pre>';
        
        if($id === false){
            return $imagemDB->get();
        }

        $imagemDB->where("id", $id);
        return $imagemDB->get();
    }
    
    public function imagemToggleStatus($id){
        $imagemDB = new Imagem;
        $imagemDB->where("id", $id)->get(1);
        $imagemDB->status =($imagemDB->status == 1)?0:1; 
        $imagemDB->save();
        return $imagemDB->status; // Retorna novo status - STeV
    }
}
?>
