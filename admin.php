<?php  

	session_start();

	$conn = mysqli_connect('localhost','world','test123','userregistration');

	$sql = "SELECT * FROM admin";

	$result = mysqli_query($conn, $sql);

	$user_infos = mysqli_fetch_all($result, MYSQLI_ASSOC);

	//echo  $user_infos[0]['username'];

	if (isset($_POST['login'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];
		
		


		if ($username == $user_infos[0]['username'] && $password == $user_infos[0]['password']) {
			
			$_SESSION['username'] = $username;

			header('Location: index.php');

		}else{
			$_SESSION['username'] = '';
			echo "Invalid account";
		}
		


	}


	include('localization/lang.php');





?>


<!DOCTYPE html>
<html>
	<?php include("templates/header.php"); ?>

	<div class="container">
		
		<form action="admin.php" method="POST">
			
			<label><?php echo $language['username']; ?> </label>
			<input type="text" name="username">

			<label><?php echo $language['password']; ?></label>
			<input type="password" name="password">


			<div class="center">
				<input type="submit" name="login" value="<?php echo $language['login']; ?>" class="btn brand">
			</div>


		</form>

	</div>


	<?php include("templates/footer.php"); ?>
</html>