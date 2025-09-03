<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>CRUD em PHP + Azure SQL</title>
</head>
<body>
    <h1>Gerenciamento de Itens</h1>

    <!-- Formulário para adicionar item -->
    <form method="POST" action="">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="descricao" placeholder="Descrição" required>
        <button type="submit" name="add">Adicionar</button>
    </form>

    <?php
    // Inserir item
    if (isset($_POST['add'])) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $sql = "INSERT INTO Items (Nome, Descricao) VALUES (?, ?)";
        $params = array($nome, $descricao);
        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt) {
            echo "<p style='color:green'>Item adicionado!</p>";
        } else {
            echo "<p style='color:red'>Erro: " . print_r(sqlsrv_errors(), true) . "</p>";
        }
    }

    // Listar itens
    $sql = "SELECT * FROM Items";
    $stmt = sqlsrv_query($conn, $sql);
    echo "<h2>Lista de Itens</h2>";
    echo "<ul>";
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "<li>" . $row['Nome'] . " - " . $row['Descricao'] .
             " <a href='edit.php?id=" . $row['Id'] . "'>Editar</a>" .
             " | <a href='delete.php?id=" . $row['Id'] . "'>Excluir</a></li>";
    }
    echo "</ul>";
    ?>
</body>
</html>
