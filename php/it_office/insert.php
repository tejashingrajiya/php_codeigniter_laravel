<?php 

include "connection.php";

  if (isset($_POST['submit'])) {

    $office_id = $_POST['office_id'];

    $name = $_POST['name'];

    $sql = "INSERT INTO `it_offices`(`office_id`, `name`) VALUES ('$office_id','$name')";

    $result = mysqli_query($conn,$sql);
	header('location: index.php');
  }
?>

<!DOCTYPE html>

<html>

<body>

<h2>Signup Form</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Personal information:</legend>

    office_id:<br>

    <input type="text" name="office_id">

    <br>

    name:<br>

    <input type="text" name="name">

    <br><br>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>

</body>

</html>