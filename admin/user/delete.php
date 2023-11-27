<?php
    require_once ('../database/dbhelper.php');
    if(isset($_GET['id_dangky'])){
        $id = $_GET['id_dangky'];
        $sql = 'delete from tbl_dangky where id_dangky='.$id;
        execute_query($sql);
    }
    header('location: index.php');
    
?>