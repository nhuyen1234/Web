<?php
require_once('config.php');

function execute_query($sql)
{
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($con, 'UTF8');
	//insert, update, delete
	mysqli_query($con, $sql);

	//close connection
	mysqli_close($con);
}

function executeResult_query($sql)
{
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  	mysqli_set_charset($con, 'UTF8');
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$data   = [];
	while ($row = mysqli_fetch_array($result, 1)) {
		$data[] = $row;
	}

	//close connection
	mysqli_close($con);

	return $data;
}

function executeSingleResult_query($sql)
{
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  	mysqli_set_charset($con, 'UTF8');
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$row    = mysqli_fetch_array($result, 1);

	//close connection
	mysqli_close($con);

	return $row;
}


// if(isset($_GET['id_dangky'])){
// 	$id = $_GET['id_dangky'];
// }

// if(isset($_GET['tendangnhap'])){
//     $tendangnhap = $_GET['tendangnhap'];
// }
// if(isset($_GET['tenkhachhang'])){
//     $tenkhachhang = $_GET['tenkhachhang'];
// }
// if(isset($_GET['matkhau'])){
//     $matkhau = $_GET['matkhau'];
// }
// if(isset($_GET['email'])){
//     $email = $_GET['email'];
// }
// if(isset($_GET['diachi'])){
//     $diachi = $_GET['diachi'];
// }
// if(isset($_GET['dienthoai'])){
//     $dienthoai = $_GET['dienthoai'];
// }

$id = $tendangnhap = $tenkhachhang = $matkhau = $email = $diachi = $dienthoai = "";

if(isset($_GET['id_dangky'])) {
	$id = $_GET['id_dangky'];
	echo $id;
	$sql = "SELECT * FROM `tbl_dangky` WHERE `id_dangky` = '$id'" ;
	$user = execute_query($sql);
	var_dump($user) ;
	if(!empty($user)) {
		$tenkhachhang = $user['tenkhachhang'];
		$tendangnhap = $user['tendangnhap'];
		$matkhau = $user['matkhau'];
		$email = $user['email'];
		$diachi = $user['diachi'];
		$dienthoai = $user['dienthoai'];
		echo $tenkhachhang ;
	}
}
if (!empty($tendangnhap)) {
	var_dump($id);
	if (!empty($id)) {
		$sql = 'UPDATE tbl_dangky set tenkhachhang = "'.$tenkhachhang.'", tendangnhap = "'.$tendangnhap.'", email = "'.$email.'", diachi = "'.$diachi.'", matkhau = "'.$matkhau.'", dienthoai = "'.$dienthoai.'" where id_dangky=' . $id;
	}
	else {
		$sql = 'INSERT into tbl_dangky(tenkhachhang, tendangnhap, email, diachi, matkhau, dienthoai) 
		values ("' . $tenkhachhang . '","' . $tendangnhap . '","' . $email . '","' . $diachi . '","' . $matkhau . '","' . $dienthoai . '")'; 
	}
	execute_query($sql);
	// header('Location: index.php');
	// die();
	}