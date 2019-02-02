<?php
include 'databases/connection.php';
include 'classes/user.php';
include 'classes/follow.php';
include 'classes/tweet.php';

global $pdo;

session_start();

$getFromUser = new User($pdo);
$getFromFollow = new Follow($pdo);
$getFromTweet = new Tweet($pdo);

define("BASE_URL", "http://localhost/codingdaddy/");
?>