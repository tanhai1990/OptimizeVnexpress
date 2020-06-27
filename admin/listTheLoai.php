
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
        <h3 style="text-align: center">DANH SÁCH THỂ LOẠI</h3>
        <table>
            <tr>
                <th style="width: 167px">Mã TL</th>
                <th style="width: 167px">Tên Thể Loại</th>
                <th style="width: 200px">Tên Thể Loại Không Dấu</th>
                <th style="width: 167px">Thứ Tự</th>
                <th style="width: 167px">Ẩn Hiện</th>
                <th style="width: 167px"> <a href="themTheLoai.php">Thêm</a></th>
            </tr>
            <!-- Hiển thị bảng thể loại -->
            <?php
            $theLoai = ListTheLoai();
            while($rowTheLoai = mysqli_fetch_array($theLoai)){
            ?>
            <tr>
                <td><?php echo $rowTheLoai['idTL']; ?></td>
                <td><?php echo $rowTheLoai['TenTL']; ?></td>
                <td><?php echo $rowTheLoai['TenTL_KhongDau']; ?></td>
                <td><?php echo $rowTheLoai['ThuTu']; ?></td>
                <td><?php echo $rowTheLoai['AnHien']; ?></td>
                <td style="text-align: center;"> <a href="suaTheLoai.php?idTL=<?php echo $rowTheLoai["idTL"]?>">Sửa</a> - 
                <a onclick="return confirm('Bạn có muốn xóa hay không?')" href="xoaTheLoai.php?idTL=<?php echo $rowTheLoai["idTL"]?>">Xóa</a></td>
            </tr>
            <?php
            }
            ?>
            <!-- End Hiển thị bảng thể loại -->
        </table>

    </div>
</body>
</html>