<?php
    $name = $_POST['email'];
   
   
    $namelog = 'arif@gmail.com';
    

    if($name==$namelog)
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('User Already Exists');
        window.location.href='javascript:history.go(-1)';
        </SCRIPT>");
    }
    else
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Successfully Registered');
        window.location.href='javascript:history.go(-1)';
        </SCRIPT>");
    }
?>