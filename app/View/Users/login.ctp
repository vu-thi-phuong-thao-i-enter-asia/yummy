<!DOCTYPE html>
<html>
<head>
	<title>
		<?php $this->assign("title", "Đăng nhập"); ?>
	</title>

	<?php
		echo $this->Html->css("user_login.css");
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

<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                  
    <div class="panel panel-default" >
        
        <div class="panel-heading">
            <div class="panel-title">Đăng nhập</div>
        </div>     

        <div class="panel-body">                            
            <?php  
				echo $this->Form->create('User', array(
					"class" => "form-horizontal"
				));
			?>
                                    
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <?php  
						echo $this->Form->input('user_email',array(
							'class' => 'form-control',
							'placeholder' => 'Nhập mail của bạn',
							"label" => false
							//error' => false,
						));
					?>                                     
                </div>
                                
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <?php  
						echo $this->Form->input('user_password',array(
							'class' => 'form-control',
							'placeholder' => 'Nhập mật khẩu',
							//'error' => false,
							'type' => 'password',
							"label" => false
						));
					?>
                </div>
                <?php echo $this->Flash->render(); ?>
                                           
				<div class="form-group">
                <!-- Button -->
                	<div class="col-sm-12 controls">
                    	<?php  
							echo $this->Form->end(array(
								'label' => 'Đăng nhập',
								'class' => 'btn btn-success col-md-4 col-sm-6 col-md-offset-1'
							));
						?>
                    	<?php 
                    		echo '<a href="'.$fbloginUrl.'" class="btn btn-primary col-md-5 col-sm-7 col-md-offset-1">Đăng nhập bằng Facebook</a>';
                    	?>
					</div>
                </div>    
        </div>

        <div class="panel-footer">
            Chưa có tài khoản
            <?php
                echo $this->Html->link('Đăng ký ngay',array(
					'admin' => false,
					'controller' => 'users',
					'action' => 'register'
				));
            ?>
        </div>

    </div>  
</div>
 

</body>
</html>