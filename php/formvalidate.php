<?php
    $name = $_POST['usr_name'];
    $pass = $_POST['pass_word'];
   
    $namelog = 'arif';
    $passlog = 'arif';

    if($name==$namelog)
    {
        if($pass==$passlog)
        {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.location.href='../SECOND.html'
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