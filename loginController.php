<?php 
	// GET INFORMATION 
	$username = $_POST["textUsername"];
	$password = $_POST["textPassword"];
	
	// CONNECT MYSQL
	$con = mysqli_connect('127.0.0.1','root','','quanlyacclienminh') 
			or die ('Không thể kết nối tới database');
	$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = mysqli_query($con,$sql);

	/*print "result: " . json_encode($result);*/
	// print "result: " . $result->lengths != null;
	$num_rows = mysqli_num_rows($result);
	if ($num_rows > 0) {
		header("location: 1.php");

		// while ($row = mysqli_fetch_array($result)) {
		// 	# code...
		// 	echo "
		// 	<table border = 1>
		// 		<caption>Bang tai khoan</caption>
		// 		<thead>
		// 			<tr>
		// 				<th>id_admin</th>
		// 				<th>username</th>
		// 				<th>password</th>
		// 				<th>SDT</th>
		// 			</tr>
		// 		</thead>
		// 		<tbody>
		// 			<tr>
		// 				<td>$row[id_admin]</td>
		// 				<td>$row[username]</td>
		// 				<td>$row[password]</td>
		// 				<td>$row[SDT]</td>
		// 			</tr>
		// 		</tbody>
		// 	</table>
		// 	";

		// }	
	}
	else  {
		# code...
		header("location: login.php");
		/*echo 	'<script language="javascript">;
				alert("Sai tài khoản hoặc mật khẩu");
				</script>';*/
	
		// echo 	'<script language="javascript">;
		// 			 document.getElementById("msgError").style.display = "inline-block";
		// 		</script>';
	}
	
 ?>