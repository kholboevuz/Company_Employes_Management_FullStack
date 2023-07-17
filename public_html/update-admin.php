
<?php

require 'authentication.php'; // admin authentication check 

// auth check
$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$security_key = $_SESSION['security_key'];
if ($user_id == NULL || $security_key == NULL) {
    header('Location: index.php');
}


$admin_id = $_GET['admin_id'];

if(isset($_POST['update_current_employee'])){
    $obj_admin->update_admin_data($_POST,$admin_id);
}

if(isset($_POST['btn_user_password'])){
    $obj_admin->update_user_password($_POST,$admin_id);
}

$sql = "SELECT * FROM tbl_admin WHERE user_id='$admin_id' ";
$info = $obj_admin->manage_all_info($sql);
$row = $info->fetch(PDO::FETCH_ASSOC);
             
$page_name="Admin";
include("include/sidebar.php");

?>


    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <ul class="nav nav-tabs nav-justified nav-tabs-custom">
            <li><a href="manage-admin.php">Boshqaruv bo'limi</a></li>
            <li><a href="admin-manage-user.php">Texnopark xodimi</a></li>
          </ul>
          <div class="gap"></div>

          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="well" style="background:#fff !important">
                <h3 class="text-center bg-primary" style="padding: 7px;">Tahrirlash</h3><br>


                      <div class="row">
                        <div class="col-md-7">
                          <form class="form-horizontal" role="form" action="" method="post" autocomplete="off">
                            <div class="form-group">
                              <label class="control-label col-sm-3">To'liq ismi</label>
                              <div class="col-sm-8">
                                <input type="text" value="<?php echo $row['fullname']; ?>" placeholder="To'liq ismi" name="em_fullname" list="expense" class="form-control rounded-0" id="default" required>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="control-label col-sm-3">Xodim ID</label>
                              <div class="col-sm-8">
                                <input type="text" value="<?php echo $row['username']; ?>" placeholder="Xodim ID" name="em_username" class="form-control rounded-0" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-3">Lavozim</label>
                              <div class="col-sm-8">
                                <input type="text" value="<?php echo $row['email']; ?>" placeholder="Lavozim" name="em_email" class="form-control rounded-0" required>
                              </div>
                            </div>
                      
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-4 col-sm-3">
                                <button type="submit" name="update_current_employee" class="btn btn-primary-custom">Yangilash</button>
                              </div>
                            </div>
                          </form> 
                        </div>
                        <div class="col-md-5">
                          <a href="admin-password-change.php?admin_id=<?php echo $row['user_id'];?>">Parolni tiklash</a>
                          
                          
                        </div>
                      </div>

              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>


<?php

include("include/footer.php");

?>
