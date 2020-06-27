<!-- =============================================================================== -->


<!-- Nhóm idLT = 5 -->
<?php
$idLT = 5;

?>
<!-- box cat -->
<div class="box-cat">
	<div class="cat">
        <!-- Loại tin cuộc sống đó đây có idTin=5 -->
        <?php
        $HienThiLoaiTin = ShowNewType($idLT);
        $rowHienThiLoaiTin = mysqli_fetch_array($HienThiLoaiTin);
        ?>

    	  <div class="main-cat">
        	<a href="#"><?php echo $rowHienThiLoaiTin['Ten']; ?></a>
        </div>
        <!-- End Loại tin cuộc sống đó đây có idTin=5 -->
        <div class="clear"></div>

        <div class="cat-content">
          <!-- Tin theo loại tin một tin-->
          <?php
          $TinTheoLoaiTin_MotTin = ListOneNewType($idLT);
          $rowTinTheoLoaiTin_MotTin = mysqli_fetch_array($TinTheoLoaiTin_MotTin)
          ?>

        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $rowTinTheoLoaiTin_MotTin['idTin']; ?>">
                <?php echo $rowTinTheoLoaiTin_MotTin['TieuDe']; ?></a></h3>
                <img class="images_news" src="upload/tintuc/<?php echo $rowTinTheoLoaiTin_MotTin['urlHinh']; ?>" align="left" />
                <div class="des"><?php echo $rowTinTheoLoaiTin_MotTin['TomTat']; ?></div> 
              <div class="clear"></div>
                   
				      </div>
          </div>
         <!-- End Tin theo loại tin một tin-->

         <!-- Tin theo loại tin ba tin -->
         <?php
         $TinTheoLoaiTin_BaTin = ListThreeNewsType($idLT);
         while($rowTinTheoLoaiTin_BaTin = mysqli_fetch_array($TinTheoLoaiTin_BaTin)){
         ?>

         <div class="col2">
           <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $rowTinTheoLoaiTin_BaTin['idTin']; ?>">
           <?php echo $rowTinTheoLoaiTin_BaTin['TieuDe']?></a></h3>
         </div>  
         <?php
         }
         ?>
         <!-- End Tin theo loại tin ba tin -->
        </div>
    
    </div>

</div>
<div class="clear"></div>

<!-- End box cat -->
<!-- =============================================================================== -->
<!-- Nhóm idLT = 4 -->
<?php
$idLT = 4;

?>
<!-- box cat -->
<div class="box-cat">
	<div class="cat">
        <!-- Loại tin cuộc sống đó đây có idTin=4 -->
        <?php
        $HienThiLoaiTin = ShowNewType($idLT);
        $rowHienThiLoaiTin = mysqli_fetch_array($HienThiLoaiTin);
        ?>

    	  <div class="main-cat">
        	<a href="#"><?php echo $rowHienThiLoaiTin['Ten']; ?></a>
        </div>
        <!-- End Loại tin cuộc sống đó đây có idTin=4 -->
        <div class="clear"></div>

        <div class="cat-content">
          <!-- Tin theo loại tin một tin-->
          <?php
          $TinTheoLoaiTin_MotTin = ListOneNewType($idLT);
          $rowTinTheoLoaiTin_MotTin = mysqli_fetch_array($TinTheoLoaiTin_MotTin)
          ?>

        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $rowTinTheoLoaiTin_MotTin['idTin']; ?>">
                <?php echo $rowTinTheoLoaiTin_MotTin['TieuDe']; ?></a></h3>
                <img class="images_news" src="upload/tintuc/<?php echo $rowTinTheoLoaiTin_MotTin['urlHinh']; ?>" align="left" />
                <div class="des"><?php echo $rowTinTheoLoaiTin_MotTin['TomTat']; ?></div> 
              <div class="clear"></div>
                   
				      </div>
          </div>
         <!-- End Tin theo loại tin một tin-->

         <!-- Tin theo loại tin ba tin -->
         <?php
         $TinTheoLoaiTin_BaTin = ListThreeNewsType($idLT);
         while($rowTinTheoLoaiTin_BaTin = mysqli_fetch_array($TinTheoLoaiTin_BaTin)){
         ?>

         <div class="col2">
           <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $rowTinTheoLoaiTin_BaTin['idTin']; ?>">
           <?php echo $rowTinTheoLoaiTin_BaTin['TieuDe']?></a></h3>
         </div>  
         <?php
         }
         ?>
         <!-- End Tin theo loại tin ba tin -->
        </div>
    
    </div>

</div>
<div class="clear"></div>

<!-- End box cat -->
<!-- =============================================================================== -->
<!-- Nhóm idLT = 3 -->
<?php
$idLT = 3;

?>
<!-- box cat -->
<div class="box-cat">
	<div class="cat">
        <!-- Loại tin cuộc sống đó đây có idTin=3 -->
        <?php
        $HienThiLoaiTin = ShowNewType($idLT);
        $rowHienThiLoaiTin = mysqli_fetch_array($HienThiLoaiTin);
        ?>

    	  <div class="main-cat">
        	<a href="#"><?php echo $rowHienThiLoaiTin['Ten']; ?></a>
        </div>
        <!-- End Loại tin cuộc sống đó đây có idTin=3 -->
        <div class="clear"></div>

        <div class="cat-content">
          <!-- Tin theo loại tin một tin-->
          <?php
          $TinTheoLoaiTin_MotTin = ListOneNewType($idLT);
          $rowTinTheoLoaiTin_MotTin = mysqli_fetch_array($TinTheoLoaiTin_MotTin)
          ?>

        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $rowTinTheoLoaiTin_MotTin['idTin']; ?>">
                <?php echo $rowTinTheoLoaiTin_MotTin['TieuDe']; ?></a></h3>
                <img class="images_news" src="upload/tintuc/<?php echo $rowTinTheoLoaiTin_MotTin['urlHinh']; ?>" align="left" />
                <div class="des"><?php echo $rowTinTheoLoaiTin_MotTin['TomTat']; ?></div> 
              <div class="clear"></div>
                   
				      </div>
          </div>
         <!-- End Tin theo loại tin một tin-->

         <!-- Tin theo loại tin ba tin -->
         <?php
         $TinTheoLoaiTin_BaTin = ListThreeNewsType($idLT);
         while($rowTinTheoLoaiTin_BaTin = mysqli_fetch_array($TinTheoLoaiTin_BaTin)){
         ?>

         <div class="col2">
           <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $rowTinTheoLoaiTin_BaTin['idTin']; ?>">
           <?php echo $rowTinTheoLoaiTin_BaTin['TieuDe']; ?></a></h3>
         </div>  
         <?php
         }
         ?>
         <!-- End Tin theo loại tin ba tin -->
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- =============================================================================== -->
<!-- End box cat -->
