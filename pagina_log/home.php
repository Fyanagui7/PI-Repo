<?php
require('../conexao.php');

// Buscar todos os posts + imagens
$sql = "SELECT p.*, i.caminho AS imagem
        FROM posts p
        LEFT JOIN imagens i ON p.imagem_id = i.id
        ORDER BY p.id DESC";

$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Navbar com SOSI</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>

  <nav class="topo">
    <div class="navbar-container">
      <a href="#" class="sosi-btn"><span class="sos">SOS</span><span class="i">I</span></a>
      <ul class="menu">
        <li><a href="./home.php">Home</a></li>
        <li><a href="./denuncias.html">Formulários</a></li>
        <li class="logo-item">
          <img src="https://preview.redd.it/3qe3e6awkjb01.png?auto=webp&s=df0ee4e3c331db741a6b3a80eff9fdc0bc638244" alt="Logo" class="logo">
        </li>
        <li><a href="log_sobre.html">Sobre</a></li>
        <li><a href="log_contato.html">Contato</a></li>
      </ul>
      <div class="auth-links">
          <li style="list-style: none;"><a href="../perfil.php">Perfil</a></li>
      </div>
    </div>
  </nav>

  <main class="container">

    <?php while($post = $result->fetch_assoc()): ?>

      <div class="top-bar">
        <div class="left">
          <img src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Indaiatuba_brasao.gif" alt="Brasão" width="30">
          <span>Prefeitura de Indaiatuba</span>
        </div>

        <div class="center">
          <span><?php echo $post['titulo']; ?></span>
        </div>

        <div class="right">
          <span>
            <?php 
              echo date('d/m/Y', strtotime($post['data'])) . "<br>" .
                   date('H:i', strtotime($post['data']));
            ?>
          </span>
        </div>
      </div>

      <div class="post-content">

        <!-- IMAGEM DO POST -->
        <img class="post-image" 
            src="<?php echo $post['imagem'] ? '../'.$post['imagem'] : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxifN76Lz2jhaK5VFFLcPe2Ah_n1P5qEfMHg&s'; ?>" 
            alt="Postagem">

        <div class="comment-box">
          
          <!-- DESCRIÇÃO DO POST -->
          <textarea class="comment-text"><?php echo $post['descricao']; ?></textarea>

          <div class="comment-footer">
            <label for="Text">Deixe seu comentário:</label>
            <input type="text" name="Comentario" id="Text">
            <button title="Enviar comentário">💬</button>
          </div>
        </div>
      </div>

      <br><br> <!-- Só para separar visualmente os posts -->

    <?php endwhile; ?>

  </main>
</body>
</html>
