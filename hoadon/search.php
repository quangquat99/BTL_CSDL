<?php 

require_once 'process.php';

if(isset($_POST['search'])) {
	$id_admin 		= $_POST['txtid_admin'];
	$id_khach_hang 	= $_POST['txtid_khach_hang'];
	$id_nicklol 	= $_POST['txtid_nicklol'];
	
	function check($var) {
		if(empty($var)) {
			$str = " > 0";
		} else {
			$str = " = $var";
		}
		return $str;
	}	

	if(empty($_POST['txtGia_min']))
	{
		$gia_min = 0;
	}
	else
	{
		$gia_min = $_POST['txtGia_min'];
	}
	if(empty($_POST['txtGia_max']))
	{
		$gia_max = 10000000000000;
	}
	else
	{
		$gia_max = $_POST['txtGia_max'];
	}

	$sql = "SELECT * FROM hoadon WHERE "."(id_admin".check($id_admin).") AND ".
	"(id_khach_hang".check($id_khach_hang).") AND ".
	"(id_nicklol".check($id_nicklol).") AND (thanh_tien BETWEEN '$gia_min' AND '$gia_max')";
	
	$result_search = mysqli_query($con,$sql);
	$num_rows = mysqli_num_rows($result_search);

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
	<link rel="stylesheet" type="text/css" href="hoadon.css">
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
			<a href="http://localhost/btl_CSDL/hoadon/hoadon.php"><span class="glyphicon glyphicon-log-out"></span> BACK </a>
		</button>
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-md-6">
						<h2>Quản lí <b>Hóa đơn</b></h2>
						<p style="margin-top: 10px; margin-bottom: 5px;">Searching result</p>
					</div>
					<div class="col-md-6">
						<a href="#addHoadonModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm</span></a>
						<a href="process.php?delete=<?php echo $row['id_hoa_don'];?>" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Xóa</span></a>						
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
						<th>Mã hóa đơn</th>
						<th>Mã admin</th>
						<th>Mã khách hàng</th>
						<th>Mã nicklol</th>
						<th>Ngày lập</th>
						<th>Thành tiền</th>
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
									<span class="custom-checkbox">
										<input type="checkbox" id="checkbox1" name="options[]" value="1">
										<label for="checkbox1"></label>
									</span>
								</td>
								<td><?php echo $i; ?></td>
								<td><?php echo $row['id_hoa_don']; ?></td>
								<td><?php echo $row['id_admin']; ?></td>
								<td><?php echo $row['id_khach_hang']; ?></td>
								<td><?php echo $row['id_nicklol']; ?></td>
								<td><?php echo $row['ngay_lap_hoa_don']; ?></td>
								<td><?php echo $row['thanh_tien']; ?></td>
								<td>
									<a href="edit.php?edit=<?php echo $row['id_hoa_don']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

									<a href="process.php?delete=<?php echo $row['id_hoa_don'];?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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

	<div id="addHoadonModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="process.php" method="POST" enctype="multipart/form-data">
					<div class="modal-header">                      
						<h4 class="modal-title">Thêm Hoadon</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">                 

						<div class="form-group">
							<label>id_admin</label>
							<input type="number" class="form-control" name="id_admin" required>
						</div>
						<div class="form-group">
							<label>id_khach_hang</label>
							<input type="number" class="form-control" name="id_khach_hang" required>
						</div>
						<div class="form-group">
							<label>id_nicklol</label>
							<input type="number" class="form-control" name="id_nicklol" required>
						</div>
						<div class="form-group">
							<label>ngay_lap_hoa_don</label>
							<input type="date" class="form-control" name="ngay_lap_hoa_don" required>
						</div>

						<div class="form-group">
							<label>thanh_tien</label>
							<input type="number" class="form-control" name="thanh_tien" required>
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