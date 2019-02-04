<?php
if(isset($_POST['signup'])){
	$screenName = $_POST['screenName'];
	$email 		= $_POST['email']; 
	$password 	= $_POST['password'];
	// $error 		= '';

	if(empty($screenName) OR empty($email) OR empty($password)){
		$error = "All fields are required!!";
	} else {
		$screenName = $getFromUser->checkInput($screenName);
		$email 		= $getFromUser->checkInput($email);
		$password 	= $getFromUser->checkInput($password);

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Invalid email format";
		} else if(strlen($screenName) > 20){
			$error = "Name Should be between 6 to 20";
		} else if(strlen($password) < 5){
			$error = "Password is too short";
		} else{
			if($getFromUser->checkEmail($email) === true){
				$error = "Email already taken";
			} else{
				$user_id = $getFromUser->create('users', array('email' => $email, 'screenName' => $screenName, 'password' => md5($password), 'profileImage' => 'assets\images\defaultprofileimage.png', 'profileCover' => 'assets\images\defaultCoverImage.png'));
				$_SESSION['user_id'] = $user_id;
				header("location: includes/signup.php?step=1");
			}
		}
	}
	
}
?>
<form method="post">
<div class="signup-div"> 
	<h3>Sign up </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="Full Name"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="Password"/>
		</li>
		<li>
			<input type="submit" name="signup" Value="Signup for Twitter">
		</li>
	</ul>
	<?php
	if(isset($error)){
    echo '<li class="error-li">
	  <div class="span-fp-error">'.$error.'</div>
	 </li> 
	';}
	?>
</div>
</form>