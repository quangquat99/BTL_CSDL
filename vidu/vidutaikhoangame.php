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
	<link rel="stylesheet" type="text/css" href="vidutaikhoangame.css">
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
	<div class="container-fluid">
		<button type="button" class="btn btn-default btn-sm" >
			<a href="http://localhost/btl_CSDL/login.php"><span class="glyphicon glyphicon-log-out"></span> BACK </a>
		</button>
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-md-6">
						<h2>Quản lí <b>Tài khoản game</b></h2>
					</div>
					<div class="col-md-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>

			<table class="table table-striped table-hover clearfix">

				<?php 
				$con = mysqli_connect('127.0.0.1','root','','quanlyacclienminh') 
				or die ('Không thể kết nối tới database');
                mysqli_set_charset($con, 'UTF8');
				$sql = "SELECT * FROM acc_lol_chitiet";
				$result = mysqli_query($con,$sql);
				$num_rows = mysqli_num_rows($result);
				?>
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Mã nick</th>
						<th>Tên đăng nhập</th>
						<th>Mật khẩu</th>
						<th>Tên nhân vật</th>
						<th>Số lượng tướng</th>
                        <th>Số lượng trang phục</th>
						<th>Rank</th>
                        <th>Giá mua vào</th>
                        <th>Giá bán</th>
                        <th>Trạng thái</th>
                        <th>Mã admin mua vào    </th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if ($num_rows > 0 ) {
						while($row = mysqli_fetch_array($result) ) {
						?>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td><?php echo $row['id_nick_lol']; ?></td>
							<td><?php echo $row['ten_dang_nhap']; ?></td>
							<td><?php echo $row['mat_khau']; ?></td>
							<td><?php echo $row['ten_nhan_vat']; ?></td>
							<td><?php echo $row['so_luong_tuong']; ?></td>
							<td><?php echo $row['so_luong_trang_phuc']; ?></td>
                            <td><?php echo $row['rank']; ?></td>
                            <td><?php echo $row['gia_mua_vao']; ?></td>
                            <td><?php echo $row['gia_ban']; ?></td>
                            <td><?php echo $row['trang_thai']; ?></td>
                            <td><?php echo $row['id_admin_mua_vao']; ?></td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
						<?php
					}
				}
				?>
                </tbody>
            </table>

            <div class="clearfix">
            	<div class="hint-text"><?php echo "Showing <b>5</b> out of <b>$num_rows</b> entries"; ?></div>
            	<ul class="pagination">
            		<li class="page-item disabled"><a href="#">Previous</a></li>
            		<li class="page-item"><a href="#" class="page-link">1</a></li>
            		<li class="page-item"><a href="#" class="page-link">2</a></li>
            		<li class="page-item active"><a href="#" class="page-link">3</a></li>
            		<li class="page-item"><a href="#" class="page-link">4</a></li>
            		<li class="page-item"><a href="#" class="page-link">5</a></li>
            		<li class="page-item"><a href="#" class="page-link">Next</a></li>
            	</ul>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<form>
    				<div class="modal-header">						
    					<h4 class="modal-title">Add Employee</h4>
    					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				</div>
    				<div class="modal-body">					
    					<div class="form-group">
    						<label>id_khach_hang</label>
    						<input type="text" class="form-control" required>
    					</div>
    					<div class="form-group">
    						<label>ten_tai_khoan_dang_nhap</label>
    						<input type="text" class="form-control" required>
    					</div>
    					<div class="form-group">
    						<label>ten_khach_hang</label>
    						<input type="text" class="form-control" required>
    					</div>
    					<div class="form-group">
    						<label>SDT</label>
    						<input type="text" class="form-control" required>
    					</div>

    					<div class="form-group">
    						<label>Email</label>
    						<input type="email" class="form-control" required>
    					</div>
    					<div class="form-group">
    						<label>Số dư TK</label>
    						<input type="text" class="form-control" required>
    					</div>					
    				</div>
    				<div class="modal-footer">
    					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
    					<input type="submit" class="btn btn-success" value="Add">
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<form>
    				<div class="modal-header">						
    					<h4 class="modal-title">Edit Employee</h4>
    					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				</div>
    				<div class="modal-body">					
    					<div class="form-group">
    						<label>id_khach_hang</label>
    						<input type="text" class="form-control" required>
    					</div>
    					<div class="form-group">
    						<label>ten_tai_khoan_dang_nhap</label>
    						<input type="text" class="form-control" required>
    					</div>
    					<div class="form-group">
    						<label>ten_khach_hang</label>
    						<input type="text" class="form-control" required>
    					</div>
    					<div class="form-group">
    						<label>SDT</label>
    						<input type="text" class="form-control" required>
    					</div>

    					<div class="form-group">
    						<label>Email</label>
    						<input type="email" class="form-control" required>
    					</div>
    					<div class="form-group">
    						<label>Số dư TK</label>
    						<input type="text" class="form-control" required>
    					</div>			
    				</div>
    				<div class="modal-footer">
    					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
    					<input type="submit" class="btn btn-info" value="Save">
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<form>
    				<div class="modal-header">						
    					<h4 class="modal-title">Delete Employee</h4>
    					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				</div>
    				<div class="modal-body">					
    					<p>Are you sure you want to delete these Records?</p>
    					<p class="text-warning"><small>This action cannot be undone.</small></p>
    				</div>
    				<div class="modal-footer">
    					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
    					<input type="submit" class="btn btn-danger" value="Delete">
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
</body>
</html>                                		                            