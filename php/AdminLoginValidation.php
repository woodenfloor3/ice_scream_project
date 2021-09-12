<?php
    $name = $_POST['usr'];
    

    $pass = $_POST['pass'];
   
    $namelog = 'woodenfloor';
    $passlog = 'woodenfloor';
    

    if($name==$namelog)
    {
        if($pass==$passlog)
        {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.location.href='../index1
            .php'
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
    else
    {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Invalid Userid');
        window.location.href='javascript:history.go(-1)';
        </SCRIPT>");
    }
?>
