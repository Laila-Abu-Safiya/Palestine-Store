<?php
//echo 'success';
//if(isset($_POST['search'])){
//
//    echo 'success4';
//    $search = $_POST['find'];
//    try {
//        $db = new mysqli('localhost', 'root', '', 'store');
//
//        $qryStr="select * from login";
//        $res=$db->query($qryStr);
//        for ($i=0; $i < $res->num_rows; $i++ ){
//            $row=$res->fetch_object();
//            echo $row;
//        }
//        $db->close();
//    }catch (Exception $e){
//
//    }
//
//}
//?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="AddEmployee.css">
    <link rel="stylesheet" href="delivery2.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="icon" href="244045494_4444413118973348_6341370727680401580_n.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="admindash.css">
    <style>
        .list a{
            border-radius: 8px;
            cursor: pointer;
            color: white;
            background-color: red;
            border: none;
            border-bottom: 1px solid black;
            padding: 4px;
            box-shadow: 2px 0 2px 0px #333333;
        }
    </style>

</head>
<body>
<div class="sidebar">
    <div class="logo-details">
        <span class="logo_name"> <img src="263333121_439374817770718_3759448542034601736_n.png" alt="">&nbsp Palestine Store</span>
    </div>
    <ul class="nav-links">
        <li>
            <img src="263333121_439374817770718_3759448542034601736_n.png" alt="">

        </li>
        <li><br></li>
        <li><br></li>
        <li><br></li>
        <li><br></li>
        <li>
            <a href="admindash.php">
                <span id="check" class="las la-bars"></span>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="admin_customer.php">
                <span class="las la-user-circle"></span>
                <span class="links_name">Customers</span>
            </a>
        </li>
        <li>
            <a href="Admin_delivery.php"><span class="las la-truck"></span>
                <span>Delivery</span></a>
        </li>
        <li>
            <a href="Admin_shop.php"><span class="las la-shopping-bag"></span>
                <span>Shops</span></a>
        </li>
        <li><a href="test.php"><span class="las la-file-import"></span>
                <span>Log out</span></a>
        </li>
    </ul>
</div>
<div class="main-content" style="position: absolute;left: -7%;top: -2%; width: 84.5%">
    <header>
        <h1>
            <label >
                <span id="check" class="las la-bars"></span>
            </label>
            Customers
        </h1>
    </header>
    <form action="" method="post">
        <div class="add-shop">
            <h2 style="cursor: pointer">
                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input  name="find" type="search" value="<?php if (isset($_POST['find']) || isset($_POST['search'])){echo $_POST['find'];} ?>" placeholder="Search here" style="font-size: 20px;">
                </div >
                <div class="s1" ><input name="search" type="submit" value="| search " >
                    <span class="las la-search"></span></div>

            </h2>
        </div></form>
    <div class="list">
        <table>
            <tr><th>ID</th><th>Name</th><th>PhoneNumber</th><th>Address</th><th>Email</th></tr>

            <tr><br></tr>

            <?php
                $con = new mysqli('localhost', 'root', '', 'project');
                if (($con->connect_error)) {
            die("Connection field: " . $con->connect_error);
            }
            if(isset($_POST['find']) || isset($_POST['search'])){
            $filter = $_POST['find'];
            $query = "select * from `users-table` where (id_user = '$filter') OR (Name = '$filter') OR (`Phone-num` = '$filter')";
            $query_run = mysqli_query($con, $query);
            if(mysqli_num_rows($query_run) > 0){
            foreach ($query_run as $items){
            ?>
            <form action="" method="post">
                <tr>
                    <td><?= $items['id_user'];?></td>
                    <td><?= $items['Name'];?></td>
                    <td><?= $items['Phone-num'];?></td>
                    <td><?= $items['Address'];?></td>
                    <td><?= $items['Email'];?></td>
                    <td><a href = " admin_customer.php?id= <?= $items['id_user']; ?>" >Delete</a></td>
                </tr></form>
            <?php
                        }
                    }else{
                        ?>
            <tr>
                <td colspan="5"></td>
                <!--                        <td><input type="button" value="Delete"></td>-->
            </tr>
            <?php
                    }
                }



                    @$id = $_GET["id"];
                if ($id !=null){
                    $sql = "DELETE FROM `users-table` WHERE id_user= '$id'";

                    if ($con->query($sql) ) {
            echo "<h4 style='color: green'>Record deleted successfully</h4>";
            echo $id;
            } else {
            echo "<h4 style='color: red'>Error deleting record: </h4>" . $con->error;
            }}
            $con->close();
            ?>

        </table>
    </div>
</div>
</body>
</html>
