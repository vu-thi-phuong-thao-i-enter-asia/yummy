<!DOCTYPE html>
<html>
<head>
	<title>
		<?php $this->assign("title", "Order Info"); ?>
	</title>
</head>
<body>
	<h1>Order Info</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Order ID</th>
				<th>Customer</th>
				<th>Item Name</th>
				<th>Item Quantity</th>
				<th>Sale Price</th>
				<th>Status</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td rowspan="<?php echo count($order['HaveItem'])+1; ?>">
					<?php  
						echo $order['Order']['order_id'];
					?>
				</td>
				<td rowspan="<?php echo count($order['HaveItem'])+1; ?>">
					<?php 
						echo $order['User']['user_fullname'];
					?>
				</td>
			</tr>
			<?php  
				foreach ($item as $key => $value) {
					echo "<tr>";
						echo "<td>";
							echo $value['Item']['item_name'];
						echo "</td>";
						echo "<td>";
							echo $value['HaveItem']['item_quantity'];
						echo "</td>";
						echo "<td>";
							echo number_format($value['HaveItem']['sale_price']).' VND/kg';
						echo "</td>";
						echo "<td>";
							if ($value['Order']['order_status'] == 0) {
								echo "<strong>on delivery</strong>";
							} else {
								echo "<strong>delivered</strong>";
							}
						echo "</td>";
						echo "<td>";
							echo number_format($value['HaveItem']['item_quantity']*$value['HaveItem']['sale_price']).' VND';
						echo "</td>";
					echo "</tr>";
				}
			?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="6">Total Price</th>
				<th>
					<?php  
						echo number_format($order['Order']['order_total_price']).' VND';
					?>
				</th>
			</tr>
		</tfoot>
	</table>
		<div class="btn btn-info">
			<?php  
				echo $this->Html->link('Change order status', array(
					'admin' => true,
					'controller' => 'orders',
					'action' => 'edit_status',
					$order['Order']['order_id']
				));
			?>

		</div>
			<?php  
				echo $this->Html->link('Back', 
						array(
							'admin'	=> true,
							'controller' => 'orders',
							'action' => 'order_list'
						),
						array(
							'class' => 'btn btn-danger back'
						)
					);
			?>
	</div>
</body>
</html>