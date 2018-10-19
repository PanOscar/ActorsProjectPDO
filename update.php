<?php
session_start();
include 'connect.php';
if($_SESSION['typ'] == 'admin'){
			$id = $_GET['id'];
			$content = $_GET['content'];
			$act = $_GET['act'];
			$sql="SELECT * FROM posts	WHERE id = '".$act."'";
			$result = $conn->query($sql);
			$row = $result->fetch();
			$sql1= "UPDATE posts SET ".$id." = '".$content."' WHERE id = '".$act."'";
			$conn->query($sql1);
}
	
?>