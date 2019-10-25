<?php 
	require_once 'process.php';

	if(isset($_GET['edit'])) {
		$id = $_GET['edit'];
		echo $id;
		$sql = "SELECT * FROM acc_lol_chitiet WHERE id_nick_lol=$id";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
	}
	if(isset($_POST['update'])) {
		$id_nick_lol 			= $_POST['id_nick_lol'];
		$ten_dang_nhap 			= $_POST['ten_dang_nhap'];
		$mat_khau 				= $_POST['mat_khau'];
		$ten_nhan_vat 			= $_POST['ten_nhan_vat'];
		$so_luong_tuong 		= $_POST['so_luong_tuong'];
		$so_luong_trang_phuc 	= $_POST['so_luong_trang_phuc'];
		$rank 					= $_POST['rank'];
		$gia_ban 				= $_POST['gia_ban'];
		$trang_thai 			= $_POST['trang_thai'];




		$sql = "UPDATE acc_lol_chitiet SET 
		ten_dang_nhap 			= '$ten_dang_nhap',
		mat_khau 				= '$mat_khau',
		ten_nhan_vat			= '$ten_nhan_vat',
		so_luong_tuong 			= '$so_luong_tuong',
		so_luong_trang_phuc 	= '$so_luong_trang_phuc',
		rank 					= '$rank',
		gia_ban 				= '$gia_ban',
		trang_thai 				= '$trang_thai'
		WHERE id_nick_lol		= '$id_nick_lol'
		";
		$result = mysqli_query($con,$sql);
		$_SESSION['message'] = "Chỉnh sửa thành công";
		$_SESSION['msg_type'] = "danger";
		
		header("location: acc_lol.php");
	}
?>
 

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
	<link rel="stylesheet" type="text/css" href="acc_lol.css">
	<link rel="stylesheet" type="text/css" href="edit.css">
</script>
</head>
<body>
   
	<button type="button" class="btn btn-default btn-sm" >
         <a href="http://localhost/btl_CSDL/acc_lol/acc_lol.php"><span class="glyphicon glyphicon-log-out"></span> BACK </a>
     </button>
    <div class="container">
        <div class="content">
        	
       
		<form action="edit.php" method="POST">
			
			<div class="form-group">
				<input type="hidden" class="form-control" name="id_nick_lol" placeholder="" 
				value="<?php echo $row['id_nick_lol']; ?>" required>
			</div>
			<div class="form-group">
				<label>ten_dang_nhap</label>
				<input type="text" class="form-control" name="ten_dang_nhap" placeholder=""
				value="<?php echo $row['ten_dang_nhap']; ?>" required>
			</div>
			<div class="form-group">
				<label>mat_khau</label>
				<input type="text" class="form-control" name="mat_khau" placeholder=""
				value="<?php echo $row['mat_khau']; ?>" required>
			</div>
			<div class="form-group">
				<label>ten_nhan_vat</label>
				<input type="text" class="form-control" name="ten_nhan_vat" placeholder="" 
				value="<?php echo $row['ten_nhan_vat']; ?>" required>
			</div>
			<div class="form-group">
				<label>so_luong_tuong</label>
				<input type="number" class="form-control" name="so_luong_tuong" placeholder="" 
				value="<?php echo $row['so_luong_tuong']; ?>" required>
			</div>

			<div class="form-group">
				<label>so_luong_trang_phuc</label>
				<input type="number" class="form-control" name="so_luong_trang_phuc" placeholder="" 
				value="<?php echo $row['so_luong_trang_phuc']; ?>" required>
			</div>
			<div class="form-group">
				<label>rank</label>
				<select name="rank" class="form-control" placeholder="" 
				value="<?php echo $row['rank']; ?>">
                    <option value="Đồng">Đồng</option>
                    <option value="Bạc">Bạc</option>
                    <option value="Vàng">Vàng</option>
                    <option value="Bạch kim">Bạch kim</option>
                    <option value="Kim cương">Kim cương</option>
                    <option value="Cao thủ">Cao thủ</option>
                    <option value="Thách đấu">Thách đấu</option>
                </select>
			</div>
			<div class="form-group">
				<label>gia_ban</label>
				<input type="number" class="form-control" name="gia_ban" placeholder="" 
				value="<?php echo $row['gia_ban']; ?>" required>
			</div>
			<div class="form-group">
				<label>trang_thai</label>
				<select name="trang_thai" class="form-control" placeholder="" 
				value="<?php echo $row['trang_thai']; ?>" required>
                    <option value="chưa bán">Chưa bán</option>
                    <option value="đã bán">Đã bán</option>
                </select>
			</div>

			<input type="submit" class="btn btn-info btn-update" name="update" value="Update">

		</form>

     	</div>
   </div>
</body>
</html>