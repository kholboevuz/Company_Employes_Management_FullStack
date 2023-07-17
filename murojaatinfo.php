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





if(isset($_POST['update_task_info'])){
    $obj_admin->update_task_info($_POST,$task_id, $user_role);
}

$page_name="Edit Task";
include("include/sidebar.php");

$sql = "SELECT a.*, b.fullname 
FROM task_info a
LEFT JOIN tbl_admin b ON(a.t_user_id = b.user_id)
WHERE task_id=''";
$info = $obj_admin->manage_all_info($sql);
$row = $info->fetch(PDO::FETCH_ASSOC);

require 'database.php';
$id = $_GET['id'];
$statement = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$statement -> execute([$id]);
$post = $statement->fetch();


if($_SERVER['REQUEST_METHOD'] == 'POST' &&  isset($_POST['PUT'])){
  
    $title = $_POST['title'];
    $phone_number = $_POST['phone_number'];
    $categoris = $_POST['categoris'];
    $locations = $_POST['locations'];
    $serias = $_POST['serias'];
    $holat = $_POST['holat'];
    $id = $_POST['post_id'];
    $statement = $conn->prepare("UPDATE posts SET holat = :holat WHERE id = :id ");


    $statement->execute([
       
        'holat' => $holat,
        'id' => $id,
    
      ]);
     echo 'Saqlandi ';
     header("Location: ./murojaatlar.php");
     exit;
    }
    

?>

<!--modal for employee add-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">



    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="well">
                <h3 class="text-center bg-primary" style="padding: 7px;">Murojaat </h3><br>

             
                      <div class="row">
                        <div class="col-md-12">
                      
                        	 <div class="table-responsive">
				                  <table class="table table-bordered table-single-product">
				                    <tbody>
                                 
				                      <tr>
				                        <td>F.I.SH</td><td><?php echo $post['title']; ?></td>
				                      </tr>
				                      <tr>
				                        <td>Murojaat</td><td><?php echo $post['body']; ?></td>
				                      </tr>
									 <tr>
				                        <td>Telefon raqam</td><td> <?php echo $post['phone_number']; ?> </td>
				                      </tr>
				                      <tr>
				                        <td>Yashash manzili</td><td><?php echo $post['locations']; ?></td>
				                      </tr>
				                      <tr>
				                        <td>Passport raqami</td><td><?php echo $post['serias']; ?></td>
				                      </tr>
				                      <tr>
				                        <td>Murojaat turi</td><td><?php echo $post['categoris']; ?></td>
				                      </tr>
                                      <tr>
				                        <td>Murojaat vaqti</td><td><?php echo $post['created_at']; ?></td>
				                      </tr>
                                      <form action="" method="POST">
                                        
                            <input type="hidden" name="PUT" >
                            <input type="hidden" name="post_id" value="<?= $post['id']?>" >
				                      <tr>
				                        <td>Holat</td><td> <select class="form-control rounded-0" name="holat" id="status">
			                      	<option value="0" <?php if($post['holat'] == 0){ ?>selected <?php } ?>>Tekshiruvga yuborildi</option>
			                      	<option value="1" <?php if($post['holat'] == 1){ ?>selected <?php } ?>>Ko'rib chiqishda</option>			 
			                      	<option value="2" <?php if($post['holat'] == 2){ ?>selected <?php } ?>>Protsedura</option>
                                    <option value="3" <?php if($post['holat'] == 3){ ?>selected <?php } ?>>Tasdiqlandi</option>
                                    <option value="4" <?php if($post['holat'] == 4){ ?>selected <?php } ?>>Bekor qilindi</option>
			                      </select></td>
				                      </tr>

				                    </tbody>
				                  </table>
				                </div>
                                <div class="form-group">

                                <div class="col-sm-3">
                                <button type="submit"  class="btn btn-primary"  name="submit" >Saqlash</button>
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
    </div>


<?php


include("include/footer.php");

?>

