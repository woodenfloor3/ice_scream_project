<html>
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
<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>flavour</th><th>description</th><th>stock</th><th>price</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function construct($it) {
    parent::construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ice-cream";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT id, flavour, description, stock, price  FROM products ORDER BY id ASC");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>



<?php

// php delete data in mysql database using PDO

if(isset($_POST['delete']))
{
    try {
        $pdoConnect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
     // get id to delete

    $id = $_POST['id'];
    
     // mysql delete query 

    $pdoQuery = "DELETE FROM `products` WHERE `id` = :id";
    
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

        <form action="index1.php" method="post">

          ID To Delete <input type="text" name="id" required><br><br>

          <input type="submit" name="delete" class="btn btn-danger" value="Delete Data">

</form>

    
<?php

// php delete data in mysql database using PDO

if(isset($_POST['add']))
{
    try {
        $pdoConnect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
     // get id to delete
    $id = $_POST['id'];
    $flavour = $_POST['flavour'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    
    
     // mysql add item

    $pdoQuery = "INSERT INTO `products`(id,flavour,description,stock,price) VALUES(:id,:flavour,:description,:stock,:price)";
    
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(':id'=>$id,':flavour'=>$flavour,':description'=>$description,':stock'=>$stock,':price'=>$price));
    
    if($pdoExec)
    {
        echo "Data Added";
    }
    else
    {
        echo "ERROR Data Not Added";
    }

}

?>

        <form action="index1.php" method="post">
        <label ice-cream id :> <input type="number" name="id" placeholder="enter id"  required><br><br>
         <label ice-cream to add :> <input type="text" name="flavour" placeholder="enter flavour"  required><br><br>
         <label description :> <input type="text" name="description" placeholder="enter description" required><br><br>
         <label stock:> <input type="number" name="stock" placeholder="enter stock in kgs"required><br><br>
         <label price :> <input type="number" name="price"placeholder="price in rupees" required><br><br>


          <input type="submit" name="add" class="btn btn-success"value="Add Data">

        </form>
        <br><br>



        <?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>product</th><th>price</th><th>username</th></tr>";

class TableRowss extends RecursiveIteratorIterator {
  function construct($it) {
    parent::construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ice-cream";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmto = $conn->prepare("SELECT * FROM iceorder");
  $stmto->execute();

  // set the resulting array to associative
  $result = $stmto->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRowss(new RecursiveArrayIterator($stmto->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
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
