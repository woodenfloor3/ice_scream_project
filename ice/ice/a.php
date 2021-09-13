<?php
                    if(isset($_POST['submitlogin']))
            {

                    $dbhost='localhost';
                    $dbname='ice-cream';
                    $dbusername='root';
                    $dbpass='';
                    $conn =mysqli_connect($dbhost,$dbusername,$dbpass,$dbname) or
                    die("Could not connect " . mysqli_error($conn));

                    $usid=$_POST['usr'];
                    $uspass=$_POST['pass'];
                    $sql="select * from admin where id ='$usid' and passwd = '$uspass'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    if($count>0)
                    {
                        //echo ("<SCRIPT LANGUAGE='JavaScript'>
                    //window.location.href='index1.php';
                    //</SCRIPT>");
                    header("Location:http://localhost/ice/index1.php");
                    
                    }
                    else
                    {
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Invalid Password');
                                window.location.href='javascript:history.go(-1)';
                                </SCRIPT>");
                    }
                    $_SESSION['ok'] = $count;
                $_SESSION['us_id'] = $usid ; 
                }
                 
                    ?>
