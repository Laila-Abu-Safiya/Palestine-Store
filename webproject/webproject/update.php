<?php
session_start();
if( isset($_POST["insert"]))
{
    $userid=$_SESSION['id'];
    $type=$_POST["stype"];
    $num=$_POST["snum"];
    $price=$_POST["sprice"];
    $color=$_POST["scolor"];
    $pric_after=$_POST["sprice_after"];
    $file = $_FILES['image']['name'];
    $target="image/".basename($_FILES['image']['name']);
    $id=$_GET['updateid'];


    try {
        $db = new mysqli('localhost', 'root', '', 'project');
        $query = "update `store-merc` set type='$type',number='$num', color='$color',
price='$price',price_after='$pric_after',img='$file',id_user='$userid' where id='$id'";
        $rs = $db->query($query);
        $db->commit();
        $db->close();
        if($rs == 1)
        {

            echo '<script>alert('.$userid.')</script>';
            echo '<script>alert('.$id.')</script>';
            header("Location: mystore.php?userid={$userid}");

        }
        else{
            echo '<script>alert("Image not Inserted into Database")</script>';

        }
    }catch (Exception $exception){

    }

}elseif (isset($_GET['saleid'])){
    $id=$_GET['saleid'];
    try {
        $db = new mysqli('localhost', 'root', '', 'project');
        $query = "update `shopping-list` set sales='Delivered' where id='$id'";
        $rs = $db->query($query);
        $db->commit();
        $db->close();
            header("Location: Admin_delivery.php");

    }catch (Exception $exception){

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="244045494_4444413118973348_6341370727680401580_n.png">
    <title>Palestine Store</title>
    <link rel="stylesheet" href="addToStore.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>
<body>
<div class="side">
    <div class="side-icon">
        <h1><span class="lab la-pinterest"></span> Palestine Store</h1>
    </div>
    <div class="side-menu">
        <ul>
            <li>

                <a href="" class="active"><span class="lab la-buromobelexperte"></span>
                    <span>My Store</span></a>
            </li>
            <li>
                <a href=""><span class="las la-store"></span>
                    <span>Add to Store</span></a>
            </li>
            <li>
                <a href=""><span class="las la-shopping-bag"></span>
                    <span>Sales list</span></a>
            </li>
            <li class="bottom">
                <a href="test.php"><span class="las la-undo"></span>
                    <span>Log Out</span></a>
            </li>

        </ul>
    </div>
</div>
<div class="contactform1">
    <h2>Add a new item</h2>
    <form method="post" action="update.php" enctype="multipart/form-data">
        <div class="imagepart">
            <div class="container">
                <div class="wrapper">
                    <div class="image">
                        <img src="" alt="">
                    </div>
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="text">
                            No file chosen, yet!
                        </div>
                    </div>
                    <div id="cancel-btn">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="file-name">
                        File name here
                    </div>
                </div>
                <button onclick="defaultBtnActive()" id="custom-btn">Choose a photo</button>
                <input id="default-btn" type="file" accept="image/*" hidden name="image">
            </div>
            <script>
                const wrapper = document.querySelector(".wrapper");
                const fileName = document.querySelector(".file-name");
                const defaultBtn = document.querySelector("#default-btn");
                const customBtn = document.querySelector("#custom-btn");
                const cancelBtn = document.querySelector("#cancel-btn i");
                const img = document.querySelector("img , picture");
                let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
                function defaultBtnActive(){
                    defaultBtn.click();
                }
                defaultBtn.addEventListener("change", function(){
                    const file = this.files[0];
                    if(file){
                        const reader = new FileReader();
                        reader.onload = function(){
                            const result = reader.result;
                            img.src = result;
                            wrapper.classList.add("active");
                        }
                        cancelBtn.addEventListener("click", function(){
                            img.src = "";
                            wrapper.classList.remove("active");
                        })
                        reader.readAsDataURL(file);
                    }
                    if(this.value){
                        let valueStore = this.value.match(regExp);
                        fileName.textContent = valueStore;
                    }
                });
            </script>
        </div>
        <div class="fieldpart">
            <div class="inputBox1">
                <div class="selectdiv">
                    <label>
                        <select required name="stype">
                            <option selected> </option>
                            <option>Home</option>
                            <option>Clothes</option>
                            <option> Accessories</option>
                            <option> Protective equipment</option>
                            <option> Electronics</option>
                            <option> Sport</option>
                        </select>
                    </label>
                </div>
                <span>Type</span>
            </div>
            <div class="inputBox1">
                <input type="number" required="required" name="snum">
                <span>Number</span>
            </div>
            <div class="inputBox1">
                <div class="selectdiv">
                    <label>
                        <select required itemtype="color" name="scolor">
                            <option selected></option>
                            <option>Black</option>
                            <option>Red</option>
                            <option>Yellow</option>
                            <option>Green</option>
                            <option>Blue</option>
                            <option>Orange</option>
                            <option>Brown</option>
                            <option>White</option>
                        </select>
                    </label>
                </div>
                <span >color</span>
            </div>
            <div class="inputBox1">
                <input  type="text" name="sprice" required="required" >
                <span >Price</span>
            </div>
            <div class="inputBox1">
                <input type="text" name="sprice_after" placeholder="price ofter discount if any">
                <span>Discount*</span>
            </div>
            <div>
                <br>
            </div>
            <div class="bottun1">
                <button type="submit" name="insert"><span></span>Update</button>
            </div></div>
    </form>
</div>

</body>
</html>