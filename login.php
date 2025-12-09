<?php
session_start(); 

require("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];


$query = "SELECT id, nome, email, celular, cpf FROM cadastro WHERE email = ? AND senha = ?";

$stmt = $conexao->prepare($query);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

  
    $usuario = $result->fetch_assoc();

    
    $_SESSION['usuario'] = $usuario;

  
    header("Location: ./pagina_log/home.php");
    exit();
    
} else {
    echo "<h1>Erro ao efetuar login, verifique o e-mail ou a senha!</h1>";
}

$stmt->close();
$conexao->close();
?>
