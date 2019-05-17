<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Edit Order</h1>
	<div class="form-inline">
		<?php  
			echo $this->Form->create('HaveItem');
		?>
		<div class="form-group">
			<div class="form-input">
				<?php  
					echo $this->Form->input('item_quantity',array(
							'label' => $data['Item']['item_name'],
							'class' => 'form-control',
							'value' => $data['HaveItem']['item_quantity'],
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
					'admin' => true,
					'controller' => 'orders',
					'action' => 'edit_order',
					$data['HaveItem']['order_id']
				),
				array(
					'class' => 'btn btn-danger'
				)
			); 
		?>

</body>
</html>