<?php
require 'conexao.php';

$contatos = $pdo->query('SELECT * FROM contatos ORDER BY nome')->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> Agenda de Contatos </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="caixa-geral">
            
            <header> Agenda de Contatos </header>

            <section class="bloco">

                <h2> Adicionar Contato </h2>

                <form action="salvar.php" method="post" id="form-contato">
                    <input type="hidden" name="id" value="">
                    <label>Nome</label>
                    <input type="text" name="nome" required>
                    <label>E-mail</label>
                    <input type="email" name="email">
                    <label>Telefone</label>
                    <input type="text" name="telefone">
                    <button type="submit">Salvar</button>
                </form>
            </section>


            <section class="bloco">

                <h2> Contatos </h2>

                <?php if (count($contatos) === 0): ?>
                    <p> Nenhum contato cadastrado </p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contatos as $c): ?>
                                <tr>
                                    <td><?= htmlspecialchars($c['nome']) ?></td>
                                    <td><?= htmlspecialchars($c['email']) ?></td>
                                    <td><?= htmlspecialchars($c['telefone']) ?></td>
                                    <td class="acoes">
                                        <a class="botao editar" href="editar.php?id=<?= $c['id'] ?>">Editar</a>
                                        <a class="botao excluir" href="excluir.php?id=<?= $c['id'] ?>"
                                            onclick="return confirm('Excluir contato?')">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                <?php endif?>
            </section>
        </div>
        <script src="script.js"></script>
    </body>
</html>