<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			echo $this->assign("title", "Thay đổi ");
		?>
	</title>
</head>
<body>
<h1>Thay đổi quyền người dùng</h1>
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
								'value' => $data['User']['user_email'],
								'readonly'
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
							'value' => $data['User']['user_fullname'],
							'readonly'
						)
					);
			?>
		</div>
	</div>
	<div class="form-group">
		<div class="form-input">
			<?php  
				echo $this->Form->input('user_role',
					array(
							'label' => 'Cấp quyền',
							'class' => 'form-control',
							'type' => 'select',
								'options' => array('Admin','User'),
								'selected' => $data['User']['user_role']
							//'error' => false
							// error false to show error message in other position
						)
				);
			?>
		</div>
	</div>
	<div class="form-group row">
		<?php  
			echo $this->Form->end(array(
					'label' => 'Lưu lại',
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