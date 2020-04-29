<?php  

	//session_start();

	// if (!isset($_SESSION['lang']) ) {
	// 	$_SESSION['lang'] = 'en';
	// }elseif(isset($_GET['lang']) && $_SESSION['lang']!=$_GET['lang']){
	// 	if ($_GET['lang'] == 'az') {
	// 		$_SESSION['lang'] = 'az';
	// 	}elseif ($_GET['lang'] == 'en') {
	// 		$_SESSION['lang'] = 'en';
	// 	}
	// }



	// require_once "localization/".$_SESSION['lang'].".php";

    if (!isset($_SESSION['lang']) ) {
		$_SESSION['lang'] = 'en';
	}else{
		if (isset($_GET['az'])) {
			$_SESSION['lang'] = 'az';
		}elseif (isset($_GET['en'])) {
			$_SESSION['lang'] = 'en';
		}
	}




	require_once "localization/".$_SESSION['lang'].".php";


?>