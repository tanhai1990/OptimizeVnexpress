<?php
//Quản lý thể loại
function ListTheLoai(){
    global $Conn;
    $sql = "
        SELECT * FROM theloai
        ORDER BY idTL DESC
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}
//End Quản lý thể loại

//Chi tiet the loai
function ChiTietTheLoai($idTL){
    global $Conn;
    $sql = "
        SELECT * FROM theloai
        WHERE idTL = '$idTL'
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}

//End Chi tiet the loai

//Quan ly loai tin
function DanhSachLoaiTin(){
    global $Conn;
    $sql = "
        SELECT * FROM loaitin
        ORDER BY idLT DESC
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}
//End Quan ly loai tin

//Chi tiet Loai Tin
function ChiTietLoaiTin($idLT){
    global $Conn;
    $sql = "
        SELECT * FROM loaitin
        WHERE idLT = '$idLT'
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}

//End chi tiet loai tin

//Quan tri Tin tuc
function DanhSachTinTuc(){
    global $Conn;
    $sql = "
        SELECT tin.*, TenTL, Ten 
        FROM tin, loaitin, theloai
        WHERE tin.idTL = theloai.idTL
        AND tin.idLT = loaitin.idLT
        ORDER BY idTin DESC
        LIMIT 0,20
    ";
    $result = mysqli_query($Conn, $sql);
    return $result;
}
//End quan tri Tin tuc

function stripUnicode($str){
    if($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ',
            'D'=>'Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|y',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach($unicode as $khongDau=>$coDau){
            $arr = explode("|",$coDau);
            $str = str_replace($arr, $khongDau, $str);
        }
        return $str;
    }
    else return false;
}

function changeTitle($str){
    $str = trim($str);
    if($str=="") return "";
    $str = str_replace('"','',$str);
    $str = str_replace("'",'',$str);
    $str = stripUnicode($str);
    
    //
    $str = mb_convert_case($str, MB_CASE_TITLE, 'utf-8');
    $str = str_replace(' ','-',$str);
    
    return $str;
}




















?>