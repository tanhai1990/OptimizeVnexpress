<!-- Hiện tin trang chủ -->
<!-- box cat -->

<!-- Hiện tin theo thể loại trên trang chủ-->
<?php
$theLoai = ShowType();
while($rowTheLoai = mysqli_fetch_array($theLoai)){
    $idTL = $rowTheLoai['idTL'];
?>

<div class="box-cat">
	<div class="cat">
        <!-- Hiển thị tiêu đề thể loại -->
    	<div class="main-cat">
        	<a href="index.php?p=chitiettin&idTL=<?php echo $rowTheLoai['idTL']; ?>">
            <?php echo $rowTheLoai['TenTL']; ?></a>
        </div>
        <!-- End Hiển thị tiêu đề thể loại -->
        <!-- Hiển thị loại tin theo thể loại -->
        <div class="child-cat">
            <?php
            $loaiTin = ShowTypeSubMenu($idTL);
            while($rowLoaiTin = mysqli_fetch_array($loaiTin)){
            ?>
            
        	<a href="index.php?p=tintrongloai&idLT=<?php echo $rowLoaiTin['idLT']; ?>">
            <?php echo $rowLoaiTin['Ten']; ?></a>

            <?php
            }
            ?>
        </div>
        <div class="clear"></div>
        <!-- End Hiển thị loại tin theo thể loại -->

        
        
        <div class="cat-content">
        	<div class="col1">
                <!-- Hiển thị tin theo thể loại cột bên trai -->
                <?php 
                $tinCotTrai= ListOneNew_Home($idTL);
                $rowTinCotTrai = mysqli_fetch_array($tinCotTrai)
                ?>
            	
                <div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $rowTinCotTrai['idTin']; ?>">
                    <?php echo $rowTinCotTrai['TieuDe']; ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $rowTinCotTrai['urlHinh']; ?>" align="left" />
                    <div class="des"><?php echo $rowTinCotTrai['TomTat']; ?></div>
                    <div class="clear"></div>
                   
				</div>

                <!-- End Hiển thị tin theo thể loại cột bên trai -->
            </div>
            <div class="col2">
                <!-- Hiển thị hai tin theo thể loại cột bên phai -->
                <?php
                $tinCotPhai = ListTwoNews_Home($idTL);
                while($rowTinCotPhai = mysqli_fetch_array($tinCotPhai)){
                ?>

                <p class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $rowTinCotPhai['idTin']; ?> ">
                <?php echo $rowTinCotPhai['TieuDe']; ?></a></p>

                <?php
                }
                ?>
                <!-- End Hiển thị hai tin theo thể loại cột bên phai -->
            </div>    
        </div>
    </div>
</div>
<div class="clear"></div>

<?php
}
?>
<!-- End Hiện tin theo thể loại -->
<!-- End box cat-->


