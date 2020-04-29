<?php 
	session_start();
	include("config/db_connect.php");

	$name = $email = $number = $type_of_ad = $price = $image = "";
	$errors = array('image' => '', 'email' => '', 'number' => '');

	
	if (isset($_POST['submit'])) {

		
		$image = time() . $_FILES['image']['name'];
		
		$target = "img/".basename($image);

		if (empty($_FILES['image'])) {

			$errors['image'] = "insert image";

		}else{

			if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
				# code...
				echo "Image has been upload sucessfully";
			}
			else{
				$errors['image'] = "Not vaild image type";
			}

		}

			

		$name = htmlspecialchars($_POST['name']);



		
		if (empty($_POST['email'])) {
			$errors['email'] = "insert email";
		}else{
			$email = htmlspecialchars($_POST['email']);

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
				$errors['email'] = 'invaild email type';
			}

		}


		if (empty($_POST['number'])) {
			
			$errors['number'] = "insert number";
		}else{
			$number = htmlspecialchars($_POST['number']);
		}

		$type_of_ad = htmlspecialchars($_POST['type_of_ad']);
		$price = htmlspecialchars($_POST['price']);
			


		

		if (!array_filter($errors)) {

			$name = mysqli_real_escape_string($conn,$_POST['name']);
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$number = mysqli_real_escape_string($conn,$_POST['number']);
			$type_of_ad = mysqli_real_escape_string($conn,$_POST['type_of_ad']);
			$price = mysqli_real_escape_string($conn,$_POST['price']);


			$sql = "INSERT INTO ads(name, email, number, type_of_ad, price, image) VALUES('$name', '$email', '$number', '$type_of_ad', '$price','$image')";
			
			if (mysqli_query($conn, $sql)) {
				# code...
				header('Location: index.php');
			}
			else{
				echo "Query error". mysqli_error($conn);
			}

		}


		mysqli_close($conn);
		

	}



	include('localization/lang.php');



?>

<!DOCTYPE html>
<html>
 	
	<?php include("templates/header.php"); ?>



	<section class="container">
		<h4 class="center blue-text"><?php echo $language['addbtn']; ?></h4>

	<form class="center" action="add.php" method="POST" enctype="multipart/form-data">
		
		<label><?php echo $language['name']; ?></label>
		<input type="text" name="name" value="<?php echo(htmlspecialchars($name)); ?>">

		<label><?php echo $language['email']; ?></label>
		<input type="text" name="email" value="<?php echo(htmlspecialchars($email)); ?>">
		<div class="red-text"><?php echo $errors['email']; ?> </div>

		<label><?php echo $language['number']; ?></label>
		<input type="text" name="number" value="<?php echo(htmlspecialchars($number)); ?>">
		<div class="red-text"><?php echo $errors['number']; ?> </div>

		<label><?php echo $language['typeofad']; ?></label>
		<input type="text" name="type_of_ad" value="<?php echo(htmlspecialchars($type_of_ad)); ?>">


		<label><?php echo $language['price']; ?></label>
		<input type="text" name="price" value="<?php echo(htmlspecialchars($price)); ?>">

		<label><?php echo $language['image']; ?></label>
		<input type="file" name="image">
		<div class="red-text"><?php echo $errors['image']; ?> </div>


		<div>
			<input type="submit" name="submit" class="btn brand" value="<?php echo $language['submit']; ?>">
		</div>
		

	</form>
	</section>


	<?php include("templates/footer.php"); ?>


</html>
