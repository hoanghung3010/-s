<?php
	$connect = mysqli_connect('localhost','root','','devpro');
	mysqli_set_charset($connect,"utf8");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<a href="index.php?page=register" class="btn btn-success"></a></a>
		</div>

		<div class="row">
			<?php
			if(isset($_GET["page"]) && $_GET["page"] == "register")
				include "register.php";
			?>
		</div>

	</div>
</body>
</html>