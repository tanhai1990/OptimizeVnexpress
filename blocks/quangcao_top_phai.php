<!-- Thể hiện vị trí quảng cáo top phải -->
<?php
$viTri = 1;
$QuangCaoCotPhai = ShowAdverdTopRight($viTri);
while($rowQuangCaoCotPhai = mysqli_fetch_array($QuangCaoCotPhai)){
?>

<img width="280" src="upload/quangcao/<?php echo $rowQuangCaoCotPhai['urlHinh']; ?>" />
<div style="height:10px"></div>

<?php
}
?>
<!-- End Thể hiện vị trí quảng cáo top phải -->