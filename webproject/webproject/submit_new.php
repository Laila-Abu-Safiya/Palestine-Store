<?php
if(isset($_POST['submit_password']) && $_POST['email'] && $_POST['password'])
{
    $email=$_POST['email'];
    $pass=substr(sha1($_POST['password']),0,20);
    $db=new mysqli('localhost','root'
        ,'','project');
    $qryStr="update `users-table` set Password='$pass' where Email='$email'";
    $select=$db->query($qryStr);
    echo '<script>alert("Your paswword change correctly!")</script>';
    header("location:test.php");
}
?>