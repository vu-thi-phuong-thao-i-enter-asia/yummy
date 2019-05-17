<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			echo $this->assign("title", "Đăng ký");
		?>
	</title>

	<?php
		echo $this->Html->css("user_login.css");
		echo $this->Html->script('store.min');
	?>
</head>
<body>

	<?php  
		echo $this->Html->image('myimg/logo.jpg',
          array(
            'url' => array(
              'admin' => false,
              'controller' => 'items',
              'action' => 'index' 
            ),
            'class' => 'logo'
          )
        );
	?>

<!-- Register box -->

<div class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">                  
    <div class="panel panel-default" >
        
        <div class="panel-heading">
            <div class="panel-title">Đăng ký</div>
        </div>     

        <div class="panel-body" >                            
            <?php  
				echo $this->Form->create('User', array(
					"class" => "form-horizontal"
				));
			?>
                                    
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <?php  
						echo $this->Form->input('user_fullname',array(
							'label' => false,
							'class' => 'form-control',
							'placeholder' => 'Nhập tên của bạn',
							'error' => false
							// error false to show error message in other position
						));
					?>                                     
                </div>
                <span><?php echo $this->Form->error('User.user_fullname',null,array('class' => 'error-message')); ?></span>                
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <?php  
						echo $this->Form->input('user_email',array(
							'label' => false,
							'class' => 'form-control',
							'placeholder' => 'Nhập mail của bạn',
							'error' => false,
						));
					?>
                </div>
                <span id="message"></span>
                <span><?php echo $this->Form->error('User.user_email',null,array('class' => 'error-message')); ?></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <?php  
						echo $this->Form->input('user_password',array(
							'label' => false,
							'class' => 'form-control',
							'placeholder' => 'Nhập mật khẩu',
							'error' => false,
							'type' => 'password'
						));
					?>
                </div>
                <span><?php echo $this->Form->error('User.user_password',null,array('class' => 'error-message')); ?></span>                           
				<div class="form-group">
                	<?php
						echo $this->Form->end(array(
							'label' => 'Đăng ký',
							'class' => 'btn btn-primary col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3'
						));
					?>
                </div>
		</div>

		<div class="panel-footer">
			Nếu bạn đã có một tài khoản!
			<?php
				echo $this->Html->link('Đăng nhập',array(
					'admin' => false,
					'controller' => 'users',
					'action' => 'login',
				));
			?>
		</div>   
    </div>                     
</div>


</body>
</html>