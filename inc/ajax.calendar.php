<?php
	require 'config.php';
	require 'functions.php';
	//echo '<pre>';
	//print_r($_POST);
	//echo '</pre>';
	
	if(isset($_POST['request'])){
		if(strlen($_POST['request']) == 5){
			$month = substr($_POST['request'], 0, 1);
			$year = substr($_POST['request'], -4);
		}else{
			$month = substr($_POST['request'], 0, 2);
			$year = substr($_POST['request'], -4);
		}
	}else{
		$month = date("n");
		$year = date("Y");
	}
	//echo $month. ' / '.$year;
	echo display_calendar($month, $year);
	
?>