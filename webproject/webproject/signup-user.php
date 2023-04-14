
<?php
if(isset($_POST['username']) && isset($_POST['useremail']) && isset($_POST['userpass']) && isset($_POST['username'])
&& isset($_POST['usernumber']) && isset($_POST['useraddress']) && isset($_POST['radio'])){
    $uname=$_POST['username'];
    $uemail=$_POST['useremail'];
    $upass=$_POST['userpass'];
    $uadress=$_POST['useraddress'];
    $unumber=$_POST['usernumber'];
    $ugender=$_POST['radio'];
    try{
        $db= new mysqli('localhost', 'root','','webproject');
        $qryStr="INSERT INTO `users-table` (`Email`, `Name`, `Password`, `Phone-num`, `Address`, `gender`) VALUES ('".$uemail."', '".$uname."', '".$upass."', SHA1('".$upass."'), '".$uadress."', '".$ugender."');";
        $rs=$db->query($qryStr);
        $db->commit();
        $db->close();
        if($rs==1){
            header('Location:test.php');
        }
        else{
            echo "User Name is exist";
        }
    }catch (Exception $exception){

    }
}

