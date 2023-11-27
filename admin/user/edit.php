<?php
    require_once('../database/dbhelper.php');
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
            <a class="nav-link" href="category/index.php">Thống kê</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="category/index.php">Quản lý danh mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="product/">Quản lý sản phẩm</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="dashboard.php">Quản lý đơn hàng</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link active" href="../user/index.php">Quản lý Khách hàng</a>
        </li>
    </ul>
    <div class="container">
        <div class="panel panel-primary">
            <br><div class="panel-heading">
                <h2 class="text-center">Sửa người dùng</h2>
            </div><br>
            <div class="panel-body">
                <form action="" method="POST">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr style="font-weight: 500;text-align: center;">
                                <td width="70px">STT</td>
                                <td>Tên khách hàng</td>
                                <td>Tên đăng nhập</td>
                                <td>Email</td>
                                <td>Địa chỉ</td>
                                <td>Mật khẩu</td>
                                <td>Điện thoại</td>
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
                                        
                                    ';
                                }
                            } catch (Exception $e) {
                                die("Lỗi thực thi sql: " . $e->getMessage());
                            }
                            ?>
                        </tbody>
                    </table>
                    <a href="index.php" class="btn btn-warning">Back</a>
                </form>
                
            </div>
        </div>
    </div>
</body>

</html>