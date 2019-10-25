<?php 

session_start();

$con = mysqli_connect('127.0.0.1','root','','quanlyacclienminh') 
or die ('Không thể kết nối tới database');
mysqli_set_charset($con, 'UTF8');


$id_nick_lol = '';
$ten_dang_nhap = '';
$mat_khau = '';
$ten_nhan_vat = '';
$so_luong_tuong = '';
$so_luong_trang_phuc = '';
$rank = '';
$gia_ban = '';
$trang_thai = '';


/*
INSERT INTO `khachhang` (`id_khach_hang`, `ten_tai_khoan_dang_nhap`, `mat_khau`, `ten_khach_hang`, `SDT`, `Email`, `Sodu_TK`) VALUES (NULL, 'taikhoan13', 'mk13', 'khachhang13', '13', 'khachhang13@gmail.com', '250000');
*/

if (isset($_POST['add'])) {
	$ten_dang_nhap 			= $_POST['ten_dang_nhap'];
	$mat_khau 				= $_POST['mat_khau'];
	$ten_nhan_vat 			= $_POST['ten_nhan_vat'];
	$so_luong_tuong			= $_POST['so_luong_tuong'];
	$so_luong_trang_phuc 	= $_POST['so_luong_trang_phuc'];
	$rank 					= $_POST['rank'];
	$gia_ban 				= $_POST['gia_ban'];
	$trang_thai 			= $_POST['trang_thai'];

	
	$sql = "INSERT INTO acc_lol_chitiet (id_nick_lol, ten_dang_nhap, mat_khau, ten_nhan_vat, so_luong_tuong, so_luong_trang_phuc, rank, gia_ban, trang_thai) VALUES (NULL, '$ten_dang_nhap', '$mat_khau', '$ten_nhan_vat', '$so_luong_tuong', '$so_luong_trang_phuc', '$rank', '$gia_ban', '$trang_thai')";

	mysqli_query($con,$sql);




	$_SESSION['message'] = "Thêm thành công";
	$_SESSION['msg_type'] = "success";

	header("location: acc_lol.php");
}


if (isset($_GET['delete'])) {
	
	$id = $_GET['delete'];

	$sql = "DELETE FROM acc_lol_chitiet WHERE id_nick_lol = $id";
	mysqli_query($con,$sql) ;

	$_SESSION['message'] = "Xóa thành công";
	$_SESSION['msg_type'] = "danger";
	
	header("location: acc_lol.php");
}

?>