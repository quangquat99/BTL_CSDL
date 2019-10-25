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
        <a href="http://localhost/btl_CSDL/1.php"><span class="glyphicon glyphicon-log-out"></span> BACK </a>
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

                $sql = "SELECT * FROM acc_lol_chitiet";

                $result = mysqli_query($con,$sql);


                $total_records = mysqli_num_rows($result);


                        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 5;

                        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                        // tổng số trang
                $total_page = ceil($total_records / $limit);

                        // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page){
                    $current_page = $total_page;
                }
                else if ($current_page < 1){
                    $current_page = 1;
                }

                        // Tìm Start
                $start = ($current_page - 1) * $limit;


                $num_rows = mysqli_num_rows($result);
                $result = mysqli_query($con, "SELECT * FROM acc_lol_chitiet LIMIT $start, $limit");
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
                    while($row = mysqli_fetch_array($result) ) {
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
               <div class="pagination">
                <?php 
                        // PHẦN HIỂN THỊ PHÂN TRANG
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG

                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                if ($current_page > 1 && $total_page > 1){
                    echo '<li class="page-item"><a href="acc_lol.php?page='.($current_page-1).'">Prev</a></li>';
                }
                else {
                    echo '<li class="page-item disabled"><span>Prev</span></li>';
                }

                        // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++){
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                    if ($i == $current_page){
                        echo '<li class="page-item active"><span>'.$i.'</span></li>';
                    }
                    else{
                        echo '<li class="page-item"><a href="acc_lol.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
                    }
                }

                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1){
                    echo '<li class="page-item"><a href="acc_lol.php?page='.($current_page+1).'">Next</a></li>';
                }
                else {
                    echo '<li class="page-item disabled"><span>Next</span></li>';
                }
                ?>
                </div>
            </div>
        </div>

        <div class="searchdata clearfix" style="opacity: 0.8">
            <form action="search.php" method="POST">
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label>ten_nhan_vat</label>
                        <input type="text" class="form-control" name="txtten_nhan_vat" placeholder=""
                        value="<?php echo $ten_nhan_vat; ?>" >
                    </div>
                    <div class="form-group">
                        <label>so_luong_tuong</label>
                        <br>
                        <div class="col-md-6">
                            <p style="color: white; font-weight: bold;">Từ</p>
                            <span class=""><input type="number" min="0" class="form-control" name="txtso_luong_tuong_min" placeholder="" value="" ></span>
                        </div>
                        <div class="col-md-6">
                            <p style="color: white; font-weight: bold;">Đến</p>
                            <span class=""><input type="number" min="0" max="1000000" class="form-control" name="txtso_luong_tuong_max" placeholder="" value="" style="width: 200px"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>so_luong_trang_phuc</label>
                        <br>
                        <div class="col-md-6">
                            <p style="color: white; font-weight: bold;">Từ</p>
                            <span class=""><input type="number" min="0" class="form-control" name="txtso_luong_trang_phuc_min" placeholder="" value="" ></span>
                        </div>
                        <div class="col-md-6">
                            <p style="color: white; font-weight: bold;">Đến</p>
                            <span class=""><input type="number" min="0" max="1000000" class="form-control" name="txtso_luong_trang_phuc_max" placeholder="" value="" style="width: 200px"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Rank</label>
                        <select name="txtrank" placeholder=""
                        value="<?php echo $rank; ?>" style="margin-left: 100px;" >
                            <option value="">...</option>
                            <option value="đồng">Đồng</option>
                            <option value="bạc">Bạc</option>
                            <option value="vàng">Vàng</option>
                            <option value="bạch kim">Bạch kim</option>
                            <option value="kim cương">Kim cương</option>
                            <option value="cao thủ">Cao thủ</option>
                            <option value="thách đấu">Thách đấu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>trang_thai</label>
                        <select name="txttrang_thai" placeholder=""
                        value="<?php echo $trang_thai; ?>" style="margin-left: 66px;">
                            <option value="">...</option>
                            <option value="chưa bán">Chưa bán</option>
                            <option value="đã bán">Đã bán</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>gia_ban</label>
                        <br>
                        <div class="col-md-6">
                            <p style="color: white; font-weight: bold;">Từ</p>
                            <span class=""><input type="number" min="0" class="form-control" name="txtGia_min" placeholder="" value="" ></span>
                        </div>
                        <div class="col-md-6">
                            <p style="color: white; font-weight: bold;">Đến</p>
                            <span class=""><input type="number" min="0" max="10000000000000000" class="form-control" name="txtGia_max" placeholder="" value="" style="width: 200px"></span>
                        </div>
                    </div> 
                   
                    

                </div>
                <br>
                <input type="submit" class="btn btn-info btn-search" id="btn-search" name="search" value="Search">

            </form>     

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