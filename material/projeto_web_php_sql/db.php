<?php
$serverName = "tcp:seuservidor.database.windows.net,1433";
$connectionOptions = array(
    "Database" => "seubanco",
    "Uid" => "seuusuario",
    "PWD" => "suasenha",
    "Encrypt" => true,
    "TrustServerCertificate" => false
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}
?>
