<?php
include('connect.php');
session_start();
if($_SESSION["member_state"]!=4){
    header("refresh:0;url=login_member.php");
    exit();
}
$product_id = $_POST['product_id'];
if($_POST['op']=='+'){
    $quantity = 1; 
}else if($_POST['op']=='-'){
    $quantity = -1;
}else{
    $quantity = $_POST['quantity'];
}
mysqli_query($conn, 'SET NAMES \'utf8\'');
$phone = $_SESSION['phone'];
$member_id = mysqli_query( $conn, "SELECT `member_id` FROM `member` WHERE `phone` = '$phone' ");
$member_id = mysqli_fetch_array($member_id,MYSQLI_ASSOC);
$member_id = $member_id['member_id'];
$sql = "SELECT * FROM allorder WHERE `member_id` = '$member_id' AND `product_id` = '$product_id' AND `is_locked`= 0 ";
$result = mysqli_query( $conn, $sql);
if($result->num_rows > 0){
  $current_quantity=mysqli_query( $conn, "SELECT `quantity` FROM `allorder` WHERE `member_id` = '$member_id' AND `product_id` = '$product_id' AND `is_locked`= 0 ");
  $current_quantity=mysqli_fetch_array($current_quantity,MYSQLI_ASSOC);
  if($current_quantity['quantity']<=1 && $quantity ==-1){
      mysqli_query( $conn, "DELETE  FROM `allorder` WHERE `member_id` = '$member_id' AND `product_id` = '$product_id' AND `is_locked`= 0 ");
  }else{
    $temp = $current_quantity['quantity']+$quantity;
    $result = mysqli_query( $conn, "UPDATE `allorder` SET `quantity`= '$temp' WHERE `member_id` = '$member_id' AND `product_id` = '$product_id' AND `is_locked`= 0 ");
    if(! $result ){
          echo $current_quantity['quantity'];
          die('新增失敗');
    }
  }
}else{
    $sql = "INSERT INTO allorder (order_id,member_id, product_id, quantity,is_locked) VALUES (null,'$member_id', '$product_id', '$quantity', 0)";
    $result = mysqli_query( $conn, $sql);
    if(!$result ){
        echo $current_quantity['quantity'];
        die('新增失敗');
   }
}
if($_POST['op']=='+' || $_POST['op']=='-'){
    header("refresh:0;url=order.php");
}else{
    header("refresh:0;url=menu.php");
}
mysqli_close($conn);
exit();
?>

