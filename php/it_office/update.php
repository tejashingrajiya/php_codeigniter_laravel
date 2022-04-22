<?php 

include "connection.php";

    if (isset($_POST['update'])) {

        $id = $_POST['id'];
        $office_id = $_POST['office_id'];

		$name = $_POST['name'];
 

        $sql = "UPDATE `it_offices` SET `office_id`='$office_id',`name`='$name' WHERE `id`='$id'"; 

        $result = mysqli_query($conn,$sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $id = $_GET['id']; 

    $sql = "SELECT * FROM `it_offices` WHERE `id`='$id'";

    $result = mysqli_query($conn,$sql); 

    if ($result->num_rows > 0) {        

                while ($row = mysqli_fetch_assoc($result)) {

            $office_id = $row['office_id'];

            $name = $row['name'];

            $id = $row['id'];

        } 

    ?>

        <h2>User Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            First name:<br>

            <input type="text" name="office_id" value="<?php echo $office_id; ?>">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <br>

            Last name:<br>

            <input type="text" name="name" value="<?php echo $name; ?>">

            <br>

            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: index.php');

    } 

}

?> 