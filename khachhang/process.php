<?php 

session_start();

$con = mysqli_connect('127.0.0.1','root','','quanlyacclienminh') 
or die ('Không thể kết nối tới database');
mysqli_set_charset($con, 'UTF8');

$ten_tai_khoan_dang_nhap = '';
$mat_khau = '';
$ten_khach_hang = '';
$SDT = '';
$Email = '';
$Sodu_TK = '';

/*
INSERT INTO `khachhang` (`id_khach_hang`, `ten_tai_khoan_dang_nhap`, `mat_khau`, `ten_khach_hang`, `SDT`, `Email`, `Sodu_TK`) VALUES (NULL, 'taikhoan13', 'mk13', 'khachhang13', '13', 'khachhang13@gmail.com', '250000');
*/

if (isset($_POST['add'])) {
	$ten_tai_khoan_dang_nhap = $_POST['ten_tai_khoan_dang_nhap'];
	$mat_khau = $_POST['mat_khau'];
	$ten_khach_hang = $_POST['ten_khach_hang'];
	$SDT = $_POST['SDT'];
	$Email = $_POST['Email'];
	$Sodu_TK = $_POST['Sodu_TK'];
	//
	$sql = "INSERT INTO khachhang (id_khach_hang, ten_tai_khoan_dang_nhap, mat_khau, ten_khach_hang, SDT, Email, Sodu_TK) VALUES (NULL, '$ten_tai_khoan_dang_nhap', '$mat_khau', '$ten_khach_hang', '$SDT', '$Email', '$Sodu_TK')";

	mysqli_query($con,$sql);




	$_SESSION['message'] = "Thêm thành công";
	$_SESSION['msg_type'] = "success";

	header("location: taikhoankhachhang.php");
}


if (isset($_GET['delete'])) {
	
	$id = $_GET['delete'];

	$sql = "DELETE FROM khachhang WHERE id_khach_hang = $id";
	mysqli_query($con,$sql) ;

	$_SESSION['message'] = "Xóa thành công";
	$_SESSION['msg_type'] = "danger";
	
	header("location: taikhoankhachhang.php");
}

?>