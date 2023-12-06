<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php 
    require_once('../database/dbhelper.php');

   
?>
<!DOCTYPE html>
<html>

<head>
    <title>Quản lý Khách hàng</title>
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
    <scrip src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- summernote -->
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <scrip src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="../index.php">Thống kê</a>
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
            <br>
            <div class="panel-heading">
                <h2 class="text-center">Quản lý Người Dùng</h2>
            </div>
            <br>
            <table class="table table-bordered table-hover" style="text-align:center">
                <thead>
                    <tr style="font-weight: 500;">
                        <td width="70px">STT</td>
                        <td>Tên Ngươì dùng</td>
                        <td>Tên đăng nhập</td>
                        <td>Email</td>
                        <td>Địa chỉ</td>
                        <td>Mật khẩu</td>
                        <td>Điện thoại</td>
                        <td>Thao tác</td>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try {
                            if (isset($_GET['id_dangky'])) {
                                $id_dangky = $_GET['id_dangky'];
                            }
                            $count = 0;
                            $sql = "SELECT * from tbl_dangky";
                            $signin_details_List = executeResult_query($sql);
                            foreach ($signin_details_List as $item) {
                                echo '
                                    <tr style="text-align: center;">
                                        <td width="50px">' . (++$count) . '</td>
                                        <td>' . $item['tenkhachhang'] . '</td>
                                        <td>' . $item['tendangnhap'] .'</td>
                                        <td>' . $item['email'] . '</td>
                                        <td>' . $item['diachi'] . '</td>
                                        <td>' . $item['matkhau'] .'</td>
                                        <td>' . $item['dienthoai'] .'</td>
                                        <td>            
                                            <a href="delete.php?id_dangky='.$item['id_dangky'].'" class="btn btn-danger" >Xoá</a>
                                        </td>
                                    </tr>
                                ';
                            }
                        } catch (Exception $e) {
                            die("Lỗi thực thi sql: " . $e->getMessage());
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>