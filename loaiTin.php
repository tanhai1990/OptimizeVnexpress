<?php
require "./lib/dbCon.php";
require "./lib/core.php";
?>

<?php
$idTL = $_GET["idTL"];
settype($idTL, "int");
$loaiTin = ShowTypeSubMenu($idTL);
while($rowLoaiTin = mysqli_fetch_array($loaiTin)){
?>
<option value="<?php echo $rowLoaiTin["idLT"]; ?>"><?php echo $rowLoaiTin["Ten"]; ?></option>
<?php
}
?>