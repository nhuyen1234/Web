<?php
    require_once('../database/dbhelper.php');
    // $id = $tendangnhap = $tenkhachhang = $matkhau = $email = $diachi = $dienthoai = "";
    
    
        if(isset($_GET['id_dangky'])) {
            $id = $_GET['id_dangky'];
            $sql = "select * from tbl_dangky where id_dangky=".$id;
            $user = execute_query($sql);
            if($user != null) {
                $tenkhachhang = $user['tenkhachhang'];
                $tendangnhap = $user['tendangnhap'];
                $matkhau = $user['matkhau'];
                $email = $user['email'];
                $diachi = $user['diachi'];
                $dienthoai = $user['dienthoai'];
            }
        }
        if (!empty($tendangnhap)) {
            if ($id !== '') {
                $sql = 'update tbl_dangky set tenkhachhang = '.$tenkhachhang.', tendangnhap = '.$tendangnhap.', matkhau = '.$matkhau.', email = '.$email.', diachi = '.$diachi.', dienthoai = '.$dienthoai.' where id_dangky=' . $id;
                
            } else {
                $sql = 'insert into tbl_dangky(tenkhachhang, tendangnhap, email, diachi, matkhau, dienthoai) 
                values ("' . $tenkhachhang . '","' . $tendangnhap . '","' . $matkhau . '","' . $email . '","' . $diachi . '","' . $dienthoai . '")';
               
            }
            execute_query($sql);
            // header('Location: index.php');
            // die();
        }
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thêm Người Dùng</title>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- summernote -->
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="../category/index.php">Thống kê</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../category/index.php">Quản lý danh mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../product/">Quản lý sản phẩm</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="../dashboard.php">Quản lý đơn hàng</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link active" href="../user/index.php">Quản lý người dùng</a>
        </li>
    </ul>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Sửa người dùng</h2>
            </div>
            <div class="panel-body">
                <form method="POST">
                    <div class="form-group">
                        <label>Tên người dùng:</label>
                        <input type="hidden" name="id_dangky" value="<?= $id ?>">
                        <input type="text" class="form-control" name="tenkhachhang" value="<?=$tenkhachhang?>">
                    </div>
                    <div class="form-group">
                        <label>Tên đăng nhập:</label>
                        <input type="text" class="form-control" name="tendangnhap" value="<?= $tendangnhap ?>">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu:</label>
                        <input type="text" class="form-control" name="matkhau" value="<?= $matkhau ?>">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" value="<?= $email ?>">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ:</label>
                        <input type="text" class="form-control" name="diachi" value="<?= $diachi ?>">
                    </div>
                    <div class="form-group">
                        <label>Điện thoại:</label>
                        <input type="text" class="form-control" name="dienthoai" value="<?= $dienthoai ?>">
                    </div>
                    <button class="btn btn-success" onclick="submitUser($id)">Lưu</button>
                    <a href="<?= $previous ?>" class="btn btn-warning">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>