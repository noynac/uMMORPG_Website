<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        <a class="nav-link" href="<?= $config['base_url']; ?>">Home</a>
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
            <a class="nav-link" href="'.$config['base_url'].'/account/logout.php">Logout</a>
          </li>
		';
	   }else{
		echo '
      	  <li class="nav-item active">
            <a class="nav-link" href="'.$config['base_url'].'/account/login.php">Login</a>
      	  </li>
      	  <li class="nav-item active">
            <a class="nav-link" href="'.$config['base_url'].'/account/register.php">Register</a>
          </li>
		';
	   }
	  ?>
    </ul>
  </div>
</nav>
</body>
</html>
