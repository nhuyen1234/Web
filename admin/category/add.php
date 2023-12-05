<?php
header("content-type:text/html; charset=UTF-8");
?>
<?php
require_once('../database/dbhelper.php');
$id = $name = '';
if (!empty($_POST['name'])) {
    $name = '';
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $name = str_replace('"', '\\"', $name);
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (!empty($name)) {
        $created_at = $updated_at = date('Y-m-d H:s:i');
        // Lưu vào DB
        if ($id == '') {
            // Thêm danh mục
            $sql = 'insert into category(name, created_at,updated_at) 
            values ("' . $name . '","' . $created_at . '","' . $updated_at . '")';
        } 
        else {
            // Sửa danh mục
            $sql = 'update category set name="' . $name . '", updated_at="' . $updated_at . '" where id=' . $id;
        }
        execute_query($sql);
        header('Location: index.php');
        die();
    }
}



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'select * from category where id=' . $id;
    $category = executeSingleResult_query($sql);
    if ($category != null) {
        $name = $category['name'];
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm Danh Mục</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <ul class="nav nav-tabs">
    <li class="nav-item">
            <a class="nav-link" href="../index.php">Thống kê</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="index.php">Quản lý danh mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../product/">Quản lý sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../dashboard.php">Quản lý đơn hàng</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="../user/index.php">Quản lý người dùng</a>
        </li>
    </ul>
    <div class="container">
        <div class="panel panel-primary"><br>
            <div class="panel-heading">
                <h2 class="text-center">Thêm Danh Mục</h2>
            </div>
            <div class="panel-body">
                <form method="POST" id="categoryForm" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="name">Tên Danh Mục:</label>
                        <input type="text" id="id" name="id" value="<?= $id ?>" hidden='true'>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $name ?>">
                        <span id="nameError" style="color: red;"></span>
                    </div>
                    <button class="btn btn-success">Lưu</button>
                    <?php
                    $previous = "javascript:history.go(-1)";
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        $previous = $_SERVER['HTTP_REFERER'];
                    }
                    ?>
                    <a href="<?= $previous ?>" class="btn btn-warning">Back</a>
                </form>
            </div>
        </div>
    </div>
	<script type="text/javascript">
        function addProduct()
        {
            var option = confirm('Bạn thêm sản phẩm thành công')
            if (!option) {
                return;
            }
        }
    </script>
    <script type="text/javascript">
        function validateForm() {
            var name = document.getElementById('name').value;
            var nameError = document.getElementById('nameError');
            if (name.trim() === '') {
                nameError.innerHTML = 'Vui lòng nhập tên danh mục ';
                return false;
            } else {
                nameError.innerHTML = '';
            }

            return true;
        }
    </script>
</body>

</html>