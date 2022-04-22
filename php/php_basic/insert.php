<?php 

include "connection.php";

  if (isset($_POST['submit'])) {

    $first_name = $_POST['name'];
    
    $email = $_POST['email'];
	
    $sql = "INSERT INTO `php_basic`(`name`,`email`) VALUES ('$first_name','$email')";

    $result = mysqli_query($conn, $sql);

    if ($result == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    //$conn->close(); 

  }

?>

<!DOCTYPE html>

<html>

<body>

<h2>Signup Form</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Personal information:</legend>

    First name:<br>

    <input type="text" name="name">

    <br>

    Email:<br>

    <input type="text" name="email">

    <br>

   <br>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>

</body>

</html>