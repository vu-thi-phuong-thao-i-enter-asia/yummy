<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			echo $this->fetch("title");
		?>
	</title>
<!-- Jquery and bootstrap -->
<?php 
	echo $this->Html->css('bootstrap.min');
	echo $this->Html->script('jquery-3.2.1.min');
	echo $this->Html->script('bootstrap.min');
?>

<!-- Web Icon -->
<?php
    echo $this->Html->meta("logo.jpg", "/img/myimg/logo.jpg", array("type" => "icon"));
?>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
	//My layout CSS
	//echo $this->Html->css("cake.generic.css");
  	echo $this->Html->script('jquery-ui.min.js');
 	echo $this->Html->css('jquery-ui.min.css');
	echo $this->Html->css('mylayout.css');

	echo $this->Html->css("user_login.css");
?>
</head>
<body>
	<?php
  		echo $this->element("content");
	?>	


</body>
</html>