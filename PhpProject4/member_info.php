<!DOCTYPE html>

<html>
    <head>
	<meta charset="UTF-8">
	<title>Member</title>
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
			<h1>會員資料</h1>
		</div>
                <?php
                    session_start();
                    include('connect.php');//連結資料庫
                    $phone = $_SESSION['phone'];
                    $member = $conn->query("SELECT * FROM `member` WHERE `phone` = '$phone' ");
                    $member = mysqli_fetch_array($member,MYSQLI_ASSOC);
                    $name = $member['name'];
                    $email = $member['email'];
                ?>
                    <div class="info_gallery">
                            <div class="member_info">
                                    <label>姓名(Full Name):</label><br>
                                    <?php
                                        echo $name;
                                    ?>
                                    <br>
                            </div>
                    </div>
                    <div class="info_gallery">
                            <div class="member_info">
                                    <label>電話號碼(Phone Number):</label><br>
                                    <?php
                                        echo $phone;
                                    ?>
                                    <br>
                            </div>
                    </div>
                    <div class="info_gallery">
                            <div class="member_info">
                                    <label>電子信箱(Email Address):</label><br>
                                    <?php
                                        echo $email;
                                    ?>
                                    <br>
                            </div>
                    </div>
                <div class="big_button">
                    <form method="post" action="order_history.php">
                        <button class="big_button" style="background-color:#F58C2A;text-align:center;font-family:Microsoft JhengHei;"  value="歷史訂單" >歷史訂單</button>
                    </form>
                    <button class="big_button" style="text-align:center;font-family:Microsoft JhengHei;" onclick="Logout()"  value="登出" >登出</button>
                </div>
	</div>
</body>
</html>
<script language="javascript">
    function Logout() {
        window.location.href='logout.php';
    }
</script>
