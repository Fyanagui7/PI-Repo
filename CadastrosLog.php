<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/Logcadastros.css">
</head>
<body>

<nav class="topo">
    <div class="navbar-container">
      <a href="#" class="sosi-btn"><span class="sos">SOS</span><span class="i">I</span></a>
      <ul class="menu">
        <li><a href="./LogAdm/homeADM.html">Home</a></li>
        <li><a href="./LogAdm/denunciasADM.html">Formulários</a></li>
        <li class="logo-item">
          <img src="https://preview.redd.it/3qe3e6awkjb01.png?auto=webp&s=df0ee4e3c331db741a6b3a80eff9fdc0bc638244" alt="Logo" class="logo">
        </li>
        <li><a href="./LogAdm/sobreADM.html">Sobre</a></li>
        <li><a href="./LogAdm/contatoADM.html">Contato</a></li>
      </ul>
      <div class="auth-links">
            <li style="list-style: none; text-decoration: underline white"><a href="../perfil.php">Perfil</a></li>
            <li style="list-style: none; text-decoration: underline white;"><a href="../CadastrosLog.php">Log Usuários</a></li>
      </div>
    </div>
  </nav>


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
                
                echo "<td>
                        <button 
                            onclick='confirmarExclusao(" . $row["id"] . ")' 
                            style=\"background:red; color:white; padding:5px; cursor:pointer;\">
                            Excluir
                        </button>
                      </td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhum usuário encontrado</td></tr>";
        }
        ?>

        <script>
        function confirmarExclusao(id) {
            if (confirm("Tem certeza que deseja excluir o usuário de ID " + id + "?")) {
                window.location.href = "excluir.php?id=" + id;
            }
        }
    </script>
</body>
</html>