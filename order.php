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
    <div id="order" style="position: relative;" class="container surface p-3 mb-5 rounded">
        <a class="logo" href="#order">Your Order</a>
            <p>Thank You <?php
                        if ($_SESSION['ok']> 0 )
                            {
                                echo $_SESSION['usid'];
                                
                            }
                        else{
                            echo "error Occured";
                        }

                        ?> for Ordering with us Below are you Order Details</p>

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

        $sql= "SELECT * FROM iceorder";
        $result = $conn->query($sql);
        $total = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $total += $row['price'];
            }
        }
        echo "the total Amount is ₹ $total";
?>
    </div>
</body>
</html>
