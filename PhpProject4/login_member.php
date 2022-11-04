<!DOCTYPE html>
<?php
    session_start();
    if(isset($_COOKIE["phone"]) && isset($_SESSION['phone']))
    {
        $_SESSION["member_state"] = 4;
        header("refresh:0;url=member_info.php");
        exit(); 
    }
?>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Login</title>
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
                    <h1>會員登入</h1>
            </div>
            <?php
                if($_SESSION["member_state"] == 7){
                    echo '<p class="sub_title"">請先登入會員，才能查看訂單</p>';
                    $_SESSION["member_state"] = 0;
                }
                if($_SESSION["member_state"] == 1){
                    echo '<p class="sub_title">註冊成功，請登入或重新 <a style="color:#e4002b; font-weight:bold;font-size:30px;text-decoration:none" href="join_member.php">註冊</a></p>';
                }else if($_SESSION["member_state"] == 5){
                    echo '<p class="sub_title">錯誤的電話號碼或密碼，請重新填寫或 <a style="color:#e4002b; font-weight:bold;font-size:30px;text-decoration:none" href="join_member.php">註冊</a></p>';
                }else if($_SESSION["member_state"] == 6){
                    echo '<p class="sub_title">登入訊息不完整，請重新填寫或 <a style="color:#e4002b; font-weight:bold;font-size:30px;text-decoration:none" href="join_member.php">註冊</a></p>';
                }else{
                    echo '<p class="sub_title">還不是會員嗎? <a style="color:#e4002b; font-weight:bold;font-size:30px;text-decoration:none" href="join_member.php">註冊</a></p>';
                }
            ?>
            <form method="post" action="login.php">
                <div class="login_gallery">
                        <div class="login_text">
                                <label>電話號碼(Phone Number):</label><br>
                                <input class="login_input" type="text" name="phone" ><br>
                        </div>
                </div>
                <div class="login_gallery">
                        <div class="login_text">
                                <label>密碼(Password):</label><br>
                                <input class="login_input" type="text" name="password"><br>
                        </div>
                </div>
                <div class="big_button">
                    <button class="big_button" type="submit" name="submit" value="登入" >登入</button>
                </div>
            </form>
	</div>
</body>
</html>
