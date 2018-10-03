<?php
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="pl-PL">
	<head>
		<title>Actors</title>
	<!-- znaczniki META -->
		<meta charset="utf-8">
		<meta name="description" content="Strona przeznaczona na lekcje WIA">
		<meta name="keywords" content="HTML,CSS,XML,JavaScript">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!--FAVICON -->
			<link rel="Shortcut icon" href="" />
			<link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
			<link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
			<link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
			<link rel="manifest" href="favicons/manifest.json">
			<link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#a327a6">
			<meta name="theme-color" content="#701d1d">
	 <!-- CSS-->
		<link rel="Stylesheet" type="text/css" href="css/reset.css" >
		<link rel="Stylesheet" type="text/css" href="css/normalize.css" >
		
	 <!--Skrypty-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<?php
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			if($_SESSION['typ'] == 'admin'){
			$sql="SELECT * FROM options WHERE option_id ";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				?>
				<div id='mask'></div>
				<div id='control_panel'>
					<div style='text-align:center;font-size:40px; background:black'>Ustawienia forum</div>
					<form class='ustawienia' method='GET' action=''>
						<input type="hidden" id="users_can_register2" name="users_can_register" value="0"><label><input type="checkbox" id="users_can_register" name="users_can_register" value="1"<?php echo ($row['option_value']==1 && $row['option_name']=='users_can_register' ? 'checked' : '');?>> Użytkownicy mogą się rejestrować</label>
						<br>
					</form>
				</div>
				<?php
			}
		}
		?>
            <div class="background"></div>
			<nav>
				<div class="nav">
						<a href="?act=will"><div class="li blurred-bg bialy"><span class="zdj">Will Smith</span></div></a>
						<a href="?act=leo"><div class="li blurred-bg bialy"><span class="zdj">Leonardo DiCaprio</span></div></a>
						<a href="?fax"><div class="li blurred-bg bialy"><span>FAX</span></div></a>
						<?php
							if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
								?>
								<a href="logout.php"><div class="li blurred-bg bialy"><span>Logout</span></div></a>
								<?php
								if($_SESSION['typ'] == 'admin'){
									?>
									<a href="" id="admin"><div class="li blurred-bg bialy"><span>Admin panel</span></div></a>
									<?php
								}
							}else{
								?>
								<a href="?loging"><div class="li blurred-bg bialy"><span>Login</span></div></a>
								<?php
							}
							if(isset($_GET['act'])){
								$id = $_GET['act'];
								$stmt = $conn->prepare('SELECT * FROM posts WHERE id = ?');
								$stmt->bind_param('s', $id);
								$stmt->execute();
								$result = $stmt->get_result();
								if($result->num_rows > 0){
									$row = $result->fetch_assoc();
								}
							} else if(isset($_GET['loging'])){
								
							} else if(isset($_GET['fax'])){
								
							} else if(isset($_GET['register'])){
								
							} else {
								$id = $_GET['act']= "will";
								$stmt = $conn->prepare('SELECT * FROM posts WHERE id = ?');
								$stmt->bind_param('s', $id);
								$stmt->execute();
								$result = $stmt->get_result();
								if($result->num_rows > 0){
									$row = $result->fetch_assoc();
								}
							}		
						?>
				</div>
			</nav>
            <main>
				<div class="box blurred-bg bialy">
					<div class="content">
							<?php
								if(isset($_GET['act'])){
//############### ID ################
							?>
								<img src="img/<?php echo $id ?>.png" class="img_content" alt="Will cały">
									<div class="przedstawienie" id="d1" <?php if(isset($_SESSION['loggedin']) && $_SESSION['typ'] == 'admin'){echo "contenteditable='true'";} ?>onBlur="SaveToDatabase(this,this,'<?php echo $row['id']; ?>')"><?php echo $row['d1'] ?></div>
									<br>
									<p id="p1" <?php if(isset($_SESSION['loggedin']) && $_SESSION['typ'] == 'admin'){echo "contenteditable='true'";} ?>onBlur="SaveToDatabase(this,this,'<?php echo $row['id']; ?>')"><?php echo $row['p1'] ?></p>
									<br>
									<br>
									<div class="naglowek" id="d2" <?php if(isset($_SESSION['loggedin']) && $_SESSION['typ'] == 'admin'){echo "contenteditable='true'";} ?>onBlur="SaveToDatabase(this,this,'<?php echo $row['id']; ?>')"><?php echo $row['d2'] ?></div>
									<br>
									<br>
									<p id="p2" <?php if(isset($_SESSION['loggedin']) && $_SESSION['typ'] == 'admin'){echo "contenteditable='true'";} ?>onBlur="SaveToDatabase(this,this,'<?php echo $row['id']; ?>')"><?php echo $row['p2'] ?></p>
									<br>
									<br>
									<div class="naglowek" id="d3" <?php if(isset($_SESSION['loggedin']) && $_SESSION['typ'] == 'admin'){echo "contenteditable='true'";} ?>onBlur="SaveToDatabase(this,this,'<?php echo $row['id']; ?>')"><?php echo $row['d3'] ?></div>
									<br>
									<p id="p3" <?php if(isset($_SESSION['loggedin']) && $_SESSION['typ'] == 'admin'){echo "contenteditable='true'";} ?>onBlur="SaveToDatabase(this,this,'<?php echo $row['id']; ?>')"><?php echo $row['p3'] ?></p>
							<?php
								} else if(isset($_GET['fax'])){
//############### FAX ################
									?>
										<h1>Masz pytanie lub jakiś problem?</h1>
										<form>
											<p><br>Imię</p><p id="pimie" style="color: red; display:inline;"></p><br><input type="text" id="imie"> <br>
											<p>Nazwisko</p> <p id="pnazwisko" style="color: red; display:inline;"></p><br><input type="text" id="nazwisko"><br>
											<p>E-Mail</p><br><br><input type="text" id="mail" > <br><p id="pmail" style="color: red; display:inline;"></p><br>
											<p>Temat pytania</p><br>
											<select id="selectid" onchange="inne(this.value)">
												<option value="">----</option>
												<option value="1">Błędy strony</option>
												<option value="2">Problem z Quizem</option>
												<option value="3">Fałszywe informacje</option>
												<option value="4">Współpraca</option>
												<option value="Inne">Inne ...</option>
											</select>  <input type="text" id="pyt" style="display: none; width:22.5%;"><p id="Q" style="color: red; display:inline;"></p> <br>
											<p>Treść pytania</p><br><textarea id="tresc" rows="3" cols="20" placeholder="Co masz na myśli?"></textarea> <br> <p id="ptresc" style="color: red; display:inline;"></p> <br>
											<input id="Wyslij" type="button" onclick="zzz()" value="Wyślij">
										</form>
									<?php
								} else if(isset($_GET['loging']) ){
//############### LOGIN ################
									$zle = '';
									if (isset($_GET['polacz'])) {
										$login = $_GET['login'];
										$pass = $_GET['pass'];
										//SQL INJECTION PROTECTION
											$stmt = $conn->prepare('SELECT * FROM members WHERE login = ?');
											$stmt->bind_param('s', $login);
											$stmt->execute();
											$result = $stmt->get_result();
										if ($result->num_rows > 0) {
											// output data of each row
											$row = $result->fetch_assoc();
											$password_db = password_hash($pass, PASSWORD_BCRYPT, $options);
												if (!password_verify($pass, $row['pass'])) {
													$zle = '<div style="color:white;">Invalid password or username.</div>';
												} else{
													header( "refresh:0;url=index.php" );
													$_SESSION['loggedin'] = true;
													$_SESSION['login'] = $login;
													$_SESSION['typ'] = $row['typ'];
												}
										} else {
											$zle = '<div style="color:white;">Invalid password or username.</div>';
										}
									} else if(isset($_GET['logout'])){
									header( "refresh:0;url=logout.php" );
									}
									if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
										echo "Welcome to the member's area, " . $_SESSION['login'] . "!";
									?>
									<script>
										$('.login_form').hide();
									</script>
									<form action="logout.php" method="GET">
									<input type="submit" name="logout" value="Logout" style="position: absolute; top:5px; right:20%;">
									</form>
									<?php
									} else {
									?>
									<div class="login_form">
									<form action="" method="GET" id="Logowanie">
										<input type="hidden" name="loging">
										<p>Admin Panel</p>
										<h1> Zaloguj się</h1>
										<label style ="color:white">Użytkownik: </label><input type="text" name="login" required><br>
										<label style ="color:white">Hasło: </label><input type="password" name="pass" required>
										<br>
										<a href="?register">Rejestracja</a>
										<input type="submit" name="polacz" value="Połącz">
									</form> 
									<?php
										echo $zle;
									}
//END OF LOGIN SITE
								}else if(isset($_GET['register'])){
//############### REGISTER ################
									if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
											echo "Welcome to the member's area, " . $_SESSION['login'] . "!<br>";
											echo "You dont need to register :) <br><b><h2>Automaticaly rediecting to home site after 5sec</h2></b>";
											//Set Refresh header using PHP.
											header( "refresh:5;url=index.php" );
										} else {
											$sql = " SELECT * FROM options ";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
												// output data of each row
												$row = $result->fetch_assoc();
												if($row['option_name'] == 'users_can_register' && $row['option_value'] == '1'){
													$options = [
													'cost' => 11
													];
														if(isset($_GET['rejestr'])){
															$sql = "SELECT * FROM members WHERE id";
															$result = $conn->query($sql);
															if($result->num_rows > 0){
																$row = $result->fetch_assoc();
															}
															$login = $_GET['login'];
															$pass = $_GET['pass'];
															$quest = $_GET['quest'];
															if($login == $row['login']){
																echo "Podany login już istnieje. Wybierz inny<br>";
															}else {
																$password_db = password_hash($pass, PASSWORD_BCRYPT, $options);
															$stmt = $conn->prepare('INSERT INTO members (login, pass, quest, typ) VALUES (?,?,?,"member")');
															$stmt->bind_param('sss', $login, $password_db, $quest );
															$stmt->execute();
																$stmt->close();
																header( "refresh:0;url=index.php?loging" );
															}
														}
													?>
													<form action="index.php?register" method="GET">
													<input type="hidden" name="register">
														<h1> Zarejestruj się</h1>
														<label>Login: </label><input type="text" name="login" required>
														<br>
														<label>Hasło: </label><input type="text" name="pass" required>
														<br>
														<label>Pytanie: </label><input type="text" name="quest">

														<input type="submit" name="rejestr" value="Zarejestruj">
													</form> 
													<?php
												}else {
													echo "Register is acctually off. You will be rediected to home site";
													header( "refresh:2;url=index.php" );
												}
											} else {
												echo "0 results";
											}
										}
								}
