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
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item myitem">
                        <a class="nav-link" href="#AdminLogin" data-toggle="modal" data-target="#AdminLogin">Admin</a>
                    </li>
                  </ul>
            </div>
        </nav>

        <div class="container row starter col-xs-12">
            <div class="header col-lg-8 col-xm-12">
                <h3 class="header-title">HAND-MADE ICE CREAM !</h3>
                <p class="descreption">only ice-cream</p>
                <div class="buttons">
                    <a class="btn btn-primary text-white" href="#contact">Contact Us <span class="badge badge-light"></span></a>
                </div>
            </div>
        </div>

    </div>

    <div id="login" style="position: relative;" class="container surface p-3 mb-5 rounded">
        <img src="img/wave.png" id="wave" class="pc"alt="wave">

        

        <div class="container-fluid">
            <div class=" col-md-6 d-flex p-2 justify-content-between">
                <a class="logo" href="#sign-up" data-toggle="modal" data-target="sign-up">Sign up</a>
            </div>

            <row class="row">
                <div class="col-md pc">
                    <img src="img/access.svg" id="access">
                </div>
                <div class="col-md">
                    <form class="text-center" method="POST">
                        <img src="img/avatar.svg"style="width: 20%;height: 20%;" alt="" >
                        <h2 style="font-weight: 625;padding-bottom: 15px;">WELCOME</h2>
                        <div class="form-group">
                            <label for="text">Username</label>
                            <input type="text" class="form-control input" name="usr_name" >
                          </div>
                          <div class="form-group">
                            <label for="text">Password</label>
                            <input type="password" class="form-control input" name="pass_word">
                          </div>
                          <button type="submit" class="btn" name="submitlogin" id="btn-login">Login </button>
                          
                                    

                    </form>
                    <?php
                    if(isset($_POST['submitlogin']))
            {

                    $dbhost='localhost';
                    $dbname='ice-cream';
                    $dbusername='root';
                    $dbpass='';
                    $conn =mysqli_connect($dbhost,$dbusername,$dbpass,$dbname) or
                    die("Could not connect " . mysqli_error($conn));

                    $usid=$_POST['usr_name'];
                    $uspass=$_POST['pass_word'];
                    $sql="select * from signup where id ='$usid' and passwd = '$uspass'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    if($count>0)
                    {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.location.href='SECOND - Copy.php'
                    </SCRIPT>");
                    }
                    else
                    {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Invalid Password');
                                window.location.href='javascript:history.go(-1)';
                                </SCRIPT>");
                    }
                    $_SESSION['ok']=$count;
                $_SESSION['usid']=$usid;
                    
                }
                ?>

                </div>
            </row>
            
        </div>


    </div>

    

    
    
        </div>
    </div>
    <div id="contact" style="position: relative;" class="container surface p-3 mb-5 rounded">
        <a class="logo" href="#contact">Contact us</a>
            <p>For inquiries regarding product availability, ordering information, status of shipment, billing,
            spoiled merchandise, or returns, please contact Penguin Random House Customer Service at 1-800-733-3000.</p>
    </div>
    <div id="sign-up" style="position: relative;" class="container surface p-3 mb-5 rounded">
        <a class="logo" href="#sign-up"></a>
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">SIGN UP</h4>
                </div>
    
                <!-- Modal body -->
                <div class="modal-body">
                    <h2>Create your account!</h2>
                    <p>It's quick and easy:</p>
                    <form method="POST" class="was-validated">
                        <div class="row">
                            <div class="col">
                                <label for="firstname">First name:</label>
                                <input type="text" class="form-control" id="firstname" placeholder="Enter name" name="firstname" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="col">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="adress">Address:</label>
                                <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                           </div>
                        <div class="row">
                            <div class="col">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="abc@example.com" name="email" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="col">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember" required> I agree on Terms & Conditions.
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Check this checkbox to continue.</div>
                        </label>
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-block btn-primary">Submit</button>
                    </form>
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
    $id=$_POST['username'];
	$fname=$_POST['firstname'];
	$email=$_POST['email'];
	$passwd=$_POST['password'];
	$address=$_POST['address'];
	
	$sql= "INSERT INTO signup (id,fname,email,passwd,addr)
     VALUES ('$id','$fname','$email','$passwd','$address')";
            
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
    <div class="modal fade" id="AdminLogin">
        <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
            <h3 class="modal-title">admin</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <div id="items-container">
                <form class="text-center" method="POST">
                        <img src="img/avatar.svg"style="width: 20%;height: 20%;" alt="" >
                        <h2 style="font-weight: 625;padding-bottom: 15px;">Welcome Admin</h2>
                        <div class="form-group">
                            <label for="text">Username</label>
                            <input type="text" class="form-control input" name="usr" required >
                          </div>
                          <div class="form-group">
                            <label for="text">Password</label>
                            <input type="password" class="form-control input" name="pass" required>
                          </div>
                          <button type="submit" class="btn" name="Alogin" id="btn-login">Login </button>
                          
                                    

                    </form>
                    <?php
                    if(isset($_POST['Alogin']))
            {

                    $dbhost='localhost';
                    $dbname='ice-cream';
                    $dbusername='root';
                    $dbpass='';
                    $conn =mysqli_connect($dbhost,$dbusername,$dbpass,$dbname) or
                    die("Could not connect " . mysqli_error($conn));

                    $usid=$_POST['usr'];
                    $uspass=$_POST['pass'];
                    $sql="select * from admin where username ='$usid' and password ='$uspass'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    if($count>0)
                    {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.location.href='index1.php';
                    </SCRIPT>");
                    }
                    else
                    {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Invalid Password');
                                window.location.href='javascript:history.go(-1)';
                                </SCRIPT>");
                    }
                }
                 
                    ?>
    
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
