<!DOCTYPE html>

<html>
    <head>
	<meta charset="UTF-8">
	<title>Signup</title>
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
			<h1>加入會員</h1>
		</div>
                <?php
                    session_start();
                    if($_SESSION["member_state"] == 2){
                        echo '<p class="sub_title">電話號碼已被註冊，請重新填寫或 <a style="color:#e4002b;text-decoration:none;" href="login_member.php">登入</a></p>';
                    }else if($_SESSION["member_state"] == 3){
                        echo '<p class="sub_title">*項目為必填，請重新填寫或 <a style="color:#e4002b;text-decoration:none;" href="login_member.php">登入</a></p>';
                    }else{
                        echo '<p class="sub_title">已經是會員嗎? <a style="color:#e4002b;text-decoration:none;" href="login_member.php">登入</a></p>';
                    }
                ?>
                <form method="post" action="signup.php">
                    <div class="login_gallery">
                            <div class="login_text">
                                    <label>*姓名(Full Name):</label><br>
                                    <input class="login_input" type="text"  name="name"><br>
                            </div>
                    </div>
                    <div class="login_gallery">
                            <div class="login_text">
                                    <label>*電話號碼(Phone Number):</label><br>
                                    <input class="login_input" type="text"  name="phone"><br>
                            </div>
                    </div>
                    <div class="login_gallery">
                            <div class="login_text">
                                    <label>電子信箱(Email Address):</label><br>
                                    <input class="login_input" type="text" name="email"><br>
                            </div>
                    </div>
                    <div class="login_gallery">
                            <div class="login_text">
                                    <label>*密碼(Password):</label><br>
                                    <input class="login_input" type="text" name="password"><br>
                            </div>
                    </div>
                    <div class="big_button">
                            <button class="big_button" type="submit" name="submit" value="註冊" >送出</button>
                    </div>
                </form>
	</div>
</body>
</html>
