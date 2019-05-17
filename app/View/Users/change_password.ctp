<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			echo $this->assign("title", "Change Password");
		?>
	</title>
	<?php  
		echo $this->Html->script('store.min');
	?>
</head>
<body>
<h1>Change Password</h1>
<div class="form">
	<?php  
		echo $this->Form->create('User');
	?>

	<div class="form-group">
		<div class="form-input">
			<?php  
				echo $this->Form->input('user_old_password',
					array(
							'label' => 'Old Password',
							'class' => 'form-control',
							'type' => 'password',
							'required'
							//'error' => false
							// error false to show error message in other position
						)
				);
			?>
		</div>
	</div>
	<div class="form-group">
		<div class="form-input">
			<?php  
				echo $this->Form->input('user_new_password',
					array(
							'label' => 'New Password',
							'class' => 'form-control',
							'type' => 'password',
							'id' => 'new_pass'
							//'error' => false
							// error false to show error message in other position
						)
				);
			?>
		</div>
	</div>
	<div class="form-group">
		<div class="form-input">
			<?php  
				echo $this->Form->input('user_confirm_password',
					array(
						'label' => 'Confirm Password',
						'class' => 'form-control',
						'type' => 'password',
						'id' => 'confirm_pass'
						//'error' => false
						// error false to show error message in other position
					)
				);	
			?>
		</div>
	</div>
	<span id='match'></span>
	<div class="form-group">
	<?php  
		echo $this->Form->end(array(
			'label' => 'Save',
			'class' => 'btn btn-primary col-md-2'
		));
	?>	
	</div>

	<?php  
		echo $this->Html->link("Back", 
			array(
				'admin' => false,
				'controller' => 'users',
				'action' => 'profile'
			),
			array(
				'class' => 'btn btn-danger col-md-1 back'
			)
		);
	?>
</div>
</body>
</html>