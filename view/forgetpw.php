<?php
require_once('database/dbhelper.php');
$sql = "select * from tbl_dangky";
$result = execute($sql);
if(isset($_SESSION['submit'])){
    $msg = "Mật khẩu của bạn là:".$result['matkhau'];
    $msg = wordwrap($msg,70);
    mail("".$result['email'], "My subject",$msg);
}
?>