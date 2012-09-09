<?php
class Imagem extends DataMapper {
    var $table = 'imagens';
    var $has_one = array("produto");
    
    function __construct(){
        parent::__construct();
    }
}
?>
