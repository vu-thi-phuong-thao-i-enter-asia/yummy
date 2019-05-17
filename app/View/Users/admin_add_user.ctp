<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			echo $this->assign("title", "Thêm người dùng");
		?>
	</title>
</head>
<body>
<h1>Thêm người dùng</h1>
<div class="form">
	<?php  
		echo $this->Form->create('User');
	?>
	<div class="form-group">
		 <div class="form-input">
			<?php  
				echo $this->Form->input('user_email',
					array(
							'label' => 'Email người dùng',
							'class' => 'form-control',
							'placeholder' => 'Email'
						)
				);
			?>
		 </div>
	</div>
	<div class="form-group">
		<div class="form-input">
			<?php  
				echo $this->Form->input('user_fullname',
					array(
						'label' => 'Tên người dùng',
						'class' => 'form-control',
						'placeholder' => 'Tên đầy đủ'
						)
				);
			?>
		</div>
	</div>
	<div class="form-group">
		<div class="form-input">
			<?php  
				echo $this->Form->input('user_password',
					array(
							'label' => 'Mật khẩu người dùng',
							'class' => 'form-control',
							'placeholder' => 'Mật khẩu',
							'type' => 'password'
						)
				);
			?>
		</div>
	</div>
	<div class="form-group row">
		<?php  
			echo $this->Form->end(array(
					'label' => 'Lưu tài khoản',
					'class' => 'btn btn-primary col-md-2'
				));
		?>
		<?php  
			echo $this->Html->link("Quay lại",
				array(
					'admin' => true,
					'controller' => 'users',
					'action' => 'user_list'
				),
				array(
					'class' => 'btn btn-danger col-md-1 back'
				)
			);
		?>
	</div>
	
</div>

</body>
</html>