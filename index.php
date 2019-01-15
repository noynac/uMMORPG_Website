<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/init.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php');
?>
<br><br><br>
<body>
	<div class="container">
		<center>
		<?php
		if($session) {
			echo '<h1>You\'re logged in as: '.$user->name.'</h1>';
		}else{
			echo '<h1>You are not logged in.</h1>';
		}
		?>
		</center>
	</div>
</body>