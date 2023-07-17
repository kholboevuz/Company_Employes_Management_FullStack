
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


if(isset($_GET['delete_task'])){
  $action_id = $_GET['task_id'];
  
  $sql = "DELETE FROM task_info WHERE task_id = :id";
  $sent_po = "task-info.php";
  $obj_admin->delete_data_by_this_method($sql,$action_id,$sent_po);
}

if(isset($_POST['add_task_post'])){
    $obj_admin->add_new_task($_POST);
}

$page_name="murojaatlar";
include("include/sidebar.php");
// include('ems_header.php');


?>
<?php
  require 'database.php';
   

  $statement = $conn->prepare("SELECT*FROM  posts");
  $statement->execute();
  $posts = $statement->fetchAll();




if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DELTE'])){

  $post_id = $_POST['post_id'];
  $statement = $conn->prepare("DELETE FROM posts WHERE id = ?");
  $statement->execute([$post_id]);

  
  header("Location: index.php");
}

  
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom rounded-0">
          <div class="gap"></div>
          <div class="row">
          

            
          </div>
          <center ><h3>Murojaatlar</h3></center>
          <div class="gap"></div>

          <div class="gap"></div>
          <div class="table-responsive" id="printout">
          <table id="table" border="1"   class="table table-codensed table-custom">
              <thead>
                <tr>
               
                  <th>F.I.SH</th>
                  <th>Murojaat</th>
                  <th>Telefon raqam</th>
                  <th>Yashash manzili</th>
                  <th>Passport raqami</th>
                  <th>Murojaat turi</th>
                  <th>Murojaat vaqti</th>
                  <th>Holat</th>
                  <th>Ko'rish</th>
                </tr>
              </thead>
              <tbody>


              <?php  foreach($posts as  $posts):  ?>    
                <tr>
            
                  <td> <?= $posts['title']  ?></td>
                  <td><?= $posts['body']  ?></td>
                  <td><?= $posts['phone_number']  ?></td>
                  <td><?= $posts['locations']  ?></td>
                  <td> <?= $posts['serias']  ?> </td>
                  <td><?= $posts['categoris']  ?></td>
                  <td><?= $posts['created_at']  ?> </td>
                  <td>
                  <?php  if($posts['holat'] == 0){
                        // echo "In Progress <span style='color:#5bcad9;' class=' glyphicon glyphicon-refresh' >";
                        echo '<small class="label label-warning px-3">Tekshiruvga yuborildi <span class="glyphicon glyphicon-refresh" ></small>';
                    }else if($posts['holat'] == 1){
                        echo '<small class="label label-info px-3">Ko\'rib chiqishda<span class="glyphicon glyphicon-ok" ></small>';
                        // echo "Completed <span style='color:#00af16;' class=' glyphicon glyphicon-ok' >";
                    }else if($posts['holat'] == 2){
                        echo '<small class="label label-primary px-3">Protsedura <span class="glyphicon glyphicon-asterisk" ></small>';
                    }else if($posts['holat'] == 3){
                      echo '<small class="label label-success px-3">Tasdiqlandi <span class="glyphicon glyphicon-ok" ></small>';

                    } else {
                      echo '<small class="label label-danger px-3">Bekor qilindi <span class="glyphicon glyphicon-remove" ></small>';

                    }?>
                    
                  </td>
                  <td>  <a title="View"  href="murojaatinfo.php?id=<?= $posts['id'] ?>"><span class="glyphicon glyphicon-folder-open"></span></a>&nbsp;&nbsp;</td>
                  </tr>
                  <?php endforeach; ?> 
              </tbody>
            </table>
            <a id="downloadLink" onclick="exportF(this)">Export to Excel</a>

          </div>
        </div>
      </div>
    </div>


<?php

include("include/footer.php");



?>
<noscript>
    <div>
        <style>
            body{
                background-image:none !important;
            }
            .mb-0{
                margin:0px;
            }
        </style>
        <div style="line-height:1em">
        <h4 class="mb-0 text-center"><b>Xodimlarning vazifalarini boshqarish tizimi</b></h4>
        <h4 class="mb-0 text-center"><b>Kundalik vazifa hisoboti</b></h4>
        <div class="mb-0 text-center"><b>sifatida</b></div>
        <div class="mb-0 text-center"><b><?= date("F d, Y", strtotime($date)) ?></b></div>
        </div>
        <hr>
    </div>
</noscript>

<script type="text/javascript">
$(function(){
    $('#filter').click(function(){
        location.href="./murojaatlar.php?date="+$('#date').val()
    })
    $('#print').click(function(){
        var h = $('head').clone()
        var ns = $($('noscript').html()).clone()
        var p = $('#printout').clone()
        var base = '<?= $base_url ?>';
        h.find('link').each(function(){
            $(this).attr('href', base + $(this).attr('href'))
        })
        h.find('script').each(function(){
            if($(this).attr('src') != "")
            $(this).attr('src', base + $(this).attr('src'))
        })
        p.find('.table').addClass('table-bordered')
        var nw = window.open("", "_blank","width:"+($(window).width() * .8)+",left:"+($(window).width() * .1)+",height:"+($(window).height() * .8)+",top:"+($(window).height() * .1))
            nw.document.querySelector('head').innerHTML = h.html()
            nw.document.querySelector('body').innerHTML = ns[0].outerHTML
            nw.document.querySelector('body').innerHTML += p[0].outerHTML
            nw.document.close()
            setTimeout(() => {
                nw.print()
                setTimeout(() => {
                    nw.close()
                }, 200);
            }, 200);

    })
})
</script>
<!-- Export exsel script -->

<script>function exportF(elem) {
  var table = document.getElementById("table");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}</script>
