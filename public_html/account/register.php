<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../resources/core/init.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../resources/includes/navbar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../resources/includes/register.php');
?>
<body class="text-center">
   <div class="container">
   <br><br><br>
   <div style="width:75%;margin-left: auto;margin-right: auto;">
      <form method="POST" action="" class="text-center border border-light p-5" style="background-color: #f8f9fa!important;border-radius:15px;">
         <p class="h4 mb-4">Create Account</p>
		 
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
         <!-- Confirm Password -->
         <input type="password" name="confirmPassword" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
		
         <!-- Register button -->
         <button class="btn btn-info btn-block my-4" style="background-color:#33B5E5;" type="submit" name="register">Create Account</button>
         <!-- Register -->
         <p>Already have an account?
            <a href="<?= $config['base_url']; ?>/account/login.php">Login</a>
         </p>
      </form>
   </div>
</body>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/../resources/includes/footer.php'); ?>
