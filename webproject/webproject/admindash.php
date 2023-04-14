<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="admindash.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="icon" href="244045494_4444413118973348_6341370727680401580_n.png">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
<section class="home-section">
  <nav>
    <div class="sidebar-button">
      <i class='bx bx-menu sidebarBtn'></i>
      <span class="dashboard">Dashboard</span>
    </div>
    <div class="search-box">
      <input type="text" placeholder="Search...">
      <i class='bx bx-search' ></i>
    </div>
    <div class="profile-details">
      <!--<img src="images/profile.jpg" alt="">-->
      <span class="admin_name">Palestine Store</span>
      <i class='bx bx-user-circle' ></i>
    </div>
  </nav>
  <div class="home-content">
    <div class="overview-boxes">
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total in cart</div>
            <?php
            $db = new mysqli('localhost', 'root'
                , '', 'project');
            $qryStr = "SELECT COUNT(*) FROM `cart`";
            $res = $db->query($qryStr);
            $num=$res->num_rows;
            echo "<div class='number'>$num</div>"

            ?>
          <div class="indicator">
            <i class='bx bx-down-arrow-alt down'></i>
            <span class="text">Down From Today</span>
          </div>
        </div>
        <i class='bx bx-cart-alt cart'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Sales</div>
            <?php
            $db = new mysqli('localhost', 'root'
                , '', 'project');
            $qryStr = "SELECT COUNT(*) FROM `shopping-list`";
            $res = $db->query($qryStr);
            $num2=$res->num_rows;
            echo "<div class='number'>$num2</div>";

            ?>
          <div class="indicator">
            <i class='bx bx-down-arrow-alt down'></i>
            <span class="text">Down From Today</span>
          </div>
        </div>
        <i class='bx bxs-cart-add cart two' ></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Profit</div>
            <?php
            $db = new mysqli('localhost', 'root'
                , '', 'project');
            $qryStr = "SELECT SUM(Discount)FROM `shopping-list`";
            $res = $db->query($qryStr);
            while($row = mysqli_fetch_array($res)){
                echo '<div class="number">'.$row['SUM(Discount)'].'$</div>';
            }
            ?>
          <div class="indicator">
            <i class='bx bx-down-arrow-alt down'></i>
            <span class="text">Down From Today</span>
          </div>
        </div>
        <i class='bx bx-cart cart three' ></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Deliverd</div>
            <?php
            $db = new mysqli('localhost', 'root'
                , '', 'project');
            $qryStr = "SELECT COUNT(*) FROM `shopping-list` where sales='Delivered'";
            $res = $db->query($qryStr);
            $num2=$res->num_rows;
            echo "<div class='number'>$num2</div>";

            ?>
          <div class="indicator">
            <i class='bx bx-down-arrow-alt down'></i>
            <span class="text">Down From Today</span>
          </div>
        </div>
        <i class='bx bxs-cart-download cart four' ></i>
      </div>
    </div>

    <div class="sales-boxes">
      <div class="recent-sales box">
          <table class="table">
              <thead class="thead-light">
              <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Type</th>
                  <th scope="col">Price</th>
                  <th scope="col">Sales</th>
              </tr>
              </thead>
              <tbody>
              <?php
              try {
                      $db = new mysqli('localhost', 'root'
                          , '', 'project');
                      $qryStr = "select * from `shopping-list`";
                      $res = $db->query($qryStr);
                      if ($res) {
                          while ($row = mysqli_fetch_assoc($res)) {
                              $sales = $row['sales'];
                              $typ = $row['Type'];
                              $pri_after = $row['Discount'];
                              $img=$row['img'];
                              //$_SESSION['idupdate']=$id;
                              echo '<tr>
      <td>
      <img src="image/'.$img.'" style="height: 50px;width: 100px"/>
</td><td>' . $typ . ' </td>
      <td>' . $pri_after . '</td>
       <td>' . $sales . '</td>
    </tr>';

                          }
                      }
                      $db->close();
                  }
              catch
              (Exception $exception){

              }

              ?>



              </tbody>
          </table>

         </div>
      <div class="top-sales box">
        <div class="title">Delivered product</div>
        <ul class="top-sales-details">
            <?php
            try {
                $db = new mysqli('localhost', 'root'
                    , '', 'project');
                $qryStr = "select * from `shopping-list` where sales='Delivered'";
                $res = $db->query($qryStr);
                if ($res) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $price = $row['Discount'];
                        $type = $row['Type'];
                        echo '
            <li>
            <a href="#">
              <!--<img src="images/sunglasses.jpg" alt="">-->
              <span class="product">'.$type.'</span>
            </a>
            <span class="price">'.$price.'</span>
          </li>';
                    }
                }
            }catch (Exception $exception){

            }
            ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<script>
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");
  sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  }
</script>

</body>
</html>

