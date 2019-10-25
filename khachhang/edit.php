<?php 
	require_once 'process.php';

	if(isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$sql = "SELECT * FROM khachhang WHERE id_khach_hang=$id";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
	}
	if(isset($_POST['update'])) {
		$id_khach_hang = $_POST['id_khach_hang'];
		$ten_tai_khoan_dang_nhap = $_POST['ten_tai_khoan_dang_nhap'];
		$mat_khau = $_POST['mat_khau'];
		$ten_khach_hang = $_POST['ten_khach_hang'];
		$SDT = $_POST['SDT'];
		$Email = $_POST['Email'];
		$Sodu_TK = $_POST['Sodu_TK'];
		
		$sql = "UPDATE khachhang SET 
		ten_tai_khoan_dang_nhap 	= '$ten_tai_khoan_dang_nhap',
		mat_khau 					= '$mat_khau',
		ten_khach_hang 				= '$ten_khach_hang',
		SDT 						= '$SDT',
		Email 						= '$Email',
		Sodu_TK 					= '$Sodu_TK'
		WHERE id_khach_hang = '$id_khach_hang'
		";
		$result = mysqli_query($con,$sql);
		$_SESSION['message'] = "Chỉnh sửa thành công";
		$_SESSION['msg_type'] = "danger";
		
		header("location: taikhoankhachhang.php");
	}
?>
<!-- <form action="edit.php" method="POST">
	
	<div class="form-group">
		<input type="hidden" class="form-control" name="id_khach_hang" placeholder="" 
		value="<?php echo $row['id_khach_hang']; ?>" required>
	</div>
	<div class="form-group">
		<label>ten_tai_khoan_dang_nhap</label>
		<input type="text" class="form-control" name="ten_tai_khoan_dang_nhap" placeholder="" 
		value="<?php echo $row['ten_tai_khoan_dang_nhap']; ?>" required>
	</div>
	<div class="form-group">
		<label>mat_khau</label>
		<input type="password" class="form-control" name="mat_khau" placeholder=""
		value="<?php echo $row['mat_khau']; ?>" required>
	</div>
	<div class="form-group">
		<label>ten_khach_hang</label>
		<input type="text" class="form-control" name="ten_khach_hang" placeholder="" 
		value="<?php echo $row['ten_khach_hang']; ?>" required>
	</div>
	<div class="form-group">
		<label>SDT</label>
		<input type="text" class="form-control" name="SDT" placeholder="" 
		value="<?php echo $row['SDT']; ?>" required>
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="Email" placeholder="" 
		value="<?php echo $row['Email']; ?>" required>
	</div>
	<div class="form-group">
		<label>Sodu_TK</label>
		<input type="text" class="form-control" name="Sodu_TK" placeholder="" 
		value="<?php echo $row['Sodu_TK']; ?>" required>
	</div>			


	<input type="submit" class="btn btn-info" name="update" value="Update">

</form> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="taikhoankhachhang.css">
	<link rel="stylesheet" type="text/css" href="edit.css">
</script>
</head>
<body>
   
	<button type="button" class="btn btn-default btn-sm" >
         <a href="http://localhost/btl_CSDL/khachhang/taikhoankhachhang.php"><span class="glyphicon glyphicon-log-out"></span> BACK </a>
     </button>
    <div class="container">
        <div class="content">
        	
       
		<form action="edit.php" method="POST">
			
			<div class="form-group">
				<input type="hidden" class="form-control" name="id_khach_hang" placeholder="" 
				value="<?php echo $row['id_khach_hang']; ?>" required>
			</div>
			<div class="form-group">
				<label>ten_tai_khoan_dang_nhap</label>
				<input type="text" class="form-control" name="ten_tai_khoan_dang_nhap" placeholder="" 
				value="<?php echo $row['ten_tai_khoan_dang_nhap']; ?>" required>
			</div>
			<div class="form-group">
				<label>mat_khau</label>
				<input type="password" class="form-control" name="mat_khau" placeholder=""
				value="<?php echo $row['mat_khau']; ?>" required>
			</div>
			<div class="form-group">
				<label>ten_khach_hang</label>
				<input type="text" class="form-control" name="ten_khach_hang" placeholder="" 
				value="<?php echo $row['ten_khach_hang']; ?>" required>
			</div>
			<div class="form-group">
				<label>SDT</label>
				<input type="text" class="form-control" name="SDT" placeholder="" 
				value="<?php echo $row['SDT']; ?>" required>
			</div>

			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="Email" placeholder="" 
				value="<?php echo $row['Email']; ?>" required>
			</div>
			<div class="form-group">
				<label>Sodu_TK</label>
				<input type="text" class="form-control" name="Sodu_TK" placeholder="" 
				value="<?php echo $row['Sodu_TK']; ?>" required>
			</div>			


			<input type="submit" class="btn btn-info btn-update" name="update" value="Update">

		</form>     	
     	</div>
   </div>
</body>
</html>