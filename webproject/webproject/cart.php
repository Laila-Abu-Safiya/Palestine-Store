
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Palestine Store</title>
    <link rel="icon" href="244045494_4444413118973348_6341370727680401580_n.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="home-user.css">
    <link rel="stylesheet" href="cartstyle.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="main_for_cart">
    <h1>My Cart</h1>
    <?php
    session_start();
    $db=new mysqli('localhost','root'
        ,'','project');
    if(isset($_GET['cartid']) ) {
        $id = $_GET['cartid'];
        $iduser=$_GET['userid'];
        $store_id=$_GET['storeid'];
        $qryStr = "select * from `store-merc` where id='$id'";
        $res = $db->query($qryStr);
        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $_SESSION['cartid']=$id;
                $typ = $row['type'];
                $colo = $row['color'];
                $pri = $row['price'];
                $pri_after = $row['price_after'];
                $img = $row['img'];
                //$image=addslashes(file_get_contents($_FILES[$image]["tmp_name"]));
                //echo $img;

            }
            $db->close();
            try {
                $db = new mysqli('localhost', 'root', '', 'project');
                $query = "INSERT INTO `cart`(`Price`,`Discount`,`Type`,`Color`,`img`,`id_user`) 
VALUES ('" . $pri . "','" . $pri_after . "','" . $typ . "','" . $colo . "','".$img."','".$iduser."');";
                $rs = $db->query($query);
                $db->commit();
                $db->close();
                if($rs == 1) {
                    $db = new mysqli('localhost', 'root'
                        , '', 'project');
                    $qryStr = "select * from `cart` where id_user='$iduser'";
                    $res = $db->query($qryStr);
                    if ($res) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $typ = $row['Type'];
                            $color = $row['Color'];
                            $price = $row['Price'];
                            $pri_aft = $row['Discount'];
                            $imge=$row['img'];
                            $store_id=$row['id_user'];
                            echo '
                                 <div class="cart_item" style="position: relative; left: 10%; top: 10%; width: 80%;">
            <div class="cart-img">
                   <img src="image/'.$imge.'" style="height: 200px;width: 200px" alt = "product image">

            </div>
            <div class="cart-info">
                <p class = "type" style="font-weight: 600">Type: &nbsp '.$typ.'</p><br>
                <p class = "type" style="font-weight: 600">Color &nbsp '.$color.'</p><br>
                    <p class = "product-price" style="font-weight: 600">Price &nbsp '.$price.'NIS</p><br><br>         
                        <p class = "product-price" style="font-weight: 600;color: crimson">Price after discount: '.$pri_aft.'</p>

            </div>
            <button type = "button" class = "btn-cart"> 
                <span><i class = "fas fa-plus"></i></span><a href="shopping_list.php?cartid='.$_SESSION['cartid'].'& userid='.$iduser.'& storeid='.$store_id.'" style="color: white; text-decoration: none">Buy
            </button>
            <button type = "button" class = "btn-buy">
                <span><i class = "fas fa-trash"></i></span><a href="delete.php?cartid='.$id.' & userid='.$iduser.'" style="color: black; text-decoration: none;">Cancel
            </button>
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
    }
    elseif (isset($_GET['userid'])) {
        $iduser=$_GET['userid'];
            try {
                    $db = new mysqli('localhost', 'root'
                        , '', 'project');
                    $qryStr = "select * from `cart` where id_user='$iduser'";
                    $res = $db->query($qryStr);
                    if ($res) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $idc=$row['id'];
                            $typ = $row['Type'];
                            $color = $row['Color'];
                            $price = $row['Price'];
                            $pri_aft = $row['Discount'];
                            $imge=$row['img'];
                            $store_id=$row['id_user'];
                            echo '
                                 <div class="cart_item" style="position: relative; left: 10%; top: 10%; width: 80%;">
            <div class="cart-img">
                   <img src="image/'.$imge.'" style="height: 200px;width: 200px" alt = "product image">

            </div>
            <div class="cart-info">
                <p class = "type" style="font-weight: 600">Type: &nbsp ' . $typ . '</p><br>
                <p class = "type" style="font-weight: 600">Color &nbsp ' . $color . '</p><br>
                    <p class = "product-price" style="font-weight: 600">Price &nbsp ' . $price . 'NIS</p><br><br>         
                        <p class = "product-price" style="font-weight: 600;color: crimson">Price after discount: ' . $pri_aft . '</p>

            </div>
            <button type = "button" class = "btn-cart">
                <span><i class = "fas fa-plus"></i></span><a href="shopping_list.php?cartid='.$idc.'& userid='.$iduser.'& storeid='.$store_id.'" style="color: white; text-decoration: none">Buy</a>
            </button>
            <button type = "button" class = "btn-buy"><a href="delete.php?cartid='.$idc.' & userid='.$iduser.'" style="color: black; text-decoration: none;">Cancel
                <span><i class = "fas fa-trash"></i></span>
            </button>
        </div>       
              
                        
                        ';
                        }
                    }
                    }catch (Exception $exception) {

            }


    }

    ?><?php
    $iduser=$_GET['userid'];
    echo '
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
                <a href=""><span class="las la-shopping-cart"></span>
                    <span>Cart</span></a>
            </li>
            <li>
                <a href="shopping_list.php?userid='.$iduser.'"><span class="las la-shopping-bag"></span>
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