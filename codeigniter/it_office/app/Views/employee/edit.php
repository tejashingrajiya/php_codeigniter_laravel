<!DOCTYPE html>
<html>
<head>
<title>Codeigniter 4 Edit User Form With Validation Example</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
</head>
<body>
<div class="container">
<br>
<span class="d-none alert alert-success mb-3" id="res_message"></span>
<div class="row">
<div class="col-md-9">
<form action="<?php echo base_url('/update');?>" name="edit-user" id="edit-user" method="post" accept-charset="utf-8">
<input type="hidden" name="id" class="form-control" id="id" value="<?php echo $employee['id'] ?>">
<div class="form-group">
<label for="email">employee Id</label>
<input type="text" name="employee_id" class="form-control" id="employee_id" placeholder="Please enter employee id" value="<?php echo $employee['employee_id'] ?>">
</div>
<div class="form-group">
<label for="formGroupExampleInput">employee name</label>
<input type="text" name="employee_name" class="form-control" id="formGroupExampleInput" placeholder="Please enter employee_name" value="<?php echo $employee['employee_name'] ?>">
</div>
<div class="form-group">
<button type="submit" id="send_form" class="btn btn-success">Submit</button>
</div>
</form>
</div>
</div>
</div>
</body>
</html>
