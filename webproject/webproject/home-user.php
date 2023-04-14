<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Palestine Store</title>
    <link rel="icon" href="244045494_4444413118973348_6341370727680401580_n.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="home-user.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>
<body>
<div class = "products">
    <div class = "container">
        <h1 class = "lg-title">Shopping</h1>
        <form method="post" action="home-user.php">
            <div class="selectdiv">
                <label>
                    <select name="select">
                        <option selected> </option>
                        <option>Home</option>
                        <option>Clothes</option>
                        <option> Accessories</option>
                        <option> Protective equipment</option>
                        <option> Electronics</option>
                        <option> Sport</option>
                    </select>
                </label>
            </div>
            <input type="text"  placeholder="Type..." name="search">
            <input type="submit" name="submitsearch" value="Search">
        </form>
        <div class="product-item2">
<?php
session_start();
$iduser=$_SESSION['id'];
$con = new mysqli('localhost', 'root', '', 'project');
if (($con->connect_error)) {
    die("Connection field: " . $con->connect_error);
}
if(isset($_POST['search']) || isset($_POST['submitsearch'])){
    $filter = $_POST['search'];
    $query = "select * from `store-merc` where (type = '$filter') OR (color = '$filter')";
    $query_run = mysqli_query($con, $query);
    if(mysqli_num_rows($query_run) > 0){
        while ($row=mysqli_fetch_assoc($query_run)){
            $id=$row['id'];
            $typ=$row['type'];
            $num=$row['number'];
            $colo=$row['color'];
            $pri=$row['price'];
            $pri_after=$row['price_after'];
            $store_id=$row['id_user'];
            $img=$row['img'];
            echo '
                        <div class = "product" >
                <div class = "product-content">
                    <div class = "product-img">
                        <img src="image/'.$img.'" style="height: 250px;width: 200px" alt = "product image">
                    </div>
                    <div class = "product-btns">
                        <button type = "button" class = "btn-cart"> 
                            <span><i class = "fas fa-plus"></i></span><a href="cart.php?cartid='.$id.'& userid='.$iduser.'& storeid='.$store_id.'" style="color: white; text-decoration: none">add to cart</a>
                        </button>
                        <button type = "button" class = "btn-buy"> 
                            <span><i class = "fas fa-shopping-cart" style="color: black"></i></span><a href="shopping_list.php?listid='.$id.'& userid='.$iduser.' & storeid='.$store_id.'" style="color: black; text-decoration: none;">buy now</a>
                        </button>
                    </div>
                </div>
                <div class = "product-info">
                    <div class = "product-info-top">
                        <h2 class = "sm-title" style="font-weight: 800">'.$typ.'</h2>
                    </div>
                    <p class = "type" style="font-weight: 600">'.$colo.'</p>
                    <p class = "product-price" style="font-weight: 600">'.$pri.'NIS</p>
                    <p class = "product-price"style="font-weight: 600;color: crimson;text-decoration:line-through">'.$pri_after.'NIS</p>
                </div>
            </div>
                        
                        ';
        }
    }
}
?>
    </div>
        <div class="product-item2">
            <?php
            $iduser=$_SESSION['id'];
            $con = new mysqli('localhost', 'root', '', 'project');
            if (($con->connect_error)) {
                die("Connection field: " . $con->connect_error);
            }
            if(isset($_GET['part'])){
                $filter =$_GET['part'];
                $query = "select * from `store-merc` where (type = '$filter') OR (color = '$filter')";
                $query_run = mysqli_query($con, $query);
                if(mysqli_num_rows($query_run) > 0){
                    while ($row=mysqli_fetch_assoc($query_run)){
                        $id=$row['id'];
                        $typ=$row['type'];
                        $num=$row['number'];
                        $colo=$row['color'];
                        $pri=$row['price'];
                        $pri_after=$row['price_after'];
                        $store_id=$row['id_user'];
                        $img=$row['img'];
                        echo '
                        <div class = "product" >
                <div class = "product-content">
                    <div class = "product-img">
                        <img src="image/'.$img.'" style="height: 250px;width: 200px" alt = "product image">
                    </div>
                    <div class = "product-btns">
                        <button type = "button" class = "btn-cart"> 
                            <span><i class = "fas fa-plus"></i></span><a href="cart.php?cartid='.$id.'& userid='.$iduser.'& storeid='.$store_id.'" style="color: white; text-decoration: none">add to cart</a>
                        </button>
                        <button type = "button" class = "btn-buy"> 
                            <span><i class = "fas fa-shopping-cart" style="color: black"></i></span><a href="shopping_list.php?listid='.$id.'& userid='.$iduser.' & storeid='.$store_id.'" style="color: black; text-decoration: none;">buy now</a>
                        </button>
                    </div>
                </div>
                <div class = "product-info">
                    <div class = "product-info-top">
                        <h2 class = "sm-title" style="font-weight: 800">'.$typ.'</h2>
                    </div>
                    <p class = "type" style="font-weight: 600">'.$colo.'</p>
                    <p class = "product-price" style="font-weight: 600">'.$pri.'NIS</p>
                    <p class = "product-price"style="font-weight: 600;color: crimson;text-decoration:line-through">'.$pri_after.'NIS</p>
                </div>
            </div>
                        
                        ';
                    }
                }
                else{
                    echo '<script>alert("No merchandise exist")</script>';
                }
            }
            ?>
        </div>

        <div class = "product-items">
            <!-- single product -->
            <?php
            try{
                 if(isset($_GET['userid'])) {
        //$iduser = $_GET['userid'];
                     $iduser=$_SESSION['id'];
                $db=new mysqli('localhost','root'
                    ,'','project');
                $qryStr="select * from `store-merc` ";
                $res=$db->query($qryStr);
                if($res){
                    while ($row=mysqli_fetch_assoc($res)){
                        $id=$row['id'];
                        $typ=$row['type'];
                        $num=$row['number'];
                        $colo=$row['color'];
                        $pri=$row['price'];
                        $pri_after=$row['price_after'];
                        $store_id=$row['id_user'];
                        $img=$row['img'];
                        echo '
                        <div class = "product" >
                <div class = "product-content">
                    <div class = "product-img">
                        <img src="image/'.$img.'" style="height: 250px;width: 200px" alt = "product image">
                    </div>
                    <div class = "product-btns">
                        <button type = "button" class = "btn-cart"> 
                            <span><i class = "fas fa-plus"></i></span><a href="cart.php?cartid='.$id.'& userid='.$iduser.'& storeid='.$store_id.'" style="color: white; text-decoration: none">add to cart</a>
                        </button>
                        <button type = "button" class = "btn-buy"> 
                            <span><i class = "fas fa-shopping-cart" style="color: black"></i></span><a href="shopping_list.php?listid='.$id.'& userid='.$iduser.' & storeid='.$store_id.'" style="color: black; text-decoration: none;">buy now</a>
                        </button>
                    </div>
                </div>
                <div class = "product-info">
                    <div class = "product-info-top">
                        <h2 class = "sm-title" style="font-weight: 800">'.$typ.'</h2>
                    </div>
                    <p class = "type" style="font-weight: 600">'.$colo.'</p>
                    <p class = "product-price" style="font-weight: 600">'.$pri.'NIS</p>
                    <p class = "product-price"style="font-weight: 600;color: crimson;text-decoration:line-through">'.$pri_after.'NIS</p>
                </div>
            </div>
                        
                        ';

                    }
                }
                $db->close();}
            }catch (Exception $exception){

            }
            ?>
            <?php
$iduser=$_SESSION['id'];
           // $iduser=$_GET['userid'];
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
                <a href=""><span class="las la-store"></span>
                    <span>Shopping</span></a>
            </li>
            <li>
                <a href="cart.php?userid='.$iduser.'"><span class="las la-shopping-cart"></span>
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
</div>';
?>