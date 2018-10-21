<?php
session_start();
include 'connect.php';
if($_SESSION['typ'] == 'admin'){
			$id = $_POST['id'];
			$content = $_POST['content'];
			$act = $_POST['act'];
			$sql="SELECT * FROM posts	WHERE id = '".$act."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$sql1= "UPDATE posts SET ".$id." = '".$content."' WHERE id = '".$act."'";
			$conn->query($sql1);
}
?>