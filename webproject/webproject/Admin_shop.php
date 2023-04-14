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
</head>
<body>
<?php
$con = new mysqli('localhost', 'root', '', 'project');
$count = "SELECT COUNT(id_user) as count
                        FROM `users-table`
                        WHERE status = 'wait'";
$result = mysqli_query($con , $count);
while ($row = mysqli_fetch_assoc($result)){
    $output = $row['count'];
}
?>
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
      Shops
    </h1>
  </header>
  <form action="" method="post">
    <div class="add-shop">
      <h2 style="cursor: pointer">
        <div class="search-wrapper">
          <span class="las la-search"></span>
          <input name="find" type="search" placeholder="Search here" style="font-size: 20px;">
        </div>
        <div class="s1">
          <a style="padding-top: 7px;" href="Shop-Request.php"><input id="AddShop" type="button" value="| Shop Request " style="cursor: pointer"></a>
          <span class="las la-bell" ><?= $output ?></span>
        </div></h2>

    </div>
  </form>
  <div class="shops">
    <table>
      <tr>
        <?php
          if (($con->connect_error)) {
        die("Connection field: " . $con->connect_error);
        }
        if(isset($_POST['find'])){
        $filter = $_POST['find'];
        $query = "select * from `users-table` where (id_user = '$filter') OR (Name = '$filter') ";
        $res = $con->query($query);
        $query_run = mysqli_query($con, $query);
        if(mysqli_num_rows($query_run) > 0){
        $i=0;
        while ($row = $res->fetch_assoc()) {
        if ($i++ % 3 == 0) echo "<tr>";
      ?>
      <td>
        <div class="shop">
          <form action="" method="get">
              <label><h2><?= $row['Email'];?></h2></label><br>
            <label><h2><?= $row['Name'];?></h2></label><br>
            <a class="button1" href = " Admin_shop.php?id= <?= $row['id_user']; ?>" >Delete</a>
          </form>
        </div>
      </td>
      <?php
                  if ($i % 3 == 0) echo "</tr>";
      ?>
      <?php
              }
              if ($i % 3 != 0) echo "</tr>";
      } else {
      ?>
      <tr><td colspan="3">No results found.</td>
        <?php
            }
          }
            $count = "SELECT COUNT(id_user) as count
                        FROM `users-table`
                        WHERE status = 'wait'";
            $result = mysqli_query($con , $count);
            while ($row = mysqli_fetch_assoc($result)){
                $output = $row['count'];
            }

            @$id = $_GET["id"];
            if ($id != null){
                $sql = "DELETE FROM `users-table` WHERE id_user= '$id'";

                if ($con->query($sql) === TRUE) {
        echo '<script>alert("shop Deleted Successfully")</script>';
        //echo $id;
        } else {
        echo "<h4 style='color: red'>Error deleting record: </h4>" . $con->error;
        }
        }
        $con->close();

        ?>


    </table>
    <script>
      var button = document.getElementsByClassName("button1");
      for (let i=0; i< button.length; i++){
        button[i].addEventListener('click',
                function (){
                  document.querySelector('.warn').style.display = "flex";
                });
      }
    </script>
  </div>
</div>

<div class="add-shop1">
  <div class="form">
    <span id="back" class="las la-arrow-circle-left"></span>
    <h2>Shop Request</h2>
    <script>
      document.getElementById("back").addEventListener('click',
              function (){
                document.querySelector('.add-shop1').style.display = "none";
              });
    </script>
    <div class="grid">
      <div class="form-element">
        <input type="file" id="file-1" accept="image/*">
        <label for="file-1" id="file-1-preview">
          <img src="https://bit.ly/3ubuq5o" alt="">
          <div>
            <span>+</span>
          </div>
        </label>
      </div>
      <div class="in-shop">
        <div class="lp">
          <lable>Shop Name : </lable>
          <input type="text">
        </div>
        <div class="lp">
          <lable>Phone Number : </lable>
          <input type="number">
        </div>

        <div class="lp">
          <lable>Shop Address : </lable>
          <input type="text">
        </div>

        <div class="lp">
          <lable>Email Address : </lable>
          <input type="text">
        </div>

        <div class="lp">
          <input type="submit" value="ADD">
        </div>

      </div>
    </div>
  </div>
</div>
<div class="warn">
  <div class="del">
    <form action="" method="post">
      <h1>DELETE SHOP!</h1><br>
      <p>Are you sure to delete the 'name of store 'store? </p><br>
      <input id="yes" name="submit" type="submit" value="Yes" >
      <input id="cancel" type="submit" value="Cancel">
    </form>
  </div>
  <script>
    document.getElementById("cancel").addEventListener('click',
            function (){
              document.querySelector('.warn').style.display = "none";
            });
    document.getElementById("yes").addEventListener('click',
            function (){
              document.querySelector('.warn').style.display = "none";
            });
  </script>
</div>

</body>
</html>
