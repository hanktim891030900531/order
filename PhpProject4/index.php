<!DOCTYPE html>
<?php
    session_start();
    $member_state = 0;
    $_SESSION["member_state"]=$member_state;
?>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Homepage</title>
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
	<div class="homepage_title">
		<h1 style="color:white; font-size: 50px;margin: 0px;" align="center">歡迎光臨</h1>
                <h2 style="color:white; font-size: 30px;margin: 0px;" align="center">W e l c o m e</h2>
	</div>
</body>
</html>