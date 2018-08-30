<?php
	
	require_once '../class/class.user.php';
	$session = new USER();
	
	
	if(!$session->is_loggedin())
	{
		$session->redirect('../sign-in.php');
	}