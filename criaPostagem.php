
<?php
require('conexao.php'); // Conexão já pronta

// Verifica se veio algo por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $imagem_id = null; // começa sem imagem

    /* =============================
       1. SE O USUÁRIO ENVIOU IMAGEM
       ============================= */
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {

        // Pasta onde as imagens serão salvas
        $pasta = "uploads/";

        // Criar a pasta caso não exista
        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        $nomeOriginal = $_FILES['imagem']['name'];
        $temp = $_FILES['imagem']['tmp_name'];

        // Gera um nome único para evitar sobrescrições
        $nomeNovo = uniqid() . "_" . $nomeOriginal;

        $caminhoFinal = $pasta . $nomeNovo;

        // Move imagem para a pasta uploads
        if (move_uploaded_file($temp, $caminhoFinal)) {

            // Salvar informações da imagem no banco
            $sqlImg = "INSERT INTO imagens (nome_arquivo, caminho) VALUES (?, ?)";
            $stmtImg = $conexao->prepare($sqlImg);
            $stmtImg->bind_param("ss", $nomeOriginal, $caminhoFinal);
            $stmtImg->execute();

            // Pega o ID da imagem recém cadastrada
            $imagem_id = $stmtImg->insert_id;
        }
    }

    /* =============================
       2. INSERIR POSTAGEM NO BANCO
       ============================= */
    $sqlPost = "INSERT INTO posts (titulo, descricao, imagem_id) VALUES (?, ?, ?)";
    $stmtPost = $conexao->prepare($sqlPost);

    // imagem_id pode ser NULL, então usamos "i" podendo aceitar null
    $stmtPost->bind_param("ssi", $titulo, $descricao, $imagem_id);

    if ($stmtPost->execute()) {
        echo "<h3>Post criado com sucesso!</h3>";
        echo '<a href="criaPostagem.php">Voltar</a>';
    } else {
        echo "<h3>Erro ao criar post!</h3>";
    }
}
?>
