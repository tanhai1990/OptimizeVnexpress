
<?php
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"]!=1){
    header("location:../index.php");
}

require "../lib/dbCon.php";
require "../lib/quantri.php";

?>

<!-- Đổ dữ liệu vào FORM -->
<?php
$idLT = $_GET["idLT"];
    settype($idLT, "int");
$loaiTin = ChiTietLoaiTin($idLT);
$rowLoaiTin = mysqli_fetch_array($loaiTin);
?>
<!-- END Đổ dữ liệu vào FORM -->

<!-- Thuc hien nut Sửa loại tin -->
<?php
if(isset($_POST['btnSua'])){
    $tenLT = $_POST['txtTenLT'];
    $tenKhongDau = changeTitle($tenLT);
    $thuTu = $_POST['txtThuTu'];
        settype($ThuTu, "integer");
    $anHien = $_POST['radAnHien'];
        settype($anHien, "integer");
    $sql ="
        UPDATE loaitin SET
        Ten = '$tenLT',
        Ten_KhongDau = '$tenKhongDau',
        ThuTu = '$thuTu',
        AnHien = '$anHien'
        WHERE idLT = '$idLT'
    ";
    mysqli_query($Conn, $sql);
    header("location:listLoaiTin.php");
}
?>
<!-- End Thuc hien nut Sửa loại tin -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <style>
        table{
            width: 600px;
            border: 1px solid black;
            margin: auto;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div id="Wrapper">
        <div id="menu">
            
            <div id="hangTieuDe"><h2>TRANG QUẢN TRỊ</h2></div>
            <div id="hangHello">Hello <?php echo $_SESSION["HoTen"]; ?></div>
            <div id="hangThuHai">
                <div class="subMenu"><a href="./">Trang chủ</a></div>
                <div class="subMenu"><a href="./listTheLoai.php">Quản lý thể loại</a></div>
                <div class="subMenu"><a href="./listLoaiTin.php">Quản lý loại tin</a></div>
                <div class="subMenu"><a href="./listTinTuc.php">Quản lý tin tức</a></div>
                <div class="subMenu"><a href="./listQuangCao.php">Quản lý quảng cáo</a></div>
            </div>
        </div>
        <br>
        <br>
        <h3 style="text-align: center">SỬA LOẠI TIN</h3>
        <form action="" method="post">
        <table>
            <tr>
                <td>Tên Loai Tin</td>
                <td><label for="txtTenLT"></label><input type="text" name="txtTenLT" value="<?php echo $rowLoaiTin["Ten"]; ?>"/></td>
            </tr>
            <tr>
                <td>Thứ Tự</td>
                <td><label for="txtThuTu"></label><input type="text" name="txtThuTu" value="<?php echo $rowLoaiTin["ThuTu"]; ?>"/></td>
            </tr>
            <tr>
                <td>Ẩn Hiện</td>
                <td>
                    <label><input <?php if($rowLoaiTin["AnHien"]==0) echo "checked='checked'"; ?> type="radio" name="radAnHien" value="0">Ẩn</label>
                    <label><input <?php if($rowLoaiTin["AnHien"]==1) echo "checked='checked'"; ?> type="radio" name="radAnHien" value="1">Hiện</label>
                </td>
            </tr>
            <tr>
                <td>idTL</td>
                <td>
                    <select style="width: 175px; height: 25px" name="txtIdTL" id="txtIdTL">
                    <!-- Combobox the loai -->
                    <?php
                    $theLoai = ListTheLoai();
                    while($rowTheLoai = mysqli_fetch_array($theLoai)){
                    ?>

                        <option <?php if($rowTheLoai["idTL"]==$rowLoaiTin["idTL"]) echo "selected = 'selected'"?> value="<?php echo $rowTheLoai["idTL"]; ?>">
                            <?php echo $rowTheLoai["TenTL"]; ?>
                        </option>

                    <?php
                    }
                    ?>
                    <!-- End Combobox the loai -->
                    </select>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" name="btnSua" value="Sửa">
                </td>
            </tr>
        </table>
        <br>
        <br>
        </form>
    </div>
</body>
</html>