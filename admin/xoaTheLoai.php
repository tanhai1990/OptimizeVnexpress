
<?php
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"]!=1){
    header("location:../index.php");
}

require "../lib/dbCon.php";
require "../lib/quantri.php";

?>
<!-- Xóa thể loại -->
<?php
global $Conn;
$idTL = $_GET["idTL"];
    settype($idTL, "int");
$sql = "
    DELETE FROM theloai
    WHERE idTL = '$idTL'
";
mysqli_query($Conn, $sql);
header("location:listTheLoai.php");
?>