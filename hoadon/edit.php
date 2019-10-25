<?php 
	require_once 'process.php';

	if(isset($_GET['edit'])) {
		$id = $_GET['edit'];
		echo $id;
		$sql = "SELECT * FROM hoadon WHERE id_hoa_don=$id";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
	}
	if(isset($_POST['update'])) {
		$id_hoa_don = $_POST['id_hoa_don'];
		$id_admin = $_POST['id_admin'];
		$id_khach_hang = $_POST['id_khach_hang'];
		$id_nicklol = $_POST['id_nicklol'];
		$ngay_lap_hoa_don = $_POST['ngay_lap_hoa_don'];
		$thanh_tien = $_POST['thanh_tien'];

		echo $id_hoa_don;
		echo $id_admin;
		echo $id_khach_hang;
		echo $id_nicklol;
		echo $ngay_lap_hoa_don;
		echo $thanh_tien;

		$sql = "UPDATE hoadon SET 
		id_admin 			= '$id_admin',
		id_khach_hang 		= '$id_khach_hang',
		id_nicklol 			= '$id_nicklol',
		ngay_lap_hoa_don	= '$ngay_lap_hoa_don',
		thanh_tien 			= '$thanh_tien'
		WHERE id_hoa_don = '$id_hoa_don'
		";
		$result = mysqli_query($con,$sql);
		$_SESSION['message'] = "Chỉnh sửa thành công";
		$_SESSION['msg_type'] = "danger";
		
		header("location: hoadon.php");
	}
?>
 	
	<!-- <form action="edit.php" method="POST">
			
			<div class="form-group">
				<input type="hidden" class="form-control" name="id_hoa_don" placeholder="" 
				value="<?php echo $row['id_hoa_don']; ?>" required>
			</div>
			<div class="form-group">
				<label>id_admin</label>
				<input type="number" class="form-control" name="id_khach_hang" placeholder=""
				value="<?php echo $row['id_admin']; ?>" required>
			</div>
			<div class="form-group">
				<label>id_khach_hang</label>
				<input type="number" class="form-control" name="id_khach_hang" placeholder=""
				value="<?php echo $row['id_khach_hang']; ?>" required>
			</div>
			<div class="form-group">
				<label>id_nicklol</label>
				<input type="number" class="form-control" name="id_nicklol" placeholder="" 
				value="<?php echo $row['id_nicklol']; ?>" required>
			</div>
			<div class="form-group">
				<label>ngay_lap_hoa_don</label>
				<input type="date" class="form-control" name="ngay_lap_hoa_don" placeholder="" 
				value="<?php echo $row['ngay_lap_hoa_don']; ?>" required>
			</div>

			<div class="form-group">
				<label>thanh_tien</label>
				<input type="number" class="form-control" name="thanh_tien" placeholder="" 
				value="<?php echo $row['thanh_tien']; ?>" required>
			</div>

			<input type="submit" class="btn btn-info btn-update" name="update" value="Update">

		</form>  -->

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
	<link rel="stylesheet" type="text/css" href="hoadon.css">
	<link rel="stylesheet" type="text/css" href="edit.css">
</script>
</head>
<body>
   
	<button type="button" class="btn btn-default btn-sm" >
         <a href="http://localhost/btl_CSDL/hoadon/hoadon.php"><span class="glyphicon glyphicon-log-out"></span> BACK </a>
     </button>
    <div class="container">
        <div class="content">
        	
       
		<form action="edit.php" method="POST">
			
			<div class="form-group">
				<input type="hidden" class="form-control" name="id_hoa_don" placeholder="" 
				value="<?php echo $row['id_hoa_don']; ?>" required>
			</div>
			<div class="form-group">
				<label>id_admin</label>
				<input type="number" class="form-control" name="id_admin" placeholder=""
				value="<?php echo $row['id_admin']; ?>" required>
			</div>
			<div class="form-group">
				<label>id_khach_hang</label>
				<input type="number" class="form-control" name="id_khach_hang" placeholder=""
				value="<?php echo $row['id_khach_hang']; ?>" required>
			</div>
			<div class="form-group">
				<label>id_nicklol</label>
				<input type="number" class="form-control" name="id_nicklol" placeholder="" 
				value="<?php echo $row['id_nicklol']; ?>" required>
			</div>
			<div class="form-group">
				<label>ngay_lap_hoa_don</label>
				<input type="date" class="form-control" name="ngay_lap_hoa_don" placeholder="" 
				value="<?php echo $row['ngay_lap_hoa_don']; ?>" required>
			</div>

			<div class="form-group">
				<label>thanh_tien</label>
				<input type="number" class="form-control" name="thanh_tien" placeholder="" 
				value="<?php echo $row['thanh_tien']; ?>" required>
			</div>

			<input type="submit" class="btn btn-info btn-update" name="update" value="Update">

		</form>

     	</div>
   </div>
</body>
</html>