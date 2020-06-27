<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#">Tin xem nhiều</a>
      </div>
      
      <div class="clear"></div>
        <div class="cat-content">
        <!--Tin xem nhiều nhất-->	
            <?php
            $TinXemNhieuNhat = ListManyView();
            while($rowTinXemNhieuNhat = mysqli_fetch_array($TinXemNhieuNhat)){
            ?>

            <div class="col1">
            	<div class="news">
                    <img class="images_news" src="upload/tintuc/<?php echo $rowTinXemNhieuNhat['urlHinh']; ?>"  />
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $rowTinXemNhieuNhat['idTin'];?>">
                    <?php echo $rowTinXemNhieuNhat['TieuDe'];?></a>
                    <span class="hit"><?php echo $rowTinXemNhieuNhat['SoLanXem'];?></span></h3>
                    <div class="clear"></div>
				      </div>
            </div>

            <?php
            }
            ?>
        <!--End Tin xem nhiều nhất-->	
        </div>
      </div>
  </div>
<div class="clear"></div>

