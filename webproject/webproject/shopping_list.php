
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Palestine Store</title>
    <link rel="icon" href="244045494_4444413118973348_6341370727680401580_n.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="home-user.css">
    <link rel="stylesheet" href="list_style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="main_for_cart">
    <h1>My Shopping</h1>
    <div class="all_cart">
        <?php
        session_start();

        $db=new mysqli('localhost','root'
            ,'','project');
        if(isset($_GET['listid'])) {
            $id = $_GET['listid'];
            $iduser=$_GET['userid'];
            $store_id=$_GET['storeid'];
            $qryStr = "select * from `store-merc` where id='$id'";
            $res = $db->query($qryStr);
            if ($res) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $typ = $row['type'];
                    $colo = $row['color'];
                    $pri = $row['price'];
                    $pri_after = $row['price_after'];
                    $img = $row['img'];


                }
                $db->close();
                try {
                    $db = new mysqli('localhost', 'root', '', 'project');
                    $query = "INSERT INTO `shopping-list`(`Price`,`Discount`,`Type`,`Color`,`img`,`id_user`,`store_id`,`sales`) 
VALUES ('" . $pri . "','" . $pri_after . "','" . $typ . "','" . $colo . "','".$img."','".$iduser."','".$store_id."','Pending');";
                    $rs = $db->query($query);
                    $db->commit();
                    $db->close();
                    if($rs == 1) {
                        $db = new mysqli('localhost', 'root'
                            , '', 'project');
                        $qryStr = "select * from `shopping-list` where id_user='$iduser'";
                        $res = $db->query($qryStr);
                        if ($res) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $typ = $row['Type'];
                                $color = $row['Color'];
                                $price = $row['Price'];
                                $pri_aft = $row['Discount'];
                                $imge=$row['img'];
                                echo' <div class="cart_item">
            <div class="cart-img">
                <img src="image/'.$imge.'" alt="Product Image">
            </div>
            <div class="cart-info">
                        <p class = "type" style="font-weight: 600">Type: '.$typ.'</p><br>
                <p class = "type" style="font-weight: 600">Color: '.$color.'</p><br>
                <p class = "product-price" style="font-weight: 600">Price: '.$price.'NIS</p><br><br>
                <p class = "product-price" style="font-weight: 600;color: crimson">Price after discount: '.$pri_aft.'</p>
            </div>
            <span id="check6"><i class = "fa fa-check-square-o"></i></span>
            </div>
        ';
                            }
                        }
                    }
                    else{
                        echo '<script>alert("Image not Inserted into Database")</script>';

                    }
                } catch (Exception $exception) {

                }

            }
        }elseif (isset($_GET['carttid'])){
            $db = new mysqli('localhost', 'root', '', 'project');
            $id = $_SESSION['cartid'];
                $iduser = $_GET['userid'];
                $store_id = $_GET['storeid'];
                $qryStr = "select * from `cart` where id='$id'";
                $res = $db->query($qryStr);
                if ($res) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $typ = $row['Type'];
                        $colo = $row['Color'];
                        $pri = $row['Price'];
                        $pri_after = $row['Discount'];
                        $img = $row['img'];


                    }
                    $db->close();
                    try {
                        $db = new mysqli('localhost', 'root', '', 'project');
                        $query = "INSERT INTO `shopping-list`(`Price`,`Discount`,`Type`,`Color`,`img`,`id_user`,`store_id`,`sales`) 
VALUES ('" . $pri . "','" . $pri_after . "','" . $typ . "','" . $colo . "','" . $img . "','" . $iduser . "','" . $store_id . "','Pending');";
                        $rs = $db->query($query);
                        $db->commit();
                        $db->close();
                        if ($rs == 1) {
                            $db = new mysqli('localhost', 'root'
                                , '', 'project');
                            $qryStr = "select * from `shopping-list` where id_user='$iduser'";
                            $res = $db->query($qryStr);
                            if ($res) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $typ = $row['Type'];
                                    $color = $row['Color'];
                                    $price = $row['Price'];
                                    $pri_aft = $row['Discount'];
                                    $imge = $row['img'];
                                    echo ' <div class="cart_item">
            <div class="cart-img">
                <img src="image/' . $imge . '" alt="Product Image">
            </div>
            <div class="cart-info">
                        <p class = "type" style="font-weight: 600">Type: ' . $typ . '</p><br>
                <p class = "type" style="font-weight: 600">Color: ' . $color . '</p><br>
                <p class = "product-price" style="font-weight: 600">Price: ' . $price . 'NIS</p><br><br>
                <p class = "product-price" style="font-weight: 600;color: crimson">Price after discount: ' . $pri_aft . '</p>
            </div>
            <span id="check6"><i class = "fa fa-check-square-o"></i></span>
            </div>
        ';
                                }
                            }
                        } else {
                            echo '<script>alert("Image not Inserted into Database")</script>';

                        }
                    } catch (Exception $exception) {

                    }

                }
            }

        elseif (isset($_GET['userid'])) {
            $iduser=$_GET['userid'];
                        $db = new mysqli('localhost', 'root'
                            , '', 'project');
                        $qryStr = "select * from `shopping-list` where id_user='$iduser'";
                        $res = $db->query($qryStr);
                        if ($res) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $typ = $row['Type'];
                                $color = $row['Color'];
                                $price = $row['Price'];
                                $pri_aft = $row['Discount'];
                                $imge=$row['img'];
                                echo ' <div class="cart_item">
            <div class="cart-img">
                <img src="image/'.$imge.'" alt="Product Image">
            </div>
            <div class="cart-info">
                        <p class = "type" style="font-weight: 600">Type: ' . $typ . '</p><br>
                <p class = "type" style="font-weight: 600">Color: ' . $color . '</p><br>
                <p class = "product-price" style="font-weight: 600">Price: ' . $price . 'NIS</p><br><br>
                <p class = "product-price" style="font-weight: 600;color: crimson">Price after discount: ' . $pri_aft . '</p>
            </div>
            <span id="check6"><i class = "fa fa-check-square-o"></i></span>
            </div>
        ';
                            }
                        }
                    }


        ?>

        <?php
        $iduser=$_GET['userid'];
        echo '

</div>
<div class="side">
    <div class="side-icon">
        <h1><span class="lab la-pinterest"></span> Palestine Store</h1>
    </div>
    <div class="side-menu">
        <ul>
            <li>

                <a href="user_mainscreen.php?userid='.$iduser.'" class="active"><span class="lab la-buromobelexperte"></span>
                    <span>Home</span></a>
            </li>
            <li>
                <a href="home-user.php?userid='.$iduser.'"><span class="las la-store"></span>
                    <span>Shopping</span></a>
            </li>
            <li>
                <a href="cart.php?userid='.$iduser.'"><span class="las la-shopping-cart"></span>
                    <span>Cart</span></a>
            </li>
            <li>
                <a href=""><span class="las la-shopping-bag"></span>
                    <span>Shopping list</span></a>
            </li>
            <li class="bottom">
                <a href="test.php"><span class="las la-undo"></span>
                    <span>Log Out</span></a>
            </li>

        </ul>
    </div>
</div>' ?>

</body>
</html>