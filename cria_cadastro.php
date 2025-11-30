<?php

require("conexao.php");

if(isset($_POST)){


$email = $_POST['email'];
$name = $_POST['nome'];
$senha = $_POST['senha'];
$celular = $_POST['tel'];
$cpf = $_POST['cpf'];
$repetir = $_POST['rsenha'];

    if($senha != $repetir){
        echo "<h1>As senhas não coincidem</h1>";
        exit;
    }

   $check = $conexao->prepare("SELECT id FROM cadastro WHERE email = ? OR cpf = ?");
    $check->bind_param("ss", $email, $cpf);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<h1>Email ou CPF já cadastrados!</h1>";
        exit;
    }

$query = "INSERT INTO cadastro (email, nome, senha, celular, cpf ) 
VALUES ('$email', '$name', '$senha', '$celular', '$cpf');";



if(mysqli_query($conexao, $query)){
    echo "<h1>Pessoa cadastrada com sucesso!</h1>";
    
}else{
    echo "<h1>Erro ao cadastrar</h1>";
}

}
?>