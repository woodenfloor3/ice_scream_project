<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>

<h2>Employee Details</h2>

<table border="4">
  <tr>
    <td>id</td>
    <td>flavour</td>
    <td>description</td>
    <td>stock</td>
    <td>price</td>
  </tr>

<?php

include "config.php"; // Using database connection file here

$sql= mysqli_query($conn,"select * from tbproducts"); // fetch data from database

while($data = mysqli_query($conn,$sql))
{
?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['description']; ?></td>
	<td><?php echo $data['stock']; ?></td> 
	<td><?php echo $data['price']; ?></td>   
    <td><a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></td>
    <td><a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
  </tr>	
<?php
}
?>
</table>

</body>
</html>