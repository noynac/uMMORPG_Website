<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/init.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/backend/login.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php');
?>
<body class="text-center">
   <div class="container">
   <br><br><br>
   <div style="width:75%;margin-left: auto;margin-right: auto;">
      <form method="POST" action="" class="text-center border border-light p-5" style="background-color: #f8f9fa!important;border-radius:15px;">
         <p class="h4 mb-4">Sign in</p>
		 
		 <?php
		 // display errors
		 if(!empty($errors)) {
		 	foreach($errors as $error) {
		 		echo '<div style="color:red;text-align: center;">'.$error.'<br></div>';
		 	}
		 }
		 ?>
		 
         <!-- Username -->
         <input type="text" name="name" id="defaultLoginFormUsername" class="form-control mb-4" placeholder="Username">
         <!-- Password -->
         <input type="password" name="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

         <!-- Sign in button -->
         <button class="btn btn-info btn-block my-4" style="background-color:#33B5E5;" type="submit" name="login">Sign in</button>
         <!-- Register -->
         <p>Not a member?
            <a href="../account/register.php">Register</a>
         </p>
      </form>
   </div>
</body>