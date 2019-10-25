<?php 

require_once 'process.php';

if(isset($_POST['search'])) {
	$ten_tai_khoan_dang_nhap = $_POST['txtten_tai_khoan_dang_nhap'];
	$ten_khach_hang = $_POST['txtten_khach_hang'];
	$SDT = $_POST['txtSDT'];
	$Email = $_POST['txtEmail'];
	
	if(empty($_POST['txtSodu_TK_min']))
	{
		$Sodu_TK_min = 0;
	}
	else
	{
		$Sodu_TK_min = $_POST['txtSodu_TK_min'];
	}
	if(empty($_POST['txtSodu_TK_max']))
	{
		$Sodu_TK_max = 10000000000000000;
	}
	else
	{
		$Sodu_TK_max = $_POST['txtSodu_TK_max'];
	}

	

	$sql = "SELECT * FROM khachhang WHERE 
	(ten_tai_khoan_dang_nhap IS NOT NULL AND ten_tai_khoan_dang_nhap LIKE '%$ten_tai_khoan_dang_nhap%') AND
	(ten_khach_hang IS NOT NULL AND ten_khach_hang LIKE '%$ten_khach_hang%') AND
	(SDT IS NOT NULL AND SDT LIKE '%$SDT%') AND
	(Email IS NOT NULL AND Email LIKE '%$Email%') AND
	(Sodu_TK BETWEEN '$Sodu_TK_min' AND '$Sodu_TK_max')
	";
	$result_search = mysqli_query($con,$sql);
	$num_rows = mysqli_num_rows($result_search);
	echo $num_rows;
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
	<link rel="stylesheet" type="text/css" href="taikhoankhachhang.css">
	<script type="text/javascript">
		$(document).ready(function(){
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
    	if(this.checked){
    		checkbox.each(function(){
    			this.checked = true;                        
    		});
    	} else{
    		checkbox.each(function(){
    			this.checked = false;                        
    		});
    	} 
    });
    checkbox.click(function(){
    	if(!this.checked){
    		$("#selectAll").prop("checked", false);
    	}
    });
});
</script>
</head>
<body>
	<?php require_once 'process.php'; ?>

	<?php 

	if (isset($_SESSION['message'])) :?>  

		<div class="alert alert-<?=$_SESSION['msg_type']?>">
			<?php
			echo '<i class="material-icons">
			done  </i>  ';
			echo $_SESSION['message'];
			unset($_SESSION['message']);
			?> 
		</div>        
	<?php endif ?>


	<div class="container">
		<button type="button" class="btn btn-default btn-sm" >
			<a href="http://localhost/btl_CSDL/khachhang/taikhoankhachhang.php"><span class="glyphicon glyphicon-log-out"></span> BACK </a>
		</button>
		

		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-md-6">
						<h2>Quản lí <b>Tài khoản khách hàng</b></h2>
						<p style="margin-top: 10px; margin-bottom: 5px;">Searching result</p>
					</div>
					<div class="col-md-6">
						<a href="#addKhachHangModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm</span></a>
						<a href="#deleteKhachHangModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Xóa</span></a>                      
					</div>
				</div>
			</div>

			<table class="table table-striped table-hover">

				<?php 
				$con = mysqli_connect('127.0.0.1','root','','quanlyacclienminh') 
				or die ('Không thể kết nối tới database');
				mysqli_set_charset($con, 'UTF8');				
				
				$i=0;

					?>
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>STT</th>
							<th>Mã khách hàng</th>
							<th>Tên tài khoản đăng nhập</th>
							<th>Tên khách hàng</th>
							<th>SDT</th>
							<th>Email</th>
							<th>Số dư TK (VND)</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if ($num_rows > 0 ) {
							
							while($row = mysqli_fetch_array($result_search) ) {
								$i = $i + 1;
								?>
								<tr>
									<td>
										<span class='custom-checkbox'>
											<input type="checkbox" id="checkbox1" name="options[]" value="1">
											<label for="checkbox1"></label>
										</span>
									</td>
									<td><?php echo $i ?></td>
									<td><?php echo $row['id_khach_hang']; ?></td>
									<td><?php echo $row['ten_tai_khoan_dang_nhap']; ?></td>
									<td><?php echo $row['ten_khach_hang']; ?></td>
									<td><?php echo $row['SDT']; ?></td>
									<td><?php echo $row['Email']; ?></td>
									<td><?php echo $row['Sodu_TK']; ?></td>
									<td>
										<a href="edit.php?edit=<?php echo $row['id_khach_hang']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

										<!-- href="#deleteKhachHangModal" -->
										<a href="process.php?delete=<?php echo $row['id_khach_hang'];?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
									</td>
								</tr>
								<?php
								
							}
						}
						?>
					</tbody>
				</table>

				<div class="clearfix">
					<div class="hint-text"><?php echo "Showing <b>$i</b> out of <b>$num_rows</b> entries"; ?></div>
					
				</div>
			</div>


		</div>

		<!-- Add Modal HTML -->
		<div id="addKhachHangModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="process.php" method="POST" enctype="multipart/form-data">
						<div class="modal-header">                      
							<h4 class="modal-title">Thêm KhachHang</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">                 

							<div class="form-group">
								<label>ten_tai_khoan_dang_nhap</label>
								<input type="text" class="form-control" name="ten_tai_khoan_dang_nhap" required>
							</div>
							<div class="form-group">
								<label>mat_khau</label>
								<input type="password" class="form-control" name="mat_khau" required>
							</div>
							<div class="form-group">
								<label>ten_khach_hang</label>
								<input type="text" class="form-control" name="ten_khach_hang" required>
							</div>
							<div class="form-group">
								<label>SDT</label>
								<input type="number" class="form-control" name="SDT" required>
							</div>

							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="Email" required>
							</div>
							<div class="form-group">
								<label>Sodu_TK</label>
								<input type="number" class="form-control" name="Sodu_TK" required>
							</div>                    
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-success" value="Add" name="add">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
	</html>
