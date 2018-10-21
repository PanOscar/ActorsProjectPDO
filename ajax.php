<?php
session_start();
include 'connect.php';
		$id = @$_POST['id'];
			$sql="SELECT * FROM options WHERE option_id = 1";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				if(isset($_POST['zapisz'])){
					if($_POST['users_can_register']!=$row['option_value']){
						if($row['option_value']==1){
							
								$sql1= "UPDATE options SET option_value = '0' WHERE option_id = 1";
								$conn->query($sql1);
								header("Refresh:0");
						}else{
								$sql1="UPDATE options SET option_value = '1' WHERE option_id = 1";
								$conn->query($sql1);
								header("Refresh:0");
						}	
					}
				}	
?>