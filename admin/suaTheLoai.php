
<?php
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"]!=1){
    header("location:../index.php");
}

require "../lib/dbCon.php";
require "../lib/quantri.php";
?>
<!-- Dổ Dữ liệu vào Form -->
<?php
$idTL = $_GET["idTL"];
    settype($idTL, "int");
$theLoai = ChiTietTheLoai($idTL);
$rowTheLoai = mysqli_fetch_array($theLoai);
?>
<!-- End Đổ Dữ liệu vào Form -->
<!-- Thực hiện nút Sửa -->
<?php
global $Conn;
if(isset($_POST["btnSua"])){
    $tenTL = $_POST["txtTenTL"];
    $tenTL_KhongDau = changeTitle($tenTL);
    $thuTu = $_POST["txtThuTu"];
        settype($thuTu, "int");
    $anHien = $_POST["radAnHien"];
        settype($anHien, "int");
    $sql ="
        UPDATE theloai SET
        TenTL = '$tenTL',
        TenTL_KhongDau = '$tenTL_KhongDau',
        ThuTu = '$thuTu',
        AnHien = '$anHien'
        WHERE idTL = '$idTL'
    ";
    mysqli_query($Conn, $sql);
    header("location:listTheLoai.php");
}


?>
<!-- End Thực hiện nút Sửa -->
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
        <!-- Bảng Menu -->
        <<div id="menu">
            
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
        <!-- End Bảng Menu -->
        <br>
        <br>
        <!-- Form sửa thể loại -->
        <h3 style="text-align: center">SỬA THỂ LOẠI</h3>
        <form action="" method="post">
        <table>
            <tr>
                <td>Tên Thể Loại</td>
                <td><label for="txtTenTL"></label><input value="<?php echo $rowTheLoai["TenTL"]; ?>" type="text" name="txtTenTL"/></td>
            </tr>
            <tr>
                <td>Thứ Tự</td>
                <td><label for="txtThuTu"></label><input value="<?php echo $rowTheLoai["ThuTu"]; ?>" type="text" name="txtThuTu"/></td>
            </tr>
            <tr>
                <td>Ẩn Hiện</td>
                <td>
                    <label><input <?php if($rowTheLoai["AnHien"]==0) echo "checked='checked'"; ?> type="radio" name="radAnHien" value="0">Ẩn
                    </label>
                    <label><input <?php if($rowTheLoai["AnHien"]==1) echo "checked='checked'"; ?> type="radio" name="radAnHien" value="1">Hiện
                    </label>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" name="btnSua" value="Sửa">
                </td>
            </tr>
        </table>
        </form> 
        <br>
        <br>
        <!-- End form sửa loại tin -->
    </div>
</body>
</html>