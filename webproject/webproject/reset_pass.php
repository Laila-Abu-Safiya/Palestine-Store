<?php
if($_GET['key'] && $_GET['reset'])
{
    $email=$_GET['key'];
    $pass=$_GET['reset'];
    $db=new mysqli('localhost','root'
        ,'','project');
    $qryStr="select * from `users-table` where Email='$email' and Password='$pass'";
    $select=$db->query($qryStr);
    if($select->num_rows ==1)
    {
        ?>
<div class="banner">
    <div class="slider">
        <img src="shop-01.jpg" id="slide">
    </div>
            <div class="header-content">
        <form method="post" action="submit_new.php">
            <input type="hidden" name="email" value="<?php echo $email;?>">
            <h2 style="color: whitesmoke">Enter New password</h2>
            <input type="password" name='password'placeholder="New Password" style="font-size: 16px">
            <input type="submit" name="submit_password">
        </form></div>
</div>
        <?php
    }
}
?>
<html>
<head>
    <link rel="icon" href="244045494_4444413118973348_6341370727680401580_n.png">
</head>
</html>
<style>
    body{
        background-image: url("shop-01.jpg");
    }
    .banner{
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .slider{
        width: 100%;
        height: 100vh;
        position: absolute;
        top: 0;
    }
    h1 {
        font-weight: 800;
        font-size: 3.6rem;
    }
    .header-content {
        padding: 30px;
        border-radius: 15px;
        background: rgba(0,0,0,0.7);
        width: 50%;
        position: relative;
        top: 25%;
        left: 25%;
    }
    form {
        margin: 2.4rem 0;
        position: relative;
        left: 25%;
    }

    input {
        font-size: 1.8rem;

    }


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
    input[type=submit]:hover{
        border-color: crimson;;
        background: transparent;
        color: crimson;
        transition: 0.8s;

    }
    input[type=submit] {
        border-radius: 7px;
        width: 50%;
        background-color: crimson;
        color: #fff;
        padding: 14px 20px;
        margin: 8px 0;
        border: 3px transparent groove;
        cursor: pointer;
        text-transform: uppercase;
    }
</style>

