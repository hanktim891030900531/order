<?php
ob_start();
session_start();//啟動Session
unset($_SESSION["phone"]);//刪除指定SESSION
session_unset();//刪除全部SESSION
setcookie( "phone", "", time()-3600);
$_SESSION["member_state"]=0;
header("refresh:0;url=login_member.php");
ob_end_flush();
?>