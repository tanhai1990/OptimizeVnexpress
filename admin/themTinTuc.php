
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
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
    <script type="text/javascript">
        function BrowseServer( startupPath, functionData ){
            var finder = new CKFinder();
            finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
            finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
            finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
            finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
            //finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
            finder.popup(); // Bật cửa sổ CKFinder
        } //BrowseServer

        function SetFileField( fileUrl, data ){
            document.getElementById( data["selectActionData"] ).value = fileUrl;
        }
        function ShowThumbnails( fileUrl, data ){	
            var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
            document.getElementById( 'thumbnails' ).innerHTML +=
            '<div class="thumb">' +
            '<img src="' + fileUrl + '" />' +
            '<div class="caption">' +
            '<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
            '</div>' +
            '</div>';
            document.getElementById( 'preview' ).style.display = "";
            return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
        }
    </script>

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
                    <td>
                        <input type="text" name="urlHinh" id="urlHinh"/>
                        <input onclick="BrowseServer('Images:/','urlHinh')" type="button" name="btnChonFile" value="Chọn Hình"/>
                    </td>
                </tr>
                <tr>
                    <td>Content:</td>
                    <td><textarea name="txtTomTat" id="Content" cols="50" rows="4"></textarea></td>
                    <script type="text/javascript">
                var editor = CKEDITOR.replace( 'Content',{
                    uiColor : '#9AB8F3',
                    language:'vi',
                    skin:'v2',
                    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
                    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
                    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    toolbar:[
                    ['Source','-','Save','NewPage','Preview','-','Templates'],
                    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
                    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
                    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
                    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                    ['Link','Unlink','Anchor'],
                    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
                    ['Styles','Format','Font','FontSize'],
                    ['TextColor','BGColor'],
                    ['Maximize', 'ShowBlocks','-','About']
                    ]
                });		
</script>
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
                    <td><input style="width:100px" type="submit" value="Thêm" name="btnThem"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>