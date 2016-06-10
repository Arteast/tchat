<?php
	$access = array('home');
	$page = 'home'; /*page courante : home par default*/ 
	$error = '';
	require('config.php');
	$link = mysqli_connect($localhost, $login, $pass, $database);

	if (!$link)
	{
	    require('views/bigerror.phtml');
	    exit;
	}

	//Autoload des classes 
	function __autoload($className)
	{
			require ("models/".$className.".class.php");
	}

	if (isset($_GET['page']))
	{
		if (in_array($_GET['page'], $access))
			$page = $_GET['page'];
	}

	$access_traitement = array('home');
	
	if (in_array($page, $access_traitement))
		require('apps/treatments/traitement_'.$page.'.php');
	if (isset($_GET['ajax']))
	{
		require('apps/contents/chat.php');
	}
	else
		require 'apps/skel.php';
?>