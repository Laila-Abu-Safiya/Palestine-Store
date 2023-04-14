<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Palestine Store</title>
    <link rel="icon" href="244045494_4444413118973348_6341370727680401580_n.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="home-user.css">
    <link rel="stylesheet" href="user_mainscreen.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
<?php
session_start();
$iduser=$_SESSION['id'];
$iduser=$_GET['userid'];
echo '
<div class="side">
    <div class="side-icon">
        <h1><span class="lab la-pinterest"></span> Palestine Store</h1>
    </div>
    <div class="side-menu">
        <ul>
            <li>

                <a href="" class="active"><span class="lab la-buromobelexperte"></span>
                    <span>Home</span></a>
            </li>
            <li>
                <a href="home-user.php?userid='.$iduser.'"><span class="las la-store"></span>
                    <span>Shopping</span></a>
            </li>
            <li>
                <a href="cart.phpphp?userid='.$iduser.'"><span class="las la-shopping-cart"></span>
                    <span>Cart</span></a>
            </li>
            <li>
                <a href="shopping_list.phpphp?userid='.$iduser.'"><span class="las la-shopping-bag"></span>
                    <span>Shopping list</span></a>
            </li>
            <li class="bottom">
                <a href="test.php"><span class="las la-undo"></span>
                    <span>Log Out</span></a>
            </li>

        </ul>
    </div>
</div>' ?>
<div class="main">
    <h1>Our Department</h1>

<div class="main_box">
    <div class = "part">
            <div class = "part-img" id="Accessories">
                <a href="home-user.php?part=Accessories"><img src="fashion-women-stylish-accessories-outfit-260nw-1532053424%20-%20Copy.jpg"></a>
            </div>
            <div class = "part-text">
                Accessories
            </div>
    </div>
    <div class = "part">
        <div class = "part-img">
            <a href="home-user.php?part=Protective equipment"><img src="0A9B57B2-9587-470B-A985-0A75FDF122D0-1024x678%20-%20Copy.jpeg"></a>
        </div>
        <div class = "part-text">
            Protective equipment
        </div>
    </div>
    <div class = "part">
        <div class = "part-img">
            <a href="home-user.php?part=Electronics"> <img src="Screenshot%202021-11-13%20124443%20-%20Copy.jpg"></a>
        </div>
        <div class = "part-text">
            Electronics
        </div>
    </div>
    <div class = "part">
        <div class = "part-img">
           <a href="home-user.php?part='Home'"><img src="Screenshot%202021-11-13%20124457%20-%20Copy.jpg"></a>
        </div>
        <div class = "part-text">
            Home
        </div>
    </div><div class = "part">
    <div class = "part-img">
       <a href="home-user.php?part='Sport'"><img src="Screenshot%202021-11-13%20124517%20-%20Copy.jpg"></a>
    </div>
    <div class = "part-text">
        Sport
    </div>
</div><div class = "part">
    <div class = "part-img">
        <a href="home-user.php?part='Clothes'"> <img src="6602508_preview%20-%20Copy.png"></a>
    </div>
    <div class = "part-text">
        Clothes
    </div>
</div>

    </form>

</div>

</div>


<!--<div class="main_box">
    <div class="seconed_pic" id="accsseoris">
        <div class="img_part">
    <img src="fashion-women-stylish-accessories-outfit-260nw-1532053424%20-%20Copy.jpg">
        </div>
        <div class="text_part">
        <label class="texton-pic" ></label></div>
</div>
    <div class="seconed_pic" id="safe">
        <img src="0A9B57B2-9587-470B-A985-0A75FDF122D0-1024x678%20-%20Copy.jpeg">
        <label class="texton-pic" ></label>
    </div>
    <div class="firs_pic" id="electronic">
        <img src="Screenshot%202021-11-13%20124443%20-%20Copy.jpg">
        <label class="texton-pic" ></label>

    </div>
    <div class="firs_pic" id="home">
        <img src="Screenshot%202021-11-13%20124457%20-%20Copy.jpg">
        <label class="texton-pic" >Home & gardens</label>

    </div>
    <div class="firs_pic" id="sport">
        <img src="Screenshot%202021-11-13%20124517%20-%20Copy.jpg">
        <label class="texton-pic" >Sport</label>

    </div>
    <div class=seconed_pic id="animales">
    <img src="shop-with-sign-we-are-open_52683-38687%20-%20Copy.jpg">
        <label class="texton-pic" >Animals</label>

    </div>
    <div class="seconed_pic" id="clothes">
        <label class="texton-pic" >Clothes</label>

    </div>-->

</body>
</html>