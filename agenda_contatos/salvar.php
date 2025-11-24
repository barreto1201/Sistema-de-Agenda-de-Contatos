<?php
require 'conexao.php';

$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : null;

if ($nome === '') {
    header('Location: index.php');
    exit;
}

if (!empty($_POST['id'])) {
    $id = (int) $_POST['id'];
    $stmt = $pdo->prepare('UPDATE contatos SET nome = ?, email = ?, telefone = ? WHERE id = ?');
    $stmt->execute([$nome, $email, $telefone, $id]);
} else {
    $stmt = $pdo->prepare('INSERT INTO contatos (nome, email, telefone) VALUES (?, ?, ?)');
    $stmt->execute([$nome, $email, $telefone]);
}

header('Location: index.php');
exit;