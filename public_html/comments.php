<?php
include_once("db_connect.php");
if(!empty($_POST["name"]) && !empty($_POST["comment"])){
	$insertComments = "INSERT INTO comment (parent_id, comment, sender) VALUES ('".$_POST["commentId"]."', '".$_POST["comment"]."', '".$_POST["name"]."')";
	mysqli_query($conn, $insertComments) or die("database error: ". mysqli_error($conn));	
	$message = '<label class="text-success">Hisobot muvaffaqiyatli qo`shildi</label>';
	$status = array(
		'error'  => 0,
		'message' => $message
	);	
} else {
	$message = '<label class="text-danger">Xatolik: Nimadir xato ketdi</label>';
	$status = array(
		'error'  => 1,
		'message' => $message
	);	
}
echo json_encode($status);
?>