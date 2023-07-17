<?php
  require 'database.php';
  $statement = $conn->prepare("SELECT*FROM hisobot");
  $statement->execute();
  $hisobot = $statement->fetchAll();
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DELTE'])){
    $post_id = $_POST['post_id'];
    $statement = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $statement->execute([$post_id]);
  }
?>
<!DOCTYPE html>
<html lang="en">
<h>
<style>
	.panel-body{
		display: block;
}
</style>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<div class="table-responsive">
            <table id="table" border="1"  class="table table-codensed table-custom">
              <thead>
                <tr>
                  <th>Xodim</th>
                  <th>Amalga oshirilgan ishlar</th>
                  <th>Topshirilgan vaqt</th>
                  <th>Tahrirlash</th>
                </tr>
              </thead>
              <tbody>     
                
              <?php  foreach($hisobot    as  $posts):  ?>    
                <tr>
                  <td> <?= $posts['names']  ?></td>
                  <td><?= $posts['hisobot']  ?></td>
                  <td><?= $posts['datatime']  ?></td>
                  <td><a title="Hosobotni o'zgartirish" href="edit-hisobot.php?id=<?= $posts['id'] ?>" ><span class="glyphicon glyphicon-edit"></span></a></td>
                  </tr>
                  <?php endforeach; ?> 
              </tbody>
            </table>
            <a id="downloadLink" onclick="exportF(this)">Export to Excel</a>
          </div>

          <script>
  $( function() {
    var dateFormat = "dd/mm/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
		  dateFormat:"dd/mm/yy",
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
		dateFormat:"dd/mm/yy",
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
</body>
</html>