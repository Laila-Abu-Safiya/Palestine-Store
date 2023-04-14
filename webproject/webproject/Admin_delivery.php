<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Palestine Store</title>
    <link rel="stylesheet" href="AddEmployee.css">
    <link rel="stylesheet" href="delivery2.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="244045494_4444413118973348_6341370727680401580_n.png">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
            padding: 10px;
            box-shadow: 2px 0 2px 0px #333333;
            width: 70px;
            left: -2px;
        }
    </style>
    <link rel="icon" href="244045494_4444413118973348_6341370727680401580_n.png">
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
            Delivery
        </h1>
    </header>
    <form action="" METHOD="post">
        <div class="add-shop">
            <h2 style="cursor: pointer">
                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input name="find" type="search" placeholder="Search here" style="font-size: 20px;">
                </div>
                <div class="s1" ><input type="submit" value="| search " name="search">
                    <span class="las la-search"></span></div>            </h2>
        </div></form>
    <div class="list">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Type</th>
                <th scope="col">Price</th>
                <th scope="col">Sales</th>
                <th scope="col">Control</th>
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
                            $id = $row['id'];
                            $typ = $row['Type'];
                            $num = $row['Discount'];
                            $colo = $row['sales'];
                            //$_SESSION['idupdate']=$id;
                            echo '<tr>
      <th scope="row">' . $id . '</th>
      <td>' . $typ . ' </td>
      <td>' . $num . '</td>
      <td>' . $colo . '</td>
</td>
      <td>
            <button style="background-color: transparent"><a style="background-color: green;" href="update.php?saleid=' . $id . '" class="text-light">Deliverd</a></button>
            <button  style="background-color: transparent"><a  href="delete.php?saleid=' . $id . '" class="text-light">Delete</a></button>
        </td>
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
</div>
</body>
</html>
