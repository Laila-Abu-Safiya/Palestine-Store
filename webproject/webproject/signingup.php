<?php
if(isset($_POST['username']) && isset($_POST['useremail'])
&& isset($_POST['userpass']) && isset($_POST['useraddress']) &&
isset($_POST['usernumber']) && isset($_POST['radio'])){
    $uname=$_POST['username'];
    $uemail=$_POST['useremail'];
    $upass=$_POST['userpass'];
    $uaddress=$_POST['useraddress'];
    $unum=$_POST['usernumber'];
    $ugender=$_POST['radio'];
    try{
        $db = new mysqli('localhost','root','','webproject');
        $qryStr="INSERT INTO `users-table`(`Email`,`Name`,`Password`,`Phone-num`,`Address`,`gender`) 
VALUES ('".$uemail."','".$uname."','".$upass."','".$unum."','".$uaddress."','".$ugender."');";
        $rs=$db->query($qryStr);
        $db->commit();
        $db->close();
        if($rs==1){
            echo "sucsess";
            header('Location:test.php');
        }
        else{
            echo "User is exist";
        }
    }catch (Exception $exception ){

    }
}
