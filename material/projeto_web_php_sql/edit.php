<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Item</title>
</head>
<body>
    <h1>Editar Item</h1>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Buscar item
        $sql = "SELECT * FROM Items WHERE Id = ?";
        $stmt = sqlsrv_query($conn, $sql, array($id));
        $item = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        if (!$item) {
            echo "Item não encontrado!";
            exit;
        }

        // Atualizar item
        if (isset($_POST['update'])) {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $sql = "UPDATE Items SET Nome = ?, Descricao = ? WHERE Id = ?";
            $params = array($nome, $descricao, $id);
            $stmt = sqlsrv_query($conn, $sql, $params);
            if ($stmt) {
                echo "<p style='color:green'>Item atualizado!</p>";
            } else {
                echo "<p style='color:red'>Erro: " . print_r(sqlsrv_errors(), true) . "</p>";
            }
        }
    }
    ?>

    <form method="POST">
        <input type="text" name="nome" value="<?php echo $item['Nome']; ?>" required>
        <input type="text" name="descricao" value="<?php echo $item['Descricao']; ?>" required>
        <button type="submit" name="update">Salvar</button>
    </form>
    <br>
    <a href="index.php">Voltar</a>
</body>
</html>
