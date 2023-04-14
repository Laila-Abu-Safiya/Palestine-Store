
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
        <input type="submit" name="submitsearc" value="Searc">
    </form>
        <div class="product-item2">
        <?php
        session_start();
        $iduser=$_SESSION['id'];
        $con = new mysqli('localhost', 'root', '', 'project');
        if (($con->connect_error)) {
            die("Connection field: " . $con->connect_error);
        }
        if(isset($_POST['searc']) || isset($_POST['submitsearc'])){
            $filter = $_POST['searc'];
            $query = "select * from `shopping-list` where (Type = '$filter') OR (Color = '$filter')";
            $query_run = mysqli_query($con, $query);
            if(mysqli_num_rows($query_run) > 0){
                while ($row=mysqli_fetch_assoc($query_run)){
                    $id=$row['id'];
                    $typ=$row['Type'];
                    $colo=$row['Color'];
                    $pri=$row['Price'];
                    $pri_after=$row['Discount'];
                    $img=$row['img'];
                    echo '
                        <div class = "product" >
                <div class = "product-content">
                    <div class = "product-img">
                        <img src="image/'.$img.'" style="height: 250px;width: 200px" alt = "product image">
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
        ?></div>

    <div class = "product-items">
    <!-- single product -->


<?php
try{
    if(isset($_GET['userid'])) {
        $iduser = $_GET['userid'];
        $db=new mysqli('localhost','root'
            ,'','project');
        $qryStr="select * from `shopping-list` where store_id='$iduser' ";
        $res=$db->query($qryStr);
        if($res){
            while ($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $typ=$row['Type'];
                $colo=$row['Color'];
                $pri=$row['Price'];
                $pri_after=$row['Discount'];
                echo '
                        <div class = "product" >
                <div class = "product-content">
                    <div class = "product-img">
                        <img src="image/'.$row['img'].'" style="height: 250px;width: 200px" alt = "product image">
                    </div>
                    <div class = "product-btns">
                       
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
$iduser=$_GET['userid'];
echo '
<div class="side">
    <div class="side-icon">
        <h1 style="font-size: 26px;font-weight: 600"><span class="lab la-pinterest"></span> Palestine Store</h1>
    </div>
    <div class="side-menu">
        <ul>
            <li>

                <a href="mystore.php?userid='.$iduser.'" class="active"><span class="lab la-buromobelexperte"></span>
                    <span>My Store</span></a>
            </li>
            <li>
                <a href="addToStore.php?userid='.$iduser.'"><span class="las la-store"></span>
                    <span>Add to Store</span></a>
            </li>
            <li>
                <a href="sales_list.php?userid='.$iduser.'"><span class="las la-shopping-bag"></span>
                    <span>Sales list</span></a>
            </li>
            <li class="bottom">
                <a href="test.php"><span class="las la-undo"></span>
                    <span>Log Out</span></a>
            </li>

        </ul>
    </div>
</div>'
?>