<?php
	$user ='';
	if (isset($_POST['user']))
		$user = $_POST['user'];
	require 'views/contents/home.phtml'
?>