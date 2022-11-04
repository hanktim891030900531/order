<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_COOKIE["phone"]) || !isset($_SESSION['phone']))
    {
        $_SESSION["member_state"]=7;
        header("refresh:0;url=login_member.php");
        exit();
    }
?>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Order</title>
        <link rel="stylesheet" href="web_style.css">
    </head>
<body>
	<div class="colorblock1">
		<div class="text1">
			<a href="index.php" style="color:white;text-decoration:none;">首頁</a>
			<a href="menu.php" style="color:white;text-decoration:none">菜單</a>
			<a href="order.php" style="color:white;text-decoration:none">訂單</a>
			<a href="login_member.php" style="color:white;text-decoration:none">會員</a>
		</div>
	</div>
	<div class="background1">
		<img class="img-width" src="images/background.jpg"alt="">
	</div>
	<div class="colorblock2">
            <div class="text1">
                <h1>歷史訂單</h1>
                <table style="border:3px black solid;border-collapse:collapse;" align="center"  cellpadding="10" border='1' bgcolor="white"  ;>
                    <tr  style="border:3px black solid;border-collapse:collapse;">
                        <th>訂單號</th>
                        <th>餐點名稱</th>
                        <th>單價</th>
                        <th>數量</th>
                        <th>品項總價</th>
                        <th>品項總卡路里</th>
                    </tr>
                    <?php
                        $total_price =0;
                        $total_c =0;
                        $conn = mysqli_connect('localhost','root','','ordersystem','3306');
                        if ( !$conn) { // Check connection
                            die( 'Failed to connect to MySQL: ' . mysqli_connect_error());
                        }
                        mysqli_query($conn, 'SET NAMES \'utf8\'');
                        $phone = $_SESSION['phone'];
                        $member_id = mysqli_query( $conn, "SELECT `member_id` FROM `member` WHERE `phone` = '$phone' ");
                        $member_id = mysqli_fetch_array($member_id,MYSQLI_ASSOC);
                        $member_id = $member_id['member_id'];
                        $sql = "SELECT * FROM allorder WHERE `member_id` = '$member_id' AND `is_locked`= 1 ";
                        $result = mysqli_query( $conn, $sql);
                        $result = mysqli_fetch_all($result);
                        foreach ($result as $key => $record) {
                            echo '<tr>';
                            foreach ($record as $key => $value) {
                                if($key==1){
                                    echo '<td>'.$record[0].'</td>';
                                }else if($key==2){
                                    $sql = "SELECT `name` FROM `menu` WHERE `product_id` = '$record[2]'";
                                    $name_result = mysqli_query( $conn, $sql);
                                    $name_result = mysqli_fetch_all($name_result);
                                    echo '<td>'.$name_result[0][0].'</td>';
                                }else if($key==3){
                                    $sql = "SELECT * FROM `menu` WHERE `product_id` = '$record[2]'";
                                    $price_result = mysqli_query( $conn, $sql);
                                    $price_result = mysqli_fetch_all($price_result);
                                    echo '<td>'.$price_result[0][3].'</td>';
                                    echo '<td>'.$value.'</td>';
                                    echo '<td>'.$price_result[0][3]*$value.'</td>';
                                    echo '<td>'.$price_result[0][2]*$value.'</td>';
                                    $total_price +=($price_result[0][3]*$value);
                                    $total_c +=($price_result[0][2]*$value);
                                }
                            }
                            echo '</tr>';
                        }
                        
                        echo '<td colspan="3">總金額: '.$total_price.' 元</td>';
                        echo '<td colspan="3">總卡路里: '.$total_c.' 卡</td>';
                        mysqli_close($conn);
                    ?>
                </table>
                
            </div>
	</div>
</body>
</html>