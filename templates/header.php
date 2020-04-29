<?php 
    




    if (!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }else{
        $username = '';
    }
    
    // if (!empty($_SESSION['username'])) {
        //session_unset();
    // }


    include('localization/lang.php');
?>



<head>
	<title>SellPay</title>
	 <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style type="text/css">
    	.brand{
    		background-color: #3068D9 !important; 
    	}
    	.brand-text{
    		color: #7BB364 !important;
    	}
    	form{
    		max-width: 460px;
    		margin: 20px auto;
    		padding: 20px;
    		background-color: white;
    	}



    	.navcol{
    		background-color: #82B8D9;
    	}

   
    </style>
</head>

<body class="grey lighten-4">

	<nav class="navcol z-depth-0">
		
		<div class="container">
			<a href="index.php" class="brand-logo">SellPay</a>

			<ul class="right">
                <?php if($username): ?>
    				<li><?php echo $username; ?></li>
                    <li><a href="logout.php"><?php echo $language['logout']; ?></a></li>


                <?php else: ?>

                    <li><a href="admin.php">User</a></li>

                <?php endif; ?>

				<li><a href="add.php" class="btn brand"><?php echo $language['addbtn']; ?></a></li>

               
                <li><a href="index.php?az" class="red-text">Az</a></li>
                <li><a href="index.php?en" class="green-text">En</a></li>

			</ul>

		</div>

		
	</nav>

