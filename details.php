<?php  
	session_start();
	include 'config/db_connect.php';


	

	if (isset($_GET['id']) ) {
		# code...

		$id = $_GET['id'];
		$sql = "SELECT * FROM ads WHERE id = $id";

		$result = mysqli_query($conn, $sql);

		$ad = mysqli_fetch_assoc($result);

		

		mysqli_close($conn);
		
	}

	if (isset($_POST['delete'])) {

		
		$id_to_delete = $_POST['id_to_delete'];

		
		$img = $_POST['delete_image'];


		$sql = "DELETE FROM ads WHERE id = $id_to_delete";

		

		unlink($img);




		if (!mysqli_query($conn, $sql)) {
			echo "There are eroor ".mysqli_query_error();;
			
		}else{

			header('Location: index.php');
		}

		
	}

	include('localization/lang.php');

?>


<!DOCTYPE html>
<html>
 	
	<?php include("templates/header.php"); ?>

	<h4 class="center"><?php echo $language['details']; ?></h4>

	<?php if ($ad): ?>

		<div class="container center grey-text">

			<div class="card z-depth-0">

				<img height="500" width="500" src="img/<?php echo htmlspecialchars($ad['image']); ?>">
				
				<div class="card-content left-align">

					<h5><?php echo $language['typeofad']; ?> : <?php echo htmlspecialchars($ad['type_of_ad']); ?></h5>

					<h5><?php echo $language['price']; ?> : <?php echo htmlspecialchars($ad['price']); ?></h5>

					<h5><?php echo $language['name']; ?> : <?php echo htmlspecialchars($ad['name']); ?></h5>

					<h5><?php echo $language['email']; ?> : <?php echo htmlspecialchars($ad['email']); ?></h5>

					<h5><?php echo $language['number']; ?> : <?php echo htmlspecialchars($ad['number']); ?></h5>

					<h5><?php echo $language['date']; ?> : <?php echo htmlspecialchars($ad['created_at']); ?></h5>


					<?php if(!empty($_SESSION['username'])): ?>
						

						<div class="card-action right-align">
							
							<form action="details.php" method="POST">

								<input type="hidden" name="id_to_delete" value="<?php echo htmlspecialchars($ad['id']); ?> ">
								<input type="hidden" name="delete_image" value="img/<?php echo htmlspecialchars($ad['image']); ?>">
								<input type="submit" name="delete" value="<?php echo $language['delete']; ?>" class="btn red">

							</form>

						</div>

					<?php endif; ?>
					
				</div>
			


			</div>

			
		</div>


	<?php else: ?>


		<h4>This is not a valid produtcts</h4>
			
	<?php endif; ?>


	<?php include("templates/footer.php"); ?>

</html>