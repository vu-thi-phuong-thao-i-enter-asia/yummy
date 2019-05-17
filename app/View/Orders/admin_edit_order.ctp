<!DOCTYPE html>
<html>
<head>
	<title>
		<?php $this->assign("title", "Edit Order"); ?>
	</title>
</head>
<body>
	<h1>Edit Order</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Item Name</th>
				<th>Item Quantity</th>
				<th>Sale Price</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php  
				foreach ($data as $key => $value) {
					echo "<tr>";
						echo "<td>";
							echo $key + 1;
						echo "</td>";
						echo "<td>";
							echo $value['Item']['item_name'];
						echo "</td>";
						echo "<td>";
							echo $value['HaveItem']['item_quantity'];
						echo "</td>";
						echo "<td>";
							echo $value['Item']['item_price'];
						echo "</td>";
						echo "<td>";
							echo '<i class="fa fa-edit text-info"></i>';
							echo $this->Html->link(" Edit", array(
									'admin'	=> true,
									'controller' => 'orders',
									'action' => 'edit_item',
									$value['HaveItem']['order_id'],
									$value['HaveItem']['id']
								));
						echo "</td>";
						echo "<td>";
							echo '<i class="fa fa-times text-danger"></i>';
							echo $this->Html->link(" Delete", array(
									'admin'	=> true,
									'controller' => 'orders',
									'action' => 'delete_item',
									$value['HaveItem']['order_id'],
									$value['HaveItem']['id']
								));
						echo "</td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>	
	<div>
		<?php  
			echo $this->Html->link('Back', 
				array(
					'admin'	=> true,
					'controller' => 'orders',
					'action' => 'order_list'
				),
				array(
					'class' => 'btn btn-danger'
				)
			);
		?>
	</div>
</body>
</html>