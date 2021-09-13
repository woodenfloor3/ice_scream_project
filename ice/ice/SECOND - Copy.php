<?php 
session_start();
?>
<!doctype html>
<html lang="en">

<head> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>ice cream shop</title>
</head>

<body>
    <div id="home" style="position: relative;" class="container surface p-3 mb-5 rounded">
        <div class="icons" data-toggle="modal" data-target="#info">
            <img src="img/info.png" alt="add-to-cart">
            <h3 class="icons-title">Info</h3>   

        </div>
        <nav class="row navbar navbar-expand-md navbar-light">
            <div class=" col-lg-6 d-flex justify-content-between">
                <a class="logo" href="#home">ICE CREAM</a>
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse " id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item myitem">
                        <a class="nav-link font-weight-bold" href="#shop">Shop </a>
                    </li>
                    <li class="nav-item myitem">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item myitem">
                        <a class="nav-link" href="loginpage-Copy.php">logout</a>
                    </li>
                  </ul>
            </div>
        </nav>

        <div class="container row starter col-xs-12">
            <div class="header col-lg-8 col-xm-12">
                <h3 class="header-title">HAND-MADE ICE CREAM !</h3>
                <p class="descreption">Lorem ipsum dolor sit, amet consectetur adipisicing elit.<br> Dolorum architecto commodi ipsum quas deleniti ea corrupti a dignissimos?<br> Soluta, repudiandae.</p>
                <div class="buttons">
                    <a class="btn btn-danger shop shadow  rounded " href="#shop">Shop <span class="badge badge-light"></span></a>
                    <a class="btn btn-primary text-white" href="#contact">Contact Us <span class="badge badge-light"></span></a>
                </div>
            </div>
        </div>

    </div>

    <div id="login" style="position: relative;" class="container surface p-3 mb-5 rounded">
        <img src="img/wave.png" id="wave" class="pc"alt="wave">


        <div class="container-fluid">
           

            <row class="row">
                <div class="col-md pc">
                    <img src="img/access.svg" id="access">
                </div>
                <div class="col-md">
                    <br><br><br><br><br><br><br><br>
                    <form action="index.html" class="text-center">
                        <img src="img/avatar.svg"style="width: 20%;height: 20%;" alt="" >
                        <br><br>
                        <h2 style="font-weight: 625;padding-bottom: 15px;"> Welcome!!!
                        <?php
                        if ($_SESSION['ok']> 0 )
                            {
                                echo $_SESSION['usid'];
                                
                            }
                        else{
                            echo "no one is logged in";
                        }

                        ?>
</h2>   

                    </form>
                </div>
            </row>
            
        </div>


    </div>

    <div id="shop" style="position: relative;" class="container surface p-3 mb-5 rounded">
        <div class=" col-lg-6 d-flex p-2 justify-content-between">
            <a class="logo" href="#shop">SHOP</a>
        </div>
        <div id="shop-container" class="d-flex justify-content-around flex-wrap">
        
        <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ice-cream";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
         $sql = "SELECT id,flavour,description,price FROM products";
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
           // output data of each row
           while($row = $result->fetch_assoc()) {
        ?>
        <div class="card" style="width: 500px;">
             <div class="card-body" id="<?php echo $row["id"]?>">
                <img class="card-img-top float-right rounded" src=<?php echo "img/".$row["flavour"].".jpeg"?> style="height: 150px; width: 210px;" alt="">
               <h4 class="card-title"><?php echo $row["flavour"]?></h4>
               <p class="card-text"><?php echo $row["description"]?></p>
               <span class="badge badge-pill badge-success p-2"><?php echo $row["price"]?> &#8377</span>
               <form method="POST">
                <input type="number" name="quan" min="1" max="5" value="1" placeholder="Quantity" required>
                <input class="form-control" type="hidden" name="hiddenId" value="<?php echo $row["id"]?>">
                <input class="form-control" type="hidden" name="hiddenname" value="<?php echo $row["flavour"]; ?>">
                <input class="form-control" type="hidden" name="hiddenprice" value="<?php echo $row["price"]; ?>">
                <button type="submit" name="addcart" class="card-link btn btn-outline-dark"> Add to cart</button>
               </form>
             </div>
             </div>
        <?php
         }
         $conn->close();
        }
         ?>
    </div>
    <?php
    if(isset($_POST['addcart'])){
    
        $_SESSION['IceCart'][] = array(
            'id' => $_POST['hiddenId'],
            'name' => $_POST['hiddenname'],
            'price' => $_POST['hiddenprice'],
            'quan' => $_POST['quan'],
        );
    }
    ?>
    <?php
     if(isset($_GET['empty'])){
        unset($_SESSION['IceCart']);
    }

    if(isset($_GET['remove'])){
        $id = $_GET['remove'];
        foreach($_SESSION['IceCart'] as $k => $part){
            if($id == $part['id']){
                unset($_SESSION['IceCart'][$k]);
            }
        }

    }
    $total=0;
?>



    <!-- Cart -->
    <div id="cart" style="position: relative;" class="container surface p-3 mb-5 rounded">

            
            <h3 class="modal-title">CART</h3>
            <form method="POST"action="order.php">
            <table style="border-bottom: 1px #e3e3e3 solid; margin-bottom:20px;">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Remove</th>
            </tr>

            <?php if(isset($_SESSION['IceCart'])) :?>
                <?php foreach($_SESSION['IceCart'] as $k => $item):?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['quan']; ?></td>
                        <td><?php echo $item['price'] * $item['quan']; 
                                        $pro = $item['price'] * $item['quan'];
                                        $total += $total + $pro;
                                        ?></td>
                                    
                        <td><a href="SECOND - Copy.php?remove=<?php echo $item['id']; ?>">Remove</a></td>
                    </tr>
                    <?php
if(isset($_POST['submit']))
{
 $dbhost= "localhost";
 $username = "root";
 $password = "";
 $dbname = "ice-cream";
// Create connection
$conn =  mysqli_connect($dbhost, $username, $password, $dbname) or 
die("Could not connect " . mysqli_error($conn));
    $id=$_POST['orderid'];
	$product=$_POST['product'];
	$price=$_POST['price'];
	$username=$_SESSION['usid'];
	
	
	$sql= "INSERT INTO iceorder (orderid,product,price,'{$_SESSION['usid']});
     VALUES ('$id','$product','$price','$username',)";
            
	$result = mysqli_query($conn, $sql);
            if($result)
                {
                    echo "Success";
                }
                else{
                    echo "Failed" ;
                }


            }
            ?>
                <?php endforeach ?>

            <?php endif ?>
        </table>
    
            <!-- Modal body -->
            <div class="modal-body">
            
            <button type class="btn btn-warning">order </button>

           
</form>
   
        </div>

        </div>
        </div>
        </div>
        
        </div>
        </div>
    </div>
   

    <!-- Info -->
    <div class="modal fade" id="info">
            <div class="modal-dialog">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                <h3 class="modal-title">INFO</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <p>
                        Ice cream has incredible benefits as, and you shouldn’t feel guilty for treating yourself every so often! After all, it’s summer.
                        However, be sure that when you do treat yourself to gelato, frozen yogurt cups, or another dessert, that you do so in moderation.<br> Stay fresh!</p>
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
    
            </div>
            </div>
    </div>
    

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="js/script.js"></script>
</body>
</html>
