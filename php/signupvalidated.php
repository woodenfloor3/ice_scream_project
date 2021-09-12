<?php 

include 'config.php';


if(isset($_POST['submit']))
{
	$id='';
	$fname=$_POST['firstname'];
	$lname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$address=$_POST['address'];
	
	$sql= "insert into sign-up values ('$id','$fname','$lname','$email',$password','$address')";
            
	$result = mysqli_query($con, $sql);
            if($result)
                {
                    echo "Success";
                }
                else{
                    echo "Failed" ;
                }


            }
            ?>