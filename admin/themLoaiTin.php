
<?php
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"]!=1){
    header("location:../index.php");
}

require "../lib/dbCon.php";
require "../lib/quantri.php";

?>

<?php
global $Conn;
if(isset($_POST["btnThem"])){
    $tenLT = $_POST["txtTenLT"];
    $tenLT_KhongDau = changeTitle($tenLT);
    $thuTu = $_POST["txtThuTu"];
        settype($thuTu, "int");
    $anHien = $_POST["radAnHien"];
        settype($anHien, "int");
    $idTL = $_POST["txtIdTL"];
        settype($idTL, "int");
    
    $sql = "
        INSERT INTO loaitin
        VALUES(null, '$tenLT', '$tenLT_KhongDau', '$thuTu', '$anHien', '$idTL');
    ";
    mysqli_query($Conn, $sql);

    header("location:listLoaiTin.php");
}

?>

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
        <h3 style="text-align: center">THÊM LOẠI TIN</h3>
        <form action="" method="post">
        <table>
            <tr>
                <td>Tên Loai Tin</td>
                <td><label for="txtTenLT"></label><input type="text" name="txtTenLT"/></td>
            </tr>
            <tr>
                <td>Thứ Tự</td>
                <td><label for="txtThuTu"></label><input type="text" name="txtThuTu"/></td>
            </tr>
            <tr>
                <td>Ẩn Hiện</td>
                <td>
                    <label><input type="radio" name="radAnHien" value="0">Ẩn</label>
                    <label><input type="radio" name="radAnHien" value="1">Hiện</label>
                </td>
            </tr>
            <tr>
                <td>idTL</td>
                <td>
                    <select style="width: 175px; height: 25px" name="txtIdTL" id="txtIdTL">
                    <!-- Combobox the loai -->
                    <?php
                    $theLoai = ListTheLoai();
                    while($rowTheloai = mysqli_fetch_array($theLoai)){
                    ?>

                        <option value="<?php echo $rowTheloai['idTL']; ?>"><?php echo $rowTheloai['TenTL'] ?></option>

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
                    <input type="submit" name="btnThem" value="Thêm">
                </td>
            </tr>
        </table>
        <br>
        <br>
        </form>
    </div>
</body>
</html>