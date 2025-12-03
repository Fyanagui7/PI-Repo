<?php

    require("conexao.php");

$sql = "SELECT id, email, nome, senha, celular, cpf FROM cadastro";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
</head>
<body>
    <h2>Usuários Cadastrados</h2>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Nome</th>
            <th>Senha</th>
            <th>Celular</th>
            <th>CPF</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            // Exibe cada linha
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["senha"] . "</td>";
                echo "<td>" . $row["celular"] . "</td>";
                echo "<td>" . $row["cpf"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhum usuário encontrado</td></tr>";
        }
        ?>

    </table>
</body>
</html>
<?php
$conexao->close();
?>