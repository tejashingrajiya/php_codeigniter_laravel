<?php 

include "connection.php";

$sql = "SELECT * FROM it_offices";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>
	<a class="btn btn-primary" href="insert.php" role="button">insert data</a>
    <div class="container">

        <h2>users</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>office_id</th>

        <th>Name</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['office_id']; ?></td>

                    <td><?php echo $row['name']; ?></td>
					
                    <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>