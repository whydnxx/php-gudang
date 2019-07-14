<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/do_login.php';
if (isset($_SESSION['role_level'])) {
  if ($_SESSION['role_level'] == "admin") {
    echo "<script>alert('Maaf anda sudah login'); window.location.replace('http://localhost/gudang/dashboard.php')</script>";
  }
  else if ($_SESSION['role_level']) {
    echo "<script>alert('Maaf anda sudah login'); window.location.replace('http://localhost/gudang/dashboard.php')</script>";
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventory | Login</title>
    <!-- Bootstrap core CSS-->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="assets/custom/custom.css" rel="stylesheet">
  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="card card-login mx-auto mt-5 col-md-6">
          <div class="card-header"><i class="fa fa-user"></i>    Please Sign In</div>
          <div class="card-body">
            <div class="message">
              <?php
                if ($errors) {
                  foreach ($errors as $key => $value) {
                    echo '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <i class="fa fa-exclamation-triangle"></i>   '.$value.'
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
                    </div>
                    ';
                  }
                }
              ?>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
             <div class="form-group">
               <label for="username">Username</label>
               <input class="form-control" type="text" id="username" name="username" placeholder="Enter Username" autocomplete="off">
             </div>
             <div class="form-group">
               <label for="password">Password</label>
               <input class="form-control" type="password" id="password" name="password" placeholder="Enter password"  autocomplete="off">
             </div>
             <div class="form-group">
               <button type="submit" class="btn btn-outline-dark btn-block" name="login"> <i class="fa fa-sign-in"></i> Sign in</button>
             </div>
           </form>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets/custom/custom.js"></script>
  </body>
</html>
