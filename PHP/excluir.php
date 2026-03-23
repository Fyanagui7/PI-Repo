<?php
require("conexao.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM cadastro WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        echo "<script>alert('Usuário excluído com sucesso!'); window.location.href='CadastrosLog.php';</script>";
    } else {
        echo "Erro ao excluir: " . $conexao->error;
    }
} else {
    echo "ID não informado!";
}
?>
