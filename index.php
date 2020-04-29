<?php 
	
	session_start();
	include("config/db_connect.php");

	$sql = "SELECT * FROM ads ORDER BY created_at";

	$result = mysqli_query($conn, $sql);

	$ads = mysqli_fetch_all($result, MYSQLI_ASSOC);


	mysqli_free_result($result);

	mysqli_close($conn);



	include('localization/lang.php');





?>

<!DOCTYPE html>
<html>
 	
	<?php include("templates/header.php"); ?>
	<h4 class="center blue-text"><?php echo $language['addinfo']; ?></h4>

	<div class="container">

		<div class="row grey-text">
			<?php foreach($ads as $ad){ ?>
				<div class="center white">
					<div class="col s6 md3">

						<div class="card z-depth-0">


							<?php echo'<img height="300" width="300" src="img/'.$ad['image'].'">'; ?>
							
							

							<div class="card-content z-depth-0">


								
								<h5><?php echo htmlspecialchars($ad['type_of_ad']); ?></h5>
								<h6><?php echo htmlspecialchars($ad['price']); ?></h6>
								<h6><?php echo date(htmlspecialchars($ad['created_at'])); ?></h6>

							</div>

							<div class="card-action right-align">
								<input type="hidden" name="<?php echo $ad['id']; ?> ">

								<a href="details.php?id=<?php echo $ad['id']; ?>" class="btn brand"><?php echo $language['details']; ?></a>
							</div>

						</div>



						
					</div>
				</div>

			<?php } ?>
			
			
		</div>

		
	</div>

	<?php include("templates/footer.php"); ?>

</html>
