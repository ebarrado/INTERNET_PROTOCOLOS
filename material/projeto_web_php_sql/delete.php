<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Items WHERE Id = ?";
    $stmt = sqlsrv_query($conn, $sql, array($id));
    if ($stmt) {
        echo "<p style='color:green'>Item excluído!</p>";
    } else {
        echo "<p style='color:red'>Erro: " . print_r(sqlsrv_errors(), true) . "</p>";
    }
}
?>
<a href="index.php">Voltar</a>
