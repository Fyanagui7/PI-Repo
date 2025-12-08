<?php
require("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "SELECT id FROM cadastroPref WHERE email = ? AND senha = ?";

$stmt = $conexao->prepare($query);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h1>Login efetuado com sucesso!</h1>";
    header("Location: ./LogAdm/homeADM.html");
} else {
    echo "<h1>Erro ao efetuar login, verifique o e-mail ou a senha!</h1>";
}

$stmt->close();
$conexao->close();
?>
