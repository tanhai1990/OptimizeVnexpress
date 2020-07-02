<div id="slide-left">
        	<div id="slideleft-main">
                <!--Hiển thị tin mới nhất một tin-->
                <?php
                $TinMoiNhat_MotTin = ListOneNew();
                $rowTinMoiNhat_MotTin = mysqli_fetch_array($TinMoiNhat_MotTin);
                ?>

                <img src="upload/tintuc/<?php echo $rowTinMoiNhat_MotTin['urlHinh']; ?>"  /><br />
                <h2 class="title"><a href="#"><?php echo $rowTinMoiNhat_MotTin['TieuDe']; ?></a> </h2>
                <div class="des">
                  <?php echo $rowTinMoiNhat_MotTin['TomTat']; ?>
                </div>
                <!--End Hiển thị tin mới nhất một tin-->
        	</div>

          <div id="slideleft-scroll">
            	
            <div class="content_scoller width_common">
            <!--Hiển thị tin mới nhất bốn tin-->
            <ul>
              <?php
              $TinMoiNhat_BonTin = ListFourNews();
              while($rowTinMoiNhat_BonTin = mysqli_fetch_array($TinMoiNhat_BonTin)){
              ?>

              <li>
                <div class="title_news">
               		<a href="index.php?p=<?php echo $rowTinMoiNhat_BonTin['idTin']; ?>&TieuDe_KhongDau=<?php echo $rowTinMoiNhat_BonTin['TieuDe_KhongDau']; ?>" class="txt_link">
                  <?php echo $rowTinMoiNhat_BonTin['TieuDe']?></a> 
                </div>
              </li>

              <?php
              }
              ?>
            </ul>
            <!--End Hiển thị tin mới nhất bốn tin-->
          </div>			
            
			<div id="gocnhin">
                <img alt="" src="http://khoapham.vn/images/logoKhoaPham.png" width="100%"></a>
                <div class="title_news"></div>
            </div>
                
            </div>
</div>


     