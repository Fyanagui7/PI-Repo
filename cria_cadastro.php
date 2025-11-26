<?php

require("conexao.php");

if(isset($_POST)){


$email = $_POST['email'];
$name = $_POST['nome'];
$senha = $_POST['senha'];
$celular = $_POST['tel'];
$cpf = $_POST['cpf'];


$query = "INSERT INTO pi (email, nome, senha, celular, cpf ) 
VALUES ($email, $name, $senha, $celular, $cpf);"

if(mysqli_query($conexao, $query)){
    echo "<h1>Pessoa cadastrada com sucesso!</h1>";
    
}else{
    echo "<h1>Erro ao cadastrar</h1>";
}

}
?>