
<?php
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"]!=1){
    header("location:../index.php");
}

require "../lib/dbCon.php";
require "../lib/quantri.php";

?>
<!-- Xóa loại tin -->
<?php
global $Conn;
$idLT = $_GET["idLT"];
    settype($idLT, "int");
$sql = "
    DELETE FROM loaitin
    WHERE idLT = '$idLT'
";
mysqli_query($Conn, $sql);
header("location:listLoaiTin.php");
?>

<!-- End Xóa loại tin -->