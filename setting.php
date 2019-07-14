<?php require_once 'includes/header.php';
include_once 'php_action/changeUsername.php';
include_once 'php_action/changePassword.php';
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item">Setting</li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
          </ol>
        </nav>

        <div class="card">
          <div class="card-header">
            <i class="fa fa-wrench fa-fw"></i> Edit Data
          </div>
          <div class="card-body">
            <form class="form-horizontal" action="setting.php" method="post">
              <fieldset>
                <legend>Change Username</legend>
                <hr>
                <div class="messages">
                  <?php
                    if(isset($_SESSION['success'])){
                  ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check fa-fw"></i><strong>Success</strong> <?=$_SESSION['success']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php
                      unset($_SESSION['success']);
                    }
                    if(isset($_SESSION['error'])){
                  ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation fa-fw"></i><strong>Error</strong> <?=$_SESSION['error']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php
                      unset($_SESSION['error']);
                    }
                  ?>
                </div>
                <div class="form-group">
    					    <label for="username" class="col-sm-2 control-label">Username</label>
    					    <div class="col-sm-10">
    					      <input type="text" class="form-control" name="username" placeholder="Username"  required autocomplete="off" value="<?php echo $_SESSION['username']; ?>"/>
    					    </div>
    					  </div>
    					  <div class="form-group">
    					    <div class="col-sm-offset-2 col-sm-10">
    					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id_user'] ?>" />
    					      <button type="submit" class="btn btn-success" name="editUsername"> <i class="fa fa-check-circle fa-fw" ></i> Save Changes </button>
    					    </div>
    					  </div>
              </fieldset>
            </form>

            <form class="form-horizontal" action="setting.php" method="post">
              <fieldset>
    						<legend>Change Password</legend>
                <hr>
                <div class="messages">
                  <?php
                    if(isset($_SESSION['success'])){
                  ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check fa-fw"></i><strong>Success</strong> <?=$_SESSION['success']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php
                      unset($_SESSION['success']);
                    }
                    if(isset($_SESSION['error'])){
                  ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation fa-fw"></i><strong>Error</strong> <?=$_SESSION['error']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php
                      unset($_SESSION['error']);
                    }
                  ?>
                </div>
    						<div class="form-group">
    					    <label for="password" class="col-sm-2 control-label">Current Password</label>
    					    <div class="col-sm-10">
    					      <input type="password" class="form-control" id="password" name="password" required placeholder="Current Password">
    					    </div>
    					  </div>

    					  <div class="form-group">
    					    <label for="npassword" class="col-sm-2 control-label">New password</label>
    					    <div class="col-sm-10">
    					      <input type="password" class="form-control" id="npassword" name="npassword" required placeholder="New Password">
    					    </div>
    					  </div>

    					  <div class="form-group">
    					    <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
    					    <div class="col-sm-10">
    					      <input type="password" class="form-control" id="cpassword" name="cpassword" required placeholder="Confirm Password">
    					    </div>
    					  </div>
    					  <div class="form-group">
    					    <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id'] ?>" />
    					      <button type="submit" name="changePassword" class="btn btn-primary"> <i class="fa fa-check-circle fa-fw"></i> Save Changes </button>
    					    </div>
    					  </div>
    					</fieldset>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php require_once 'includes/footer.php';?>
