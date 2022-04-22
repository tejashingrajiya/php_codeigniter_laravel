<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Codeigniter 4 users List Example - Tutsmake.com</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
 
<div class="container mt-5">
    <a href="<?php echo base_url('employee/create') ?>" class="btn btn-success mb-2">Create</a>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="">
     <table class="" id="users">
       <thead>
          <tr>
             <th>Id</th>
             <th>employee_id</th>
             <th>employee_name</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($employees): ?>
          <?php foreach($employees as $employee): ?>
          <tr>
             <td><?php echo $employee['id']; ?></td>
             <td><?php echo $employee['employee_id']; ?></td>
             <td><?php echo $employee['employee_name']; ?></td>
             <td>
              <a href="<?php echo base_url('employee/edit/'.$employee['id']);?>" class="btn btn-success">Edit</a>
              <a href="<?php echo base_url('employee/delete/'.$employee['id']);?>" class="btn btn-danger">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
 
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" type="text/javascript"></script>
 
<script>
    $(document).ready( function () {
      $('#users').DataTable();
  } );
</script>
</body>
</html>