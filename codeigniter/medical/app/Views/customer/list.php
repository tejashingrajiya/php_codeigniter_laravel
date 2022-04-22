
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Codeigniter 4 CRUD App Example - positronx.io</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo base_url('/customer/create') ?>" class="btn btn-success mb-2">Add User</a>
	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="users-list">
       <thead>
          <tr>
             <th>customer Id</th>
             <th>Name</th>
             <th>mobile</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
         <?php if($customers): ?>
          <?php foreach($customers as $customer): ?>
          <tr>
             <td><?php echo $customer['id']; ?></td>
             <td><?php echo $customer['name']; ?></td>
             <td><?php echo $customer['mobile']; ?></td>
             <td>
              <a href="<?php echo base_url('customer/edit/'.$customer['id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('customer/delete/'.$customer['id']);?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>  
       </tbody>
     </table>
  </div>
</div>
</body>
</html>