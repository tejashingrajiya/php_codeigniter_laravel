<?php 

include "connection.php";

$sql = "SELECT * FROM php_basic";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">

        <h2>users</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>First Name</th>

        <th>Email</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

                while ($row = mysqli_fetch_array($result)) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['name']; ?></td>
					
                    <td><?php echo $row['email']; ?></td>

                    <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
						<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
					</td>

                    </tr>                       

        <?php       }


        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>