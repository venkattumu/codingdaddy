<?php
include '../core/init.php';
$getFromUser->logout();
if($getFromUser->loggedIn() === false){
	header("location: index.php");
}
?>