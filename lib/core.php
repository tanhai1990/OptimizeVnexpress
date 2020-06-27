<?php
//Hiển thị tin mới nhất 1 tin
function ListOneNew(){
    global $Conn;
    $sql = "
        SELECT * FROM tin
        ORDER BY idTin DESC
        LIMIT 0,1
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}

//Hiển thị tin mới nhất bốn tin
function ListfourNews(){
    global $Conn;
    $sql = "
        SELECT * FROM tin
        ORDER BY idTin DESC
        LIMIT 1,6
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}

//Hiển thị tin xem nhiều nhất
function ListManyView(){
    global $Conn;
    $sql = "
        SELECT * FROM tin
        ORDER BY SoLanXem DESC
        LIMIT 0,6
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}


//Hiển thị tin mới nhất theo loại tin 1 tin
function ListOneNewType($idLT){
    global $Conn;
    $sql = "
        SELECT * FROM tin
        WHERE idLT = '$idLT'
        ORDER BY idTin DESC
        LIMIT 0,1 
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}

//Hiển thị tin mới nhất theo loại tin bốn tin
function ListThreeNewsType($idLT){
    global $Conn;
    $sql = "
        SELECT * FROM tin
        WHERE idLT = '$idLT'
        ORDER BY idTin DESC
        LIMIT 1,3
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}

//Hiển thị loại tin
function ShowNewType($idLT){
    global $Conn;
    $sql = "
        SELECT * FROM loaitin
        WHERE idLT = '$idLT'
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}

//Hiển thị hình ảnh quảng cáo top phải
function ShowAdverdTopRight($viTri){
    global $Conn;
    $sql = "
        SELECT * FROM quangcao
        WHERE vitri = '$viTri'
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}

//Hiển thị hình ảnh quảng cáo Footer
function ShowAdverdFooter($viTri){
    global $Conn;
    $sql = "
        SELECT * FROM quangcao
        WHERE vitri = '$viTri'
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}

//Hiển thị thể loại trên menu
function ShowType(){
    global $Conn;
    $sql = "
        SELECT * FROM theloai
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}

//Hiển thị loại tin trên SubMenu
function ShowTypeSubMenu($idTL){
    global $Conn;
    $sql = "
        SELECT * FROM loaitin
        WHERE idTL = '$idTL'
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}


//Hiển thị tin mới nhất 1 tin theo thể loại trong trang chủ
function ListOneNew_Home($idTL){
    global $Conn;
    $sql = "
        SELECT * FROM tin
        WHERE idTL = '$idTL'
        ORDER BY idTin DESC
        LIMIT 0,1
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}

//Hiển thị tin mới nhất hai tin theo thể loại trong trang chủ
function ListTwoNews_Home($idTL){
    global $Conn;
    $sql = "
        SELECT * FROM tin
        WHERE idTL = '$idTL'
        ORDER BY idTin DESC
        LIMIT 1,2
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}


//Hiển thị tin theo loại tin trong Main Content
function NewFollowType($idLT){
    global $Conn;
    $sql = "
        SELECT * FROM tin
        WHERE idLT = '$idLT'
        ORDER BY idTin DESC
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}

//Hiển thị tên loại tin đang xem
function BreadCrumb($idLT){
    global $Conn;
    $sql = "
        SELECT TenTL, Ten
        FROM theloai, loaitin
        WHERE theloai.idTL = loaitin.idTL
        AND idLT = '$idLT'
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}


//Hiển thị tin theo loại tin Phân trang trong Main Content
function NewFollowType_DividePages($idLT, $from, $soTinMotTrang){
    global $Conn;
    $sql = "
        SELECT * FROM tin
        WHERE idLT = '$idLT'
        ORDER BY idTin DESC
        LIMIT $from, $soTinMotTrang
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}

















?>