<?php 
	
	include "connection.php";
	
    if (isset($_POST['update'])) {
		
        $id = $_POST['id'];
        
		$firstname = $_POST['name'];
		
        $email = $_POST['email'];
		
        $sql = "UPDATE `php_basic` SET `name`='$firstname',`email`='$email' WHERE `id`='$id'"; 
		
		$result = mysqli_query($conn, $sql);
		
        if ($result == TRUE) {
			
            echo "Record updated successfully.";
			
			}else{
			
            echo "Error:" . $sql . "<br>" . $conn->error;
			
		}
		
	} 
	
	if (isset($_GET['id'])) {
		
		$id = $_GET['id']; 
		
		$sql = "SELECT * FROM `php_basic` WHERE `id`='$id'";
		
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result)>0) {
			
                while ($row = mysqli_fetch_array($result)) {
				
				$first_name = $row['name'];
			
				$email = $row['email'];
				
				$id = $row['id'];
				
			} 
			
		?>
		
        <h2>User Update Form</h2>
		
        <form action="" method="post">
			
			<fieldset>
				
				<legend>Personal information:</legend>
				
				First name:<br>
				
				<input type="text" name="name" value="<?php echo $first_name; ?>">
				
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				
				<br>
				
				Email:<br>
				
				<input type="text" name="email" value="<?php echo $email; ?>">
				
				<br><br>
				
				<input type="submit" value="Update" name="update">
				
			</fieldset>
			
		</form> 
		
	</body>
	
</html> 

<?php
	
    } else{ 
	
	header('Location: display.php');
	
} 

}

?> 