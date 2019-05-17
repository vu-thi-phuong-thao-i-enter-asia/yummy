<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			echo $this->assign("title", "Edit User");
		?>
	</title>
</head>
<?php  
	echo $this->Html->script('store.js');
?>
<body>
<div class="form">
	<?php  
		echo $this->Form->create('User',
				array(
						'enctype' => 'multipart/form-data'
					)
			);
	?>
	<div class="form-group">
		<div class="form-input">
			<?php  
				echo $this->Form->input('user_fullname',
					array(
							'label' => 'Full Name',
							'class' => 'form-control',
							'value' => $data['User']['user_fullname'],
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
				echo $this->Form->input('user_gender',
					array(
							'label' => 'Gender',
							'class' => 'form-control',
							'type' => 'select',
							'options' => array('None','Male','Female'),
							'selected' => $data['User']['user_gender']
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
				echo $this->Form->input('user_job',
					array(
							'label' => 'Job',
							'class' => 'form-control',
							'value' => $data['User']['user_job'],
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
				echo $this->Form->input('user_address',
					array(
							'label' => 'Address',
							'class' => 'form-control',
							'value' => $data['User']['user_address'],
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
				echo $this->Form->input('user_birthday',
					array(
							'label' => 'Birthday',
							'class' => 'form-control',
							'value' => $data['User']['user_birthday'],
							'minYear' => '1930',
							'between' => '<div class="form-inline">',
							'after' => '</div>',
							'type' => 'text',
							'required'=>false
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
				echo $this->Form->input('user_phone',
					array(
							'label' => 'Phone',
							'class' => 'form-control',
							'value' => $data['User']['user_phone'],
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
				echo $this->Form->input('user_email',
					array(
							'label' => 'Email',
							'class' => 'form-control',
							'value' => $data['User']['user_email'],
							'readonly'
							//'error' => false
							// error false to show error message in other position
						)
				);
			?>
		</div>
	</div>
	<div class="form-group">
		<?php  
			echo $this->Form->input('user_avatar',
				array(
						'label' => 'Upload avatar',
						'type' => 'file'
					)
			);
		?>
	</div>
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