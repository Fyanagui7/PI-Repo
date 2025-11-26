<?php

    $db_server = "localhost";
    $user = "root";
    $password = "";
    $db_name = "pi";

    $conexao = new mysqli($db_server, $user, $password, $db_name);

    if($conexao->connect_error){
        echo "falha na conexao";
    }
        echo "conectado com sucesso";
    


?>