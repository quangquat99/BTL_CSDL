<?php 

require_once 'process.php';

if(isset($_POST['search'])) {
	$ten_nhan_vat 		= $_POST['txtten_nhan_vat'];
	$rank 	= $_POST['txtrank'];
	$trang_thai 	= $_POST['txttrang_thai'];
	

	if(empty($_POST['txtso_luong_tuong_min'])) {
		$so_luong_tuong_min = 0;
	} else {
		$so_luong_tuong_min = $_POST['txtso_luong_tuong_min'];
	}
	if(empty($_POST['txtso_luong_tuong_max'])) {
		$so_luong_tuong_max = 10000;
	} else {
		$so_luong_tuong_max = $_POST['txtso_luong_tuong_max'];
	}

	if(empty($_POST['txtso_luong_trang_phuc_min'])) {
		$so_luong_trang_phuc_min = 0;
	} else {
		$so_luong_trang_phuc_min = $_POST['txtso_luong_trang_phuc_min'];
	}
	if(empty($_POST['txtso_luong_trang_phuc_max'])) {
		$so_luong_trang_phuc_max = 10000;
	} else {
		$so_luong_trang_phuc_max = $_POST['txtso_luong_trang_phuc_max'];
	}

	if(empty($_POST['txtGia_min'])) {
		$gia_min = 0;
	} else {
		$gia_min = $_POST['txtGia_min'];
	}
	if(empty($_POST['txtGia_max'])) {
		$gia_max = 10000000000000;
	} else {
		$gia_max = $_POST['txtGia_max'];
	}


	$sql = "SELECT * FROM acc_lol_chitiet WHERE 
	(ten_nhan_vat IS NOT NULL AND ten_nhan_vat LIKE '%$ten_nhan_vat%') AND
	(rank IS NOT NULL AND rank LIKE '%$rank%') AND
	(trang_thai IS NOT NULL AND trang_thai LIKE '%$trang_thai%') AND
	(so_luong_tuong BETWEEN '$so_luong_tuong_min' AND '$so_luong_tuong_max') AND
	(so_luong_trang_phuc BETWEEN '$so_luong_trang_phuc_min' AND '$so_luong_trang_phuc_max') AND
	(gia_ban BETWEEN '$gia_min' AND '$gia_max')
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
	<link rel="stylesheet" type="text/css" href="acc_lol.css">
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
        <a href="http://localhost/btl_CSDL/acc_lol/acc_lol.php"><span class="glyphicon glyphicon-log-out"></span> BACK </a>
        </button>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Quản lí <b>Tài khoản LOL</b></h2>
                    </div>
                    <div class="col-md-6">
                        <a href="#addAcc_lolModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm</span></a>
                        <a href="process.php?delete=<?php echo $row['id_nick_lol'];?>" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Xóa</span></a>						
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
                    <th>Mã nick lol</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Tên nhân vật</th>
                    <th>Số lượng tướng</th>
                    <th>Số lượng trang phục</th>
                    <th>Rank</th>
                    <th>Giá bán</th>
                    <th>Trạng thái</th>
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
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['id_nick_lol']; ?></td>
                            <td><?php echo $row['ten_dang_nhap']; ?></td>
                            <td><?php echo $row['mat_khau']; ?></td>
                            <td><?php echo $row['ten_nhan_vat']; ?></td>
                            <td><?php echo $row['so_luong_tuong']; ?></td>
                            <td><?php echo $row['so_luong_trang_phuc']; ?></td>
                            <td><?php echo $row['rank']; ?></td>
                            <td><?php echo $row['gia_ban']; ?></td>
                            <td><?php echo $row['trang_thai']; ?></td>
                            <td>
                            <a href="edit.php?edit=<?php echo $row['id_nick_lol']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="process.php?delete=<?php echo $row['id_nick_lol'];?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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

    <div id="addAcc_lolModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="process.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Thêm Account</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                 

                        <div class="form-group">
                            <label>ten_dang_nhap</label>
                            <input type="text" class="form-control" name="ten_dang_nhap" required>
                        </div>
                        <div class="form-group">
                            <label>mat_khau</label>
                            <input type="text" class="form-control" name="mat_khau" required>
                        </div>
                        <div class="form-group">
                            <label>ten_nhan_vat</label>
                            <input type="text" class="form-control" name="ten_nhan_vat" required>
                        </div>
                        <div class="form-group">
                            <label>so_luong_tuong</label>
                            <input type="number" class="form-control" name="so_luong_tuong" required>
                        </div>

                        <div class="form-group">
                            <label>so_luong_trang_phuc</label>
                            <input type="number" class="form-control" name="so_luong_trang_phuc" required>
                        </div>
                        <div class="form-group">
                            <label>Rank</label>
                            <select name="rank" class="form-control">
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
                            <input type="number" class="form-control" name="gia_ban" required>
                        </div>
                        <div class="form-group">
                            <label>trang_thai</label>
                            <select name="trang_thai" class="form-control">
                                <option value="chưa bán">Chưa bán</option>
                                <option value="đã bán">Đã bán</option>
                            </select>
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