<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}

$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="./css/contato.css">
    <link rel="stylesheet" href="./css/navbar.css">
</head>
<body>
    <div class="image-container"></div>

 <nav class="topo">
    <div class="navbar-container">
      <a href="#" class="sosi-btn"><span class="sos">SOS</span><span class="i">I</span></a>
      <ul class="menu">
        <li><a href="./pagina_log/home.html">Home</a></li>
        <li><a href="./pagina_log/denuncias.html">Formulários</a></li>
        <li class="logo-item">
          <img src="https://preview.redd.it/3qe3e6awkjb01.png?auto=webp&s=df0ee4e3c331db741a6b3a80eff9fdc0bc638244" alt="Logo" class="logo">
        </li>
        <li><a href="./pagina_log/log_sobre.html">Sobre</a></li>
        <li><a href="./pagina_log/log_contato.html">Contato</a></li>
      </ul>
      <div class="auth-links">
            <li style="list-style: none;"><a href="perfil.php">Perfil</a></li>
      </div>
    </div>
  </nav>

<section class="contato-wrapper">
    <div class="contato-container">
        <h1 class="contato-titulo">Nome: <?php echo $usuario['nome']; ?></h1>
        <p class="contato-subtitulo">Dados do Seu Perfil</p>

        <div class="contato-info">
            <div class="contato-item">
                <strong>Email:</strong>
                <span><?php echo $usuario['email']; ?></span>
            </div>
            <div class="contato-item">
                <strong>Telefone:</strong>
                <span><?php echo $usuario['celular']; ?></span>
            </div>
            <div class="contato-item">
                <strong>CPF:</strong>
                <span><?php echo $usuario['cpf']; ?></span>
            </div>

            <div style="background-color:cyan; margin-left:10rem; margin-right:10rem;'" ><a href="index.html" style="text-decoration:none">Sair</a></div>
        </div>
    </div>
</section>

</body>
</html>
