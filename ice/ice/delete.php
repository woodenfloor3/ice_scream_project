<?php

// php delete data in mysql database using PDO

if(isset($_POST['delete']))
{
    try {
        $pdoConnect = new PDO("mysql:host=localhost;dbname=ice-cream","root","");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
     // get id to delete

    $id = $_POST['id'];
    
     // mysql delete query 

    $pdoQuery = "DELETE FROM `users` WHERE `id` = :id";
    
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":id"=>$id));
    
    if($pdoExec)
    {
        echo 'Data Deleted';
    }else{
        echo 'ERROR Data Not Deleted';
    }

}

?>