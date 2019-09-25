<?php
	require 'inc/db.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		// Get data from FROM
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		if($firstname == '')
			$errMsg = 'Enter your first name';
		if($lastname == '')
			$errMsg = 'Enter a last name';
		if($username == '')
			$errMsg = 'Enter username';
		if($password == '')
			$errMsg = 'Enter password';
		

		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO pdo (firstname, lastname, username, password) VALUES (:firstname,:lastname, :username, :password)');
				$stmt->execute(array(
					':firstname' => $firstname,
					':lastname' => $lastname,
					':username' => $username,
					':password' => $password,
					));
				header('Location: register.php?action=joined');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registration successfull. Now you can <a href="login.php">login</a>';
	}
?>

<html>
<head><title>Register</title></head>
	<style>
	html, body {
		margin: 1px;
		border: 0;
	}
	</style>
<body>
	<div align="center">
		<div style=" border: solid 1px #006D9C; " align="left">
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}
			?>
			<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b>Register</b></div>
			<div style="margin: 15px">
				<form action="" method="post">
					<input type="text" name="firstname" placeholder="Firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="text" name="lastname" placeholder="Lastname" value="<?php if(isset($_POST['firstname'])) echo $_POST['lastname'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="password" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" class="box" /><br/><br />
					<input type="submit" name='register' value="Register" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