//############### END OF REGISTER ################
							?>
					</div>
				</div>
            </main>
            <footer>
				<div class="stopa">
					<p> Webdesigned & Webdevelopment by <br> MLBPOB<br> &copy; All rights reserved.</p>
				</div>
            </footer>
			<script>
		$(document).ready(function(){	
			$(document).on('click', '#admin', function(e){
				  e.preventDefault();
				  $('#control_panel').hide();
				$('#control_panel').fadeIn(500);
				$('#control_panel').animate({height:'80%',width:'40%'},500);
				$('#mask').fadeIn(500);
			 });
			
			 $(document).on('click', '#mask', function(){
				$('#control_panel').animate({height:'0',width:'0'},500);
				$('#control_panel').fadeOut('slow');
				$('#control_panel').hide(400);
				$('#mask').fadeOut(500);
				let users_can_register = 0;
				if($('#users_can_register').is(':checked')){
					users_can_register = 1;
				}else {
					users_can_register = 0;
				}
						$.ajax({
							type: "GET",
							url: "ajax.php",
							data:{zapisz:"true",users_can_register:users_can_register}
						});
			 });
			 
		});
		function SaveToDatabase(id,content,act){
				 $.ajax({
							type: "GET",
							url: "update.php",
							data:{id:id.getAttribute("id"),content:content.innerHTML, act:act }
						});
			 };
		</script>
		<script src="form.js"></script>
	</body>
</html>