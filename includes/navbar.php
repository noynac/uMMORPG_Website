<?php
$thisFile = basename($_SERVER["SCRIPT_FILENAME"], '.php');
if($thisFile == "navbar.php") {
	header('Location: ../index.php');
	exit;
}
?>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?= $config['project_name']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../users/index.php">Users</a>
      </li>
    </ul>
    <ul class="navbar-nav mr-left">
	  <?php
	  if($session) {
		echo '
      	  <li class="nav-item active">
            <a class="nav-link">Welcome, '.$user->name.'!</a>
      	  </li>
      	  <li class="nav-item active">
            <a class="nav-link" href="../logout.php">Logout</a>
          </li>
		';
	   }else{
		echo '
      	  <li class="nav-item active">
            <a class="nav-link" href="../account/login.php">Login</a>
      	  </li>
      	  <li class="nav-item active">
            <a class="nav-link" href="../account/register.php">Register</a>
          </li>
		';
	   }
	  ?>
    </ul>
  </div>
</nav>
</body>
</html>