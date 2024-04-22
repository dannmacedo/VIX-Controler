<?php
    $enderecoBD = "localhost" ;
    $banco      = "vix_control" ;
    $usuarioBD  = "root" ;
    $senhaBD    = "" ;

    $conexao = new PDO( "mysql:host=$enderecoBD;dbname=$banco" , $usuarioBD  , $senhaBD  ) ;

?>
