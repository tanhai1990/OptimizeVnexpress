
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
        <h3 style="text-align:center">DANH SÁCH TIN TỨC</h3>  
        <table>
            <tr>
                <th style="width: 50px">idTin</th>
                <th style="width: 100px">Ngay</th>
                <th style="width: 350px">Tiêu Đề - Hình Ảnh - Tóm Tắt</th>
                <th style="width: 100px">Tên TL</th>
                <th style="width: 100px">Tên LT</th>
                <th style="width: 60px">Số lần xem</th>
                <th style="width: 60px">Tin nổi bật</th>
                <th style="width: 80px">Ẩn hiện</th>
                <th style="width: 100px"><a href="./themTinTuc.php">Thêm</a></th>
            </tr>
            <!-- Danh Sach tin tuc-->
            <?php
            $tinTuc = DanhSachTinTuc();
            while($rowTinTuc = mysqli_fetch_array($tinTuc)){
            ?>
            <tr>
                <td><?php echo $rowTinTuc['idTin']?></td>
                <td><?php echo $rowTinTuc['Ngay']?></td>
                <td>
                    <?php echo $rowTinTuc['TieuDe']?><br>
                    <img style="width: 120px; height: 100px;" src="../upload/tintuc/<?php echo $rowTinTuc['urlHinh'];?>" alt=""/><br>
                    <?php echo $rowTinTuc['TomTat']?>
                </td>
                <td><?php echo $rowTinTuc['TenTL'];?></td>
                <td><?php echo $rowTinTuc['Ten'];?></td>
                <td style="text-align:center"><?php echo $rowTinTuc['SoLanXem'];?></td>
                <td style="text-align:center"><?php echo $rowTinTuc['TinNoiBat'];?></td>
                <td style="text-align:center"><?php echo $rowTinTuc['AnHien'];?></td>
                <td style="text-align:center">
                    <a href="./suaTinTuc.php?idTin=<?php echo $rowTinTuc['idTin']; ?>">Sửa</a> - 
                    <a href="./xoaTinTuc.php?idTin=<?php echo $rowTinTuc['idTin']; ?>">Xóa</a>
                </td>
            </tr>
            <?php
            }
            ?>
            <!-- End Danh Sach tin tuc-->
        </table>
    </div>
</body>
</html>