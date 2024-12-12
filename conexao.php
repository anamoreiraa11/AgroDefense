
<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "agrodefense";

$con = mysqli_connect($server, $user, $pass, $bd);

if (!$con) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>
