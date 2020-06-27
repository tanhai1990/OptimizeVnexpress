<?php
$idLT = $_GET["idLT"];
settype($idLT, "integer");
?>

<!-- Hiển thị tên loại tin đang xem -->
<?php
$breadCrumb = BreadCrumb($idLT);
$rowBreadCrumb = mysqli_fetch_array($breadCrumb);
?>

<div>
Trang chủ >> <?php echo $rowBreadCrumb['TenTL'] ?> >> <?php echo $rowBreadCrumb['Ten'] ?>
</div>

<!-- End Hiển thị tên loại tin đang xem -->


<!-- Hiển thị tin theo loại tin trong MainContent -->

<!-- Hiển thị tin theo loai tin phân trang thành 6 tin một trang -->
<?php
$soTinMotTrang = 6;
if(isset($_GET["trang"])){
    $trang = $_GET["trang"];
    settype($trang, "integer");
}
else $trang = 1;

$from = ($trang-1)*$soTinMotTrang;



$tinTheoLoaiTin = NewFollowType_DividePages($idLT, $from, $soTinMotTrang);
while($rowTinTheoLoaiTin = mysqli_fetch_array($tinTheoLoaiTin)){

?>

<div class="box-cat">
	<div class="cat1">
    	
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" ><a href="#"><?php echo $rowTinTheoLoaiTin['TieuDe']; ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $rowTinTheoLoaiTin['urlHinh']; ?>" align="left" />
                    <div class="des"><?php echo $rowTinTheoLoaiTin['TomTat']; ?></div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            
        </div>
    </div>
</div>
<div class="clear"></div>

<?php
}
?>

<!-- CSS cho code phân trang -->
<style>
    #phanTrang{text-align:center}
    #phanTrang a{background-color: #b1d4dc; margin: 2px; padding: 10px; font-weight: bold; font-size: 18px;}
    #phanTrang a:hover{background-color: #09F}
</style>
<!-- End CSS cho code phân trang -->

<div id="phanTrang">
<?php
$tong = NewFollowType($idLT);
$tongSoTin = mysqli_num_rows($tong);
$tongSoTrang = ceil($tongSoTin/$soTinMotTrang);
for($i=1;$i<=$tongSoTrang;$i++){
?>

    <a <?php if($i==$trang) echo "style='background-color: red' "; ?> href="index.php?p=tintrongloai&idLT= <?php echo $idLT ?>&trang=<?php echo $i; ?>">
        <?php echo $i ?>
    </a> 

<?php
}
?>
</div>

<!-- Hiển thị tin theo loai tin phân trang thành 6 tin một trang -->
<!-- End Hiển thị tin theo loại tin trong MainContent -->
<!-- box cat-->