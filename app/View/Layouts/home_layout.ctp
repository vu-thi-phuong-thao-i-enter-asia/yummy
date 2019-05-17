<!DOCTYPE html>
<html>
<head>
<title>
  <?php 
    echo 'Thái Tuyết - '.$this->fetch('title');
  ?> 
</title>
<!-- Jquery and bootstrap -->
<?php 
  echo $this->Html->css('bootstrap');
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
    echo $this->Html->script('jquery-ui.min.js');
    echo $this->Html->css('jquery-ui.min.css');
    echo $this->Html->css('mylayout.css');
    echo $this->Html->css('item_index.css');
?>

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=145016949415253";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!-- Carousel -->
<?php
  echo $this->element("header");
?>

<!-- Navigation Bar -->
<?php
  echo $this->element("slideImg");
?>
<!-- <hr class="col-md-12 horizontal-line">
 -->
 
<?php  
  echo $this->element('sidebar');
?>
<!-- Content here -->
<?php echo $this->Flash->render(); ?>
<?php
  echo $this->element("content");
?>


<!-- Footer --> 
<?php
  echo $this->element("footer");
?>



</body>
</html>
<style>
    .carousel-inner>.item>img{
        width: 1920px;
        height:440px;
    }
</style>