<?php 

session_start();

$con = mysqli_connect('127.0.0.1','root','','quanlyacclienminh') 
or die ('Không thể kết nối tới database');
mysqli_set_charset($con, 'UTF8');


$id_admin = '';
$id_khach_hang = '';
$id_hoa_don = '';
$id_nicklol = '';
$ngay_lap_hoa_don = '';
$thanh_tien = '';

/*
INSERT INTO `khachhang` (`id_khach_hang`, `ten_tai_khoan_dang_nhap`, `mat_khau`, `ten_khach_hang`, `SDT`, `Email`, `Sodu_TK`) VALUES (NULL, 'taikhoan13', 'mk13', 'khachhang13', '13', 'khachhang13@gmail.com', '250000');
*/

if (isset($_POST['add'])) {
	$id_admin = $_POST['id_admin'];
	$id_khach_hang = $_POST['id_khach_hang'];
	$id_hoa_don = $_POST['id_hoa_don'];
	$id_nicklol = $_POST['id_nicklol'];
	$ngay_lap_hoa_don = $_POST['ngay_lap_hoa_don'];
	$thanh_tien = $_POST['thanh_tien'];
	//
	$sql = "INSERT INTO hoadon (id_hoa_don, id_admin, id_khach_hang, id_nicklol, ngay_lap_hoa_don, thanh_tien) VALUES (NULL, '$id_admin', '$id_khach_hang', '$id_nicklol', '$ngay_lap_hoa_don', '$thanh_tien')";

	mysqli_query($con,$sql);




	$_SESSION['message'] = "Thêm thành công";
	$_SESSION['msg_type'] = "success";

	header("location: hoadon.php");
}


if (isset($_GET['delete'])) {
	
	$id = $_GET['delete'];

	$sql = "DELETE FROM hoadon WHERE id_hoa_don = $id";
	mysqli_query($con,$sql) ;

	$_SESSION['message'] = "Xóa thành công";
	$_SESSION['msg_type'] = "danger";
	
	header("location: hoadon.php");
}

?>