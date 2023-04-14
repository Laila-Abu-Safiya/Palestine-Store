<?php
if (isset($_POST['username']) && isset($_POST['useremail'])
    && isset($_POST['userpass']) && isset($_POST['useraddress']) &&
    isset($_POST['usernumber']) && isset($_POST['radio'])) {
    $uname = $_POST['username'];
    $uemail = $_POST['useremail'];
    $upass = $_POST['userpass'];
    $uaddress = $_POST['useraddress'];
    $unum = $_POST['usernumber'];
    $ugender = $_POST['radio'];
    try {
        $db = new mysqli('localhost', 'root', '', 'project');
        $qryStr = "INSERT INTO `users-table`(`Email`,`Name`,`Password`,`Phone-num`,`Address`,`gender`,`level`,`status`) 
VALUES ('" . $uemail . "','" . $uname . "', sha1('" . $upass . "'),'" . $unum . "','" . $uaddress . "','" . $ugender . "','user','valid');";
        $rs = $db->query($qryStr);
        $db->commit();
        $db->close();
        if ($rs == 1) {
            header('location:test.php');
        } else {
            echo "User is exist";
        }
    } catch (Exception $exception) {

    }
}
?>
<?php
if (isset($_POST['sname']) && isset($_POST['semail'])
    && isset($_POST['spass']) && isset($_POST['saddress']) &&
    isset($_POST['snum']) &&isset($_POST['signup'])) {
    $uname = $_POST['sname'];
    $uemail = $_POST['semail'];
    $upass = $_POST['spass'];
    $uaddress = $_POST['saddress'];
    $unum = $_POST['snum'];
    try {
        $db = new mysqli('localhost', 'root', '', 'project');
        $qryStr = "INSERT INTO `users-table`(`Email`,`Name`,`Password`,`Phone-num`,`Address`,`gender`,`level`,`status`) 
VALUES ('" . $uemail . "','" . $uname . "',sha1('" . $upass . "'),'" . $unum . "','" . $uaddress . "','','owner','wait');";
        $rs = $db->query($qryStr);
        $db->commit();
        $db->close();
        if ($rs == 1) {
            header('Location:test.php');
        } else {
            echo "User is exist";
        }
    } catch (Exception $exception) {

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Palestine Store </title>
    <link rel="stylesheet" href="signup-user.css">
    <link rel="icon" href="244045494_4444413118973348_6341370727680401580_n.png">
    <style>
        .slider{
            width: 100%;
            height: 100vh;
            position: absolute;
            top: 0;
        }
        #slide{
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="slider">
    <img src="581183_81_61636_ioxgCosqp.jpg" id="slide">
</div>
<div class="navbar">
    <img src="244045494_4444413118973348_6341370727680401580_n.png"class="logo2">
    <h1 class="logo" id="home">Palestine Store</h1>
    <ul>
        <li><a href="test.php#main" style="color: white">Home</a> </li>
        <li><a href="test.php#about" style="color: white">About Us</a> </li>
        <li><a href="test.php#service" style="color: white">Service</a> </li>
        <li><a href="test.php#contact" style="color: white">Contact</a> </li>
    </ul>
</div>

<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">User Sign Up</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Owner Sign Up</label>
        <input id="tab-3" type="radio" name="tab" class="sign-up-delivery"><label for="tab-3" class="tab">Delivery Sign Up</label>
        <div class="login-form">
            <form action="signup.php" method="post">
                <div class="signup-user">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input" name="username">
                    </div>
                    <div class="group">
                        <label for="useremail" class="label">Email</label>
                        <input id="useremail" type="email" class="input" name="useremail">
                    </div>
                    <div class="group">
                        <label for="userpass" class="label">Password</label>
                        <input id="userpass" type="password" class="input" data-type="password" name="userpass">
                    </div>
                    <div class="group">
                        <label for="userphone" class="label">Phone number</label>
                        <input id="userphone" type="text" pattern="+970-[0-9]{9}" class="input" name="usernumber">
                    </div>
                    <div class="group">
                        <label for="useraddres" class="label">Address</label>
                        <input id="useraddres" type="text" class="input"  name="useraddress">
                    </div>
                    <div class="group1">
                        <br>
                        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        <input type='radio' id='male' checked='checked' name='radio' value="Male">
                        <label for='male'>&nbsp Male &nbsp</label>
                        <input type='radio' id='female' name='radio' value="Female">
                        <label for='female'>Female</label>
                        <br>
                        <br>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                </div></form>
            <form action="signup.php" method="post">
            <div class="sign-up-htm">
                <div class="group">
                    <label for="storename" class="label">Store name</label>
                    <input id="storename" type="text" class="input" name="sname">
                </div>
                <div class="group">
                    <label for="ownerpass" class="label">Password</label>
                    <input id="ownerpass" type="password" class="input" data-type="password" name="spass">
                </div>
                <div class="group">
                    <label for="owneremail" class="label">Email Address</label>
                    <input id="owneremail" type="Email" class="input" name="semail">
                </div>
                <div class="group">
                    <label for="owernumber" class="label">Phone number</label>
                    <input id="owernumber" type="text" pattern="+970-[0-9]{9}" class="input" name="snum">
                </div>
                <div class="group">
                    <label for="owneraddress" class="label">Address</label>
                    <input id="owneraddress" type="text" class="input"  name="saddress">
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Sign Up" name="signup">
                </div>
            </div></form>
            <div class="sign-up-deliv">
                <div class="group">
                    <label for="user" class="label">Store name</label>
                    <input id="user7" type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass7" class="label">Password</label>
                    <input id="pass7" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <label for="pass8" class="label">Email Address</label>
                    <input id="pass8" type="Email" class="input">
                </div>
                <div class="group">
                    <label for="user" class="label">Phone number</label>
                    <input id="user9" type="text" pattern="+970-[0-9]{9}" class="input">
                </div>
                <div class="group">
                    <label for="user" class="label">Address</label>
                    <input id="user10" type="text" class="input" pattern="[A-Za-z]{15}-[A-Za-z]{15}5">
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Sign Up">
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
