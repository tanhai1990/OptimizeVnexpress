
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
        <h3>DANH SÁCH TIN TỨC</h3>  
        <table>
            <tr>
                <th style="width: 100px">idTin-Ngày</th>
                <th style="width: 500px">Tiêu Đề - Hình Ảnh - Tóm Tắt</th>
                <th style="width: 100px">Tên TL - Tên LT</th>
                <th style="width: 200px">Số lần xem - Tin nổi bật - Ẩn Hiện</th>
                <th style="width: 100px"><a href="./themTinTuc.php">Thêm</a></th>
            </tr>
            <!-- Danh Sach tin tuc-->
            <?php
            $tinTuc = DanhSachTinTuc();
            while($rowTinTuc = mysqli_fetch_array($tinTuc)){
            ?>
            <tr>
                <td><?php echo $rowTinTuc['idTin']?>-<?php echo $rowTinTuc['Ngay']?></td>
                <td>
                    <?php echo $rowTinTuc['TieuDe']?><br>
                    <img style="width: 100px; height: 100px;" src="../upload/tintuc/<?php echo $rowTinTuc['urlHinh'];?>" alt=""/><br>
                    <?php echo $rowTinTuc['TomTat']?>
                </td>
                <td><?php echo $rowTinTuc['TenTL'];?>-<?php echo $rowTinTuc['Ten'];?></td>
                <td>
                    <?php echo $rowTinTuc['SoLanXem'];?><br>
                    <?php echo $rowTinTuc['TinNoiBat'];?><br>
                    <?php echo $rowTinTuc['AnHien'];?>
                </td>
                <td><a href="./suaTinTuc.php">Sửa</a> - <a href="./xoaTinTuc.php">Xóa</a></td>
            </tr>
            <?php
            }
            ?>
            <!-- End Danh Sach tin tuc-->
        </table>
    </div>
</body>
</html>