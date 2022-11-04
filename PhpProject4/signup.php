<?php 
ob_start(); //打開緩沖區
header("Content-Type: text/html; charset=utf8");
session_start();

if(!isset($_POST['submit'])){
exit("錯誤執行");
}//判斷是否有submit操作
$name=$_POST['name'];//post獲取表單裡的name
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];//post獲取表單裡的password
if($name==null || $phone==null || $password==null){
    $_SESSION["member_state"] = 3 ;
    ob_end_flush();
    header("refresh:0;url=join_member.php");
    exit();
}
include('connect.php');//連結資料庫
$sql="insert into member(member_id,name,phone,email,password) values (null,'$name','$phone','$email','$password')";//向資料庫插入表單傳來的值的sql
if ($conn->query($sql) === TRUE){
    $_SESSION["member_state"] = 1 ;
    $conn->close();
    ob_end_flush();
    header("refresh:0;url=login_member.php");
}else{
    $_SESSION["member_state"] = 2 ;
    $conn->close();
    ob_end_flush();
    header("refresh:0;url=join_member.php");
}
?>