
<?php
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"]!=1){
    header("location:../index.php");
}

require "../lib/dbCon.php";
require "../lib/quantri.php";

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
            width: 1000px;
        }
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
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
        <h3 style="text-align:center">DANH SÁCH LOẠI TIN</h3>
        <table>
            <tr>
                <th style="width: 100px">idLT</th>
                <th style="width: 200px">Ten</th>
                <th style="width: 200px">Ten_KhongDau</th>
                <th style="width: 200px">ThuTu</th>
                <th style="width: 100px">AnHien</th>
                <th style="width: 100px">idTL</th>
                <th style="width: 100px"> <a href="./themLoaiTin.php">Thêm</a></th>
            </tr>
            <!-- Hiện danh sách loại tin -->
            <?php
            $loaiTin = DanhSachLoaiTin();
            while($rowLoaiTin = mysqli_fetch_array($loaiTin)){
            ?>
            <tr>
                <td><?php echo $rowLoaiTin['idLT']; ?></td>
                <td><?php echo $rowLoaiTin['Ten']; ?></td>
                <td><?php echo $rowLoaiTin['Ten_KhongDau']; ?></td>
                <td><?php echo $rowLoaiTin['ThuTu']; ?></td>
                <td><?php echo $rowLoaiTin['AnHien']; ?></td>
                <td><?php echo $rowLoaiTin['idTL']; ?></td>
                <td><a href="./xoaLoaiTin.php?idLT=<?php echo $rowLoaiTin["idLT"]?>">Xóa</a> - 
                <a href="./suaLoaiTin.php?idLT=<?php echo $rowLoaiTin["idLT"]?>">Sửa</a></td>
            </tr>
            <?php
            }
            ?>
            <!-- End Hiện danh sách loại tin -->
        </table>
    </div>
</body>
</html>