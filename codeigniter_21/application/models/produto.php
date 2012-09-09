<?php
class Produto extends DataMapper {
    var $has_one = array("categoria");
    var $has_many = array("imagem");
        
    function __construct(){
        parent::__construct();
    }
}
?>
