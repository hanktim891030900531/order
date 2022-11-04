<?php
include('connect.php');
session_start();
$phone = $_SESSION['phone'];
$member_id = mysqli_query( $conn, "SELECT `member_id` FROM `member` WHERE `phone` = '$phone' ");
$member_id = mysqli_fetch_array($member_id,MYSQLI_ASSOC);
$member_id = $member_id['member_id'];
$sql = "UPDATE `allorder` SET `is_locked`=1 WHERE `member_id` = $member_id AND `is_locked` = 0";
$result = mysqli_query( $conn, $sql);
if(!$result ){
        echo $current_quantity['quantity'];
        die('鎖定失敗');
}
header("refresh:0;url=order_history.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

