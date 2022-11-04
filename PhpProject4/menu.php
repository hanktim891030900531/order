<!DOCTYPE html>

<html>
    <head>
	<meta charset="UTF-8">
	<title>Menu</title>
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
            <table cellpadding="1" align="center">
                <?php
                    include('connect.php');
                    $sql = "SELECT * FROM `menu` ";
                    $results = mysqli_query( $conn, $sql);
                    if ($results->num_rows == 0){
                        echo "get menu: fail";
                        die();
                    }
                    $type = array("單點","套餐","點心","飲料");
                    $type_count = 0 ;
                    $last_type = 'A';
                    $item = 6;
                    $change_type = 0;
                    while ($result= mysqli_fetch_array($results,MYSQLI_BOTH)) {
                        if($last_type!=$result['product_id'][0] || $item == 6){

                            switch ($result['product_id'][0]) {
                                case 'A':
                                    $change_type = 0;
                                    break;
                                case 'B':
                                    $change_type = 1;
                                    break;
                                case 'C':
                                    $change_type = 2;
                                    break;
                                case 'D':
                                    $change_type = 3;
                                    break;
                            }
                            echo '<tr align="center">';
                                echo '<td colspan="6">';
                                    echo '<div class="text1"><h2>'.$type[$change_type].'<h2></div>';
                                echo '</td>';
                            echo '</tr>';
                            $last_type=$result['product_id'][0];
                            $item = 0;
                        }
                        if($item == 0){
                            echo '<tr align="center">';
                        }
                        echo '<td>';
                            echo '<div class="menu_gallery">';
                                echo '<img src="images/'.$result['name'].'.jpg" alt="'.$result['name'].'" width="200">';
                                    echo '<div class="text2">';
                                        echo '<h3>'.$result['name'].'</h3>';
                                        echo 'Calories: '. $result['calories'] .' cal<br>';
                                        echo 'Price: '. $result['price'] .' $';
                                    echo '</div>';
                                echo '<div class="text3">';
                                    echo '<form method="post" action="order_process.php">';
                                        echo '<input type="hidden" name="product_id" value="'.$result['product_id'].'">';
                                        echo '<input type="number" name="quantity" style="width:45px;height:20px" value="1" min="1">';
                                        echo '<input style="color:white;border:0px none;background-color:#e4002b;font-size:13pt;text-align:center;font-family:Microsoft JhengHei;margin_top: 2px" type="submit" name="op"  value="加到訂單">';
                                    echo '</form>';
                                echo '</div>';
                            echo '</div>';
                        echo '</td>';
                        $item++;
                        if($item == 6){
                            echo '</tr>';
                        }
                    }
                    mysqli_close($conn);
                ?>
            </table>
        </div>		
    </body>
</html>
