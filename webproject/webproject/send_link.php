<?php
use PHPMailer\PHPMailer\PHPMailer;
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