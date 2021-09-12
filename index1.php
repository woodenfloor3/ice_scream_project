<html>
<head>product info</head>
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
  $stmt = $conn->prepare("SELECT id, flavour, description, stock, price  FROM products");
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

          <input type="submit" name="delete" value="Delete Data">

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


          <input type="submit" name="add" value="Add Data">

        </form>

    </body>

</html>
