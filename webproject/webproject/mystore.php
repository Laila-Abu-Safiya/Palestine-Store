<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="244045494_4444413118973348_6341370727680401580_n.png">
    <title>Palestine Store</title>
    <link rel="stylesheet" href="mystore.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Palestine Store</title>
    <style>

    </style>
</head>
<body>
<?php
$iduser=$_GET['userid'];
echo '
<div class="side">
    <div class="side-icon">
        <h1 style="font-size: 26px;font-weight: 600"><span class="lab la-pinterest"></span> Palestine Store</h1>
    </div>
    <div class="side-menu">
        <ul>
            <li>

                <a href="" class="active"><span class="lab la-buromobelexperte"></span>
                    <span>My Store</span></a>
            </li>
            <li>
                <a href="addToStore.php?userid='.$iduser.'"><span class="las la-store"></span>
                    <span>Add to Store</span></a>
            </li>
            <li>
                <a href="sales_list.php?userid='.$iduser.'"><span class="las la-shopping-bag"></span>
                    <span>Sales list</span></a>
            </li>
            <li class="bottom">
                <a href="test.php"><span class="las la-undo"></span>
                    <span>Log Out</span></a>
            </li>

        </ul>
    </div>
</div>'
?>

<div class ="container" style="position: relative; left: 10%; top: 10%;" >
    <?php
    $iduser=$_GET['userid'];
    echo '
    <button class="btn btn-primary my-5" ><a href="addToStore.php?userid=' . $iduser. '" class="text-light">Add New</a>
    </button>';
    ?>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Type</th>
            <th scope="col">Number</th>
            <th scope="col">Color</th>
            <th scope="col">Price</th>
            <th scope="col">Price with discount</th>
            <th scope="col">Picture</th>
            <th scope="col">Process</th>
        </tr>
        </thead>
        <tbody>
        <?php
        session_start();
        try {
            if (isset($_GET['userid'])) {
                $iduser=$_SESSION['id'];
                $db = new mysqli('localhost', 'root'
                    , '', 'project');
                $qryStr = "select * from `store-merc` where id_user='$iduser' ";
                $res = $db->query($qryStr);
                if ($res) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $typ = $row['type'];
                        $num = $row['number'];
                        $colo = $row['color'];
                        $pri = $row['price'];
                        $pri_after = $row['price_after'];
                        $img=$row['img'];
                        //$_SESSION['idupdate']=$id;
                        echo '<tr>
      <th scope="row">' . $id . '</th>
      <td>' . $typ . ' </td>
      <td>' . $num . '</td>
      <td>' . $colo . '</td>
      <td>' . $pri . '</td>
      <td>' . $pri_after . '</td>
      <td>
      <img src="image/'.$img.'" style="height: 50px;width: 100px"/>
</td>
      <td>
            <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '& userid=' . $iduser . '" class="text-light">Update</a></button>
            <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . ' & userid=' . $iduser . '" class="text-light">Delete</a></button>
        </td>
    </tr>';

                    }
                }
                $db->close();
            }}
        catch
            (Exception $exception){

            }

        ?>



        </tbody>
    </table>
</div>

</body>
</html>