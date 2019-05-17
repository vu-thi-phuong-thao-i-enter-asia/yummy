<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Edit Order</h1>
	<div class="form-inline">
		<?php  
			echo $this->Form->create('Item');
		?>
		<div class="form-group">
			<div class="form-input">
				<?php  
					echo $this->Form->input('item_quantity',array(
							'label' => $data['item_name'],
							'class' => 'form-control',
							'value' => $data['item_quantity'],
							'type' => 'number',
							'min' => '1'
						));
				?>
			</div>
		</div>
		<div class="form-group">
			<?php  
				echo $this->Form->end(array(
					'label' => 'Save',
					'class' => 'btn btn-primary'
					));
			?>
		</div>
	</div>
		<?php echo $this->Html->link('Back', 
				array(
					'admin' => false,
					'controller' => 'orders',
					'action' => 'index'
				),
				array(
					'class' => 'btn btn-danger'
				)
			); 
		?>
</body>
</html>