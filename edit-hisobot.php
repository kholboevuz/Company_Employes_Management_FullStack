<?php

require 'authentication.php'; // admin authentication check 

// auth check
$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$security_key = $_SESSION['security_key'];
if ($user_id == NULL || $security_key == NULL) {
    header('Location: index.php');
}

// check admin
$user_role = $_SESSION['user_role'];
$page_name="Edit Task";
include("include/sidebar.php");

?>

<?php
  require 'database.php';
?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom rounded-0">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="well rounded-0">
                <h3 class="text-center bg-primary" style="padding: 7px;">Hisobotni tahrirlash </h3><br>

                      <div class="row">
						
                        <div class="col-md-12">
                          <form class="form-horizontal" role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
			                    <label class="control-label text-p-reset">Ismingizni kiriting</label>
			                    <div class="">
			                      <input type="text"  placeholder="Ismingizni kiriting" id="task_title" name="task_title" list="expense" value = "<?= $posts['hisobot']  ?>" class="form-control rounded-0" value="" required>
			                    </div>
			                  </div>
			                  <div class="form-group">
			                    <label class="control-label text-p-reset">Hisobotni to'liq kiriting</label>
			                    <div class="">
			                      <textarea name="task_description" id="task_description" placeholder="Hisobotni to'liq kiriting" class="form-control rounded-0" rows="5" cols="5"></textarea>
			                    </div>
						
                       
                            <div class="form-group">
                              <div class="col-sm-3">
								<br><br>
                            <button type="submit"  value="Upload" name="update_task_info" class="btn btn-primary-custom">Yangilash</button>
                              </div>
                            </div>
                          </form> 
                        </div>
                      </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

	<script>
		alert ("Tez orada qo'shiladi");
	</script>

	<script type="text/javascript">
	  flatpickr('#t_start_time', {
	    enableTime: true
	  });

	  flatpickr('#t_end_time', {
	    enableTime: true
	  });

	</script>


<?php

include("include/footer.php");

?>

