<?php
use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['send'])){
    echo "success";
    $to = "palestinestore0@gmail.com";
    $body = $_POST['umessage'];
    $Client = $_POST['username'];
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'palestinestore0@gmail.com';
    $mail->Password = 'LK123456';
    $mail->SetFrom($_POST['uemail'], $Client);
    $mail->AddAddress($to);
    $mail->addReplyTo($_POST['uemail']);
    $mail->isHTML(true);
    $mail->Subject = 'WebSite Msg from ' . $Client;
    $mail->Body = $body;
    if (!$mail->send()) {
        echo '<script> alert("Email not send successfully.")</script>';
        echo '<script> alert("' . $mail->ErrorInfo . '")</script>';
    } else {
        echo '<script> alert("Send Successfully")</script>';
    }
}
?>
<?php
if(isset($_POST['submitemail']) && $_POST['emaill'])
{
    $emaiL=$_POST['emaill'];
    $db=new mysqli('localhost','root'
        ,'','project');
    $qryStr="select * from `users-table` where email='$emaiL'";
    $select=$db->query($qryStr);
    if($select->num_rows ==1)
    {
        while($row=mysqli_fetch_array($select))
        {
            $email=$row['Email'];
            $pass=$row['Password'];
        }
        $link="<a href='http://localhost/webproject/reset_pass.php?key=".$email."&reset=".$pass."''>Click To Reset password</a>";
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $mail = new PHPMailer();
        $mail->CharSet =  "utf-8";
        $mail->IsSMTP();
        // enable SMTP authentication
        $mail->SMTPAuth = true;
        // GMAIL username
        $mail->Username = "palestinestore0@gmail.com";
        // GMAIL password
        $mail->Password = "LK123456";
        $mail->SMTPSecure = "ssl";
        // sets GMAIL as the SMTP server
        $mail->Host = "smtp.gmail.com";
        // set the SMTP port for the GMAIL server
        $mail->Port = "465";
        $mail->From='palestinestore0@gmail.com';
        $mail->FromName='Palestine Store';
        $mail->AddAddress("$emaiL", 'user');
        $mail->Subject  =  'Reset Password';
        $mail->IsHTML(true);
        $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
        if($mail->Send())
        {
            echo '<script>alert("Check Your Email and Click on the link sent to your email")</script>';

        }
        else
        {
            echo '<script>alert("Mail Error - >".$mail->ErrorInfo)</script>';
        }
    }
}
?>
<?php
session_start();
?>
<?php
if (isset($_POST['email']) &  isset($_POST['password'])){
    $uname=$_POST['email'];
    $upass=$_POST['password'];
    $check = substr(sha1($upass),0,20);
    try {
        $db = new mysqli('localhost', 'root', '','project');
        $qrystr="select * from `users-table`";
        $rs=$db->query($qrystr);
        for($i=0;$i<$rs->num_rows;$i++){
            $row=$rs->fetch_object();
            $id_user=$row->id_user;

            if($row->Email == $uname && $row->Password == $check && $row->level=='user'){
                $_SESSION['id']=$id_user;
                header("Location: home-user.php?userid={$id_user}");
            }
            elseif ($row->Email == $uname && $row->Password == $check && $row->level=='owner' && $row->status=='valid'){
                $_SESSION['id']=$id_user;
                header("Location: mystore.php?userid={$id_user}");
            }
            elseif($uname =='palestinestore0@gmail.com' && $upass=='LK123456'){
                header("Location:admindash.php");
            }
            else{
                echo '<script>alert("Check your account validation")</script>';
            }
        }
        $db->close();

    }catch (Exception $e){
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="244045494_4444413118973348_6341370727680401580_n.png">
    <title>Palestine Store</title>
    <style>

        input[type=password],
        input[type=email] {
            width: 50%;
            background: none;
            color: white;
            border-radius: 7px;
            padding: 12px 20px;
            margin: 1.2rem 0;
            display: block;
            border: 1px solid #ec436e;
        }
        .process-content{
            position: relative;
            width: 100%;
        }
        .product-card {
            position: relative;
            box-shadow: 0 2px 7px #dfdfdf;
            margin: 3rem;
            background: #fafafa;
            float: left;

        }
        .product-card:hover{
            box-shadow: 0 4px 10px crimson;
            transform: scale(1.05);
        }

        .badge {
            position: absolute;
            left: 0;
            top: 20px;
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 700;
            background: red;
            color: #fff;
            padding: 3px 10px;
        }

        .product-tumb {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 300px;
            padding: 50px;
            background: #f0f0f0;
            width: 300px;
        }

        .product-tumb img {
            max-width: 100%;
            max-height: 100%;
        }

        .product-details {
            padding: 30px;
        }

        .product-catagory {
            display: block;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            color: #ccc;
            margin-bottom: 18px;
        }

        .product-details h4 a {
            font-weight: 500;
            display: block;
            margin-bottom: 18px;
            text-transform: uppercase;
            color: #363636;
            text-decoration: none;
            transition: 0.3s;
        }

        .product-details h4 a:hover {
            color: crimson;
        }

        .product-details p {
            font-size: 15px;
            line-height: 22px;
            margin-bottom: 18px;
            color: #999;
        }

        .product-bottom-details {
            overflow: hidden;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .product-bottom-details div {
            float: left;
            width: 50%;
        }

        .product-price {
            font-size: 18px;
            color: crimson;
            font-weight: 600;
        }

        .product-price small {
            font-size: 80%;
            font-weight: 400;
            text-decoration: line-through;
            display: inline-block;
            margin-right: 5px;
        }

        .product-links {
            text-align: right;
        }

        .product-links a {
            display: inline-block;
            margin-left: 5px;
            color: #e1e1e1;
            transition: 0.3s;
            font-size: 17px;
        }

        .product-links a:hover {
            color: crimson;
        }

    </style>
<script>
    function openForm() {
        document.getElementById("loginform").style.display = "none";
        document.getElementById("resetform").style.display = "block";
    }
</script>
</head>

<body onload="slider()">
<header id="main">
    <div class="banner">
        <div class="slider">
            <img src="shop-01.jpg" id="slide">
        </div>
    <nav>
        <div class="logo">
            <h1>Palestine Store</h1>
        </div>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#service">Service</a></li>
            <li><a href="#latest">Latest</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="signup.php">Sign Up</a></li>
        </ul>
        <box-icon name='menu' color="whitesmoke" size="lg" id="menu"></box-icon>
    </nav>
    <div class="header-content" style="background: rgba(0,0,0,0.7); border-radius: 10px; padding: 20px;display: block" id="loginform">
        <h1>Welcome to Palestine Store</h1>
        <p>Join us to make your life easy, here you can buy or sale anything you want
        </p>
        <form method="post" action="test.php">
            <input type="email" name="email" placeholder="Enter your Email" style="background:transparent; border: 1px crimson solid;border-radius: 5px">
            <input type="password" placeholder="Enter your Password" name="password" style="background:transparent; border: 1px crimson solid;border-radius: 5px">
            <a style="color: crimson; text-decoration: underline;cursor: pointer" id="hidee" onclick="openForm()">Forget password?</a>
            <div>
            <input type="submit" value="LogIn" name="login">
        </form>
    </div>
    </div>
    <div class="header-content" style="background: rgba(0,0,0,0.7); border-radius: 10px; padding: 20px;display: none" id="resetform">
        <h1>Welcome to Palestine Store</h1>
        <p>Join us to make your life easy, here you can buy or sale anything you want
        </p>
        <form method="post" action="test.php">
            <input type="email" name="emaill" placeholder="Enter your Email" style="background:transparent; border: 1px crimson solid;border-radius: 5px">
            <div>
                <input type="submit" value="Send verefiction" name="submitemail">
        </form>
    </div>
    </div>
    <script>
        var slide=document.getElementById("slide");
        var images = ["shop-01.jpg",
            "mobile_version_ownastore.jpg",
            "581183_81_61636_ioxgCosqp.jpg",
            "brand-1.jpg",
            "shop-home-message-wooden-dices-credit-card-small-cart-clear-background-online-shopping-hom-concept-181245381.jpg"];
        var len = images.length;
        var i=0;
        function slider(){
            if(i > len-1){
                i=0;
            }
            slide.src=images[i]
            i++;
            setTimeout('slider()',3000);
        }
    </script>

</header>

<section class="about2" id="about" style="padding: 20px">
    <div class="row">
        <div class="about2-left">
            <h2>What we can do for you</h2>
            <h1>About Us</h1>
           <p> What is Palestine Store?<br> Plastine Store that allows the user to view a list of pruchases in different section, that make the user able to add what he want to the cart or buy it directly, also its enables the store owner to creat an account for his store and offer what he has.<br>
            Are you a store owner? here you can view your store's merchandise.</p>
        </div>
        <div class="about2-right">
            <div class="row">
                <div class="card">
                    <div class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                    <h2>Buyer </h2>
                </div>
                <div class="card">
                    <div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                    <h2>Owner</h2>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="icon"><i class="fa fa-address-card" aria-hidden="true"></i></div>
                    <h2>Admin</h2>
                </div>
                <div class="card">
                    <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                    <h2>Contact</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- process -->
<section class="process" id="service">
    <div class="row">
        <h1>Service</h1>
    </div>
    <div class="row">
        <div class="process-content">
            <div class="progress-bar">
                <div class="c1"></div>
                <div class="c2"></div>
                <div class="c3"></div>
            </div>
            <div class="row">
                <div class="box1">
                    <h2>Buyer</h2>
                    <p>The website allows the user to view a list of goods in different section. Each buyer has a cart and shopping list.</p>
                </div>
                <div class="box2">
                    <h2>Contact</h2>
                    <p>For more information, you can contact us in section of contact, and you can find more information in the bage below. </p>
                </div>
                <div class="box3">
                    <h2>Owner</h2>
                    <p>The website enables the store owner to creat an account for his store and offer what he has.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->

<section class="contact" id="contact">
    <div class="row">
        <h1>Contact Us</h1>
    </div>
    <div class="row">
        <form method="post" action="test.php">
            <input type="text" placeholder="Enter your name" name="username" style="border: 1px solid crimson; border-radius: 5px">
            <input type="email" placeholder="Enter your email" name="uemail">
            <textarea name="umessage" style="border: 1px solid crimson; border-radius: 5px">Enter your message</textarea>
            <input type="submit" value="Send" name="send">
        </form>
    </div>
</section>
<!--slider-->

<section class="process" id="latest">
    <div class="row">
        <h1>Latest Sales</h1>
    </div>
    <div class="row">
        <div class="process-content">
            <div class="row">
                <?php
                $db=new mysqli('localhost','root'
                    ,'','project');
                $qryStr="select * from `store-merc` ";
                $res=$db->query($qryStr);
                if($res){
                    for($i=0;$i<3;$i++){
                     $row=mysqli_fetch_assoc($res);
                        $id=$row['id'];
                        $typ=$row['type'];
                        $num=$row['number'];
                        $colo=$row['color'];
                        $pri=$row['price'];
                        $pri_after=$row['price_after'];
                        $store_id=$row['id_user'];
                        $img=$row['img'];
                        echo '
                        	<div class="product-card">
		<div class="badge">Latest</div>
		<div class="product-tumb">
			<img src="image/'.$img.'" alt="">
		</div>
		<div class="product-details">
			<span class="product-catagory">'.$colo.'</span>
			<h4><a href="">'.$typ.'</a></h4>
			<p>Join us Know!!</p>
			<div class="product-bottom-details">
				<div class="product-price"><small>'.$pri_after.' NIS</small>'.$pri.' NIS</div>
				<div class="product-links">
					<a href="test.php"><i class="fa fa-sign-in"></i></a>
				</div>
			</div>
		</div>
	</div>
                     ';

                    }
                }
                $db->close();

                ?>

            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
        <div class="content2">
            <h2 >Contact Us</h2>
            <p>If you have any questions or inquiries, you can contact us through one of these interfaces</p>
        </div>
        <div class="contact-continer">
            <div class="contact-box">
                <div class="boxinfo">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="contacttext">
                        <h3>Address</h3>
                        <p>contry,num region<br>city,street </p>
                    </div>
                </div>
                <div class="boxinfo">
                    <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                    <div class="contacttext">
                        <h3>Email</h3>
                        <p>palestinestore0@gmail.com</p>
                    </div>
                </div>
                <div class="boxinfo">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="contacttext">
                        <h3>Phone</h3>
                        <p>+972-568760266</p>
                    </div>
                </div>
            </div>
        </div>
</footer>

<script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
<script src="app.js"></script>
</body>
</html>