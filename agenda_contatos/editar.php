<?php
require 'conexao.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = (int) $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM contatos WHERE id = ?');
$stmt->execute([$id]);
$contato = $stmt->fetch();
if (!$contato) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> Editar Contato </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="caixa-geral">

            <header> Editar Contato </header>

            <section class="bloco">
                <form action="salvar.php" method="post">
                    <input type="hidden" name="id" value="<?= $contato['id'] ?>">
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?= htmlspecialchars($contato['nome']) ?>" required>
                    <label>E-mail</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($contato['email']) ?>">
                    <label>Telefone</label>
                    <input type="text" name="telefone" value="<?= htmlspecialchars($contato['telefone']) ?>">
                    <button type="submit">Atualizar</button>
                    <a class="botao cancelar" href="index.php">Cancelar</a>
                </form>
            </section>
        </div>
    </body>
</html>