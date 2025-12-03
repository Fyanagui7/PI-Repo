<?php

    $db_server = "localhost";
    $user = "root";
    $password = "";
    $db_name = "pi";

    $conexao = new mysqli($db_server, $user, $password, $db_name);

    if($conexao->connect_error){
        echo "<h1>falha na conexao</h1>";
    }
        echo "<h1>Conectado no banco com sucesso</h1>";
    


?>