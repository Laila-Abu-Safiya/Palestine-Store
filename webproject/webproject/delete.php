<?php
try{
    $db=new mysqli('localhost','root'
        ,'','project');
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];
        $userid=$_GET['userid'];

        $sql = "delete from `store-merc` where id='$id'";
        $res=$db->query($sql);
        if($res){
            header("location:mystore.php?userid={$userid}");
        }
        else{
            die((mysqli_error($db)));
        }
    }
    elseif(isset($_GET['saleid'])){
        $id=$_GET['saleid'];

        $sql = "delete from `shopping-list` where id='$id'";
        $res=$db->query($sql);
        if($res){
            header("location:Admin_delivery.php");
        }
        else{
            die((mysqli_error($db)));
        }
    }
    $db->close();
}catch (Exception $exception){

}
?>
<?php
try{
    $db=new mysqli('localhost','root'
        ,'','project');
    if(isset($_GET['cartid'])){
        $id=$_GET['cartid'];
        $iduser=$_GET['userid'];

        $sql = "delete from `cart` where id='$id'";
        $res=$db->query($sql);
        if($res){
            header("location:cart.php?userid={$iduser}");
        }
        else{
            die((mysqli_error($db)));
        }
    }
    $db->close();
}catch (Exception $exception){

}
?>
