<?php
if(isset($_POST['login']) && !empty($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(!empty($email) && !empty($password)){
        $email = $getFromUser->checkInput($email);
        $password = $getFromUser->checkInput($password);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "Invalid email format";
        } else{
            if($getFromUser->login($email, $password) === false){
                $error = "The email and Password is incorrect!!";
            }
        }
        
    }else{
        $error = "Please fill the username and password";
    }

}

?>
<div class="login-div">
<form method="post"> 
	<ul>
		<li>
		  <input type="text" name="email" placeholder="Please enter your Email here"/>
		</li>
		<li>
		  <input type="password" name="password" placeholder="password"/>
          <input type="submit" name="login" value="Log in"/>
		</li>
		<li>
		  <input type="checkbox" Value="Remember me">Remember me
		</li>
	</ul>
    <?php 
        if(isset($error)){
             
                echo  ' <li class="error-li">
                        <div class="span-fp-error">'.$error.'</div>
                        </li>' ;
        }     
     ?>
	
	</form>
</div>