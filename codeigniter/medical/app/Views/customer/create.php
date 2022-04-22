<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 Add User With Validation Demo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }
    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <form method="post" id="add_create" name="add_create" 
    action="<?= base_url('/customer/submit') ?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group">
        <label>mobile</label>
        <input type="text" name="mobile" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">create customer</button>
      </div>
    </form>
  </div>
</body>
</html>