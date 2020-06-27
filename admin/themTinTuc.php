
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
            width: 700px;
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
        <h3 style="text-align: center">THÊM TIN TỨC</h3>
        <form action="" method="post">
            <table>
                <tr>
                    <td style="width:150px">Tiêu đề:</td>
                    <td style="width:550px"><input type="text" name="txtTieuDe"/></td>
                </tr>
                <tr>
                    <td>Tóm tắt:</td>
                    <td><textarea name="txtTomTat" id="" cols="50" rows="4"></textarea></td>
                </tr>
                <tr>
                    <td>Hình ảnh:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Content:</td>
                    <td><textarea name="txtTomTat" id="NoiDung" cols="50" rows="4"></textarea></td>
                </tr>
                <tr>
                    <td>Mã thể loại:</td>
                    <td>
                        <select name="CmbIdTL" id="">
                            <!-- Danh sach the loai -->
                            <?php
                            $theLoai = ListTheLoai();
                            while($rowTheLoai = mysqli_fetch_array($theLoai)){
                            ?>
                            <option value="<?php echo $rowTheLoai['idTL'];?>"><?php echo $rowTheLoai['TenTL'];?></option>
                            <?php
                            }
                            ?>
                            <!-- End Danh sach the loai -->
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Mã loại tin:</td>
                    <td>
                        <select name="CmbIdLT" id="">
                            <!-- Danh sach loai tin-->
                            <?php
                            $loaiTin = DanhSachLoaiTin();
                            while($rowLoaiTin = mysqli_fetch_array($loaiTin)){
                            ?>
                            <option value="<?php echo $rowLoaiTin['idLT'];?>"><?php echo $rowLoaiTin['Ten'];?></option>
                            <?php
                            }
                            ?>
                            <!-- End Danh sach loai tin -->
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tin nổi bật:</td>
                    <td>
                        <label><input type="radio" name="radBinhThuong" value="0">Bình Thường</label>
                        <label><input type="radio" name="radNoiBat" value="1">Nổi Bật</label>
                    </td>
                </tr>
                <tr>
                    <td>Ẩn hiện:</td>
                    <td>
                        <label><input type="radio" name="radAnHien" value="0">Ẩn</label>
                        <label><input type="radio" name="radAnHien" value="1">Hiện</label>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Thêm" name="btnThem"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>