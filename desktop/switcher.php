<?php
session_start();
if(isset($_GET['set']))
{
	$_SESSION['css-style-desktop'] = $_GET['set'];
}

if($_SERVER['HTTP_REFERER'])
{
	$referred = $_SERVER['HTTP_REFERER'];
	header('Location: '.$referred);
}
else
{
	$url = 'http://'.$_SERVER['HTTP_HOST'];
	header('Location: '.$url);
}
?>