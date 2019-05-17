<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			$this->assign("title", "My Order");
		?>
	</title>
	<?php
			echo $this->Html->script('store.min');
	?>
	<style type="text/css">
		#flashMessage {
			color: green;
		}
	</style>
</head>
<body>
<h1>My order</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Item Name</th>
				<th>Item Quantity</th>
				<th>Sale Price</th>
				<th>Total</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php  
				$total_price = 0;
				if (isset($message)) {
					echo "<h2>";		
						echo "Your order has no item";
					echo "</h2>";
				} else {
					foreach ($order as $key => $value) {
						$total_price = $total_price + $value['item_price']*$value['item_quantity'];
						echo "<tr>";
							echo "<td>";
								echo $key;
							echo "</td>";
							echo "<td>";
								echo $value['item_name'];
							echo "</td>";
							echo "<td>";
								echo $value['item_quantity'];
							echo "</td>";
							echo "<td>";
								echo number_format($value['item_price']).' VND/kg';
							echo "</td>";
							echo "<td>";
								echo number_format($value['item_price']*$value['item_quantity']).' VND';
							echo "</td>";
							echo "<td>";
								echo '<i class="fa fa-edit text-info"></i>';
								echo $this->Html->link(" Edit", array(
										'admin'	=> false,
										'controller' => 'orders',
										'action' => 'edit_item',
										$key
									));
							echo "</td>";
							echo "<td>";
								echo '<i class="fa fa-times text-danger"></i>';
								echo $this->Html->link(" Delete", 
									array(
										'admin'	=> false,
										'controller' => 'orders',
										'action' => 'delete_item',
										$key
									),
									array(
										'class' => 'delete'
									)
								);
							echo "</td>";
						echo "</tr>";
					}
				}
			?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">
					Total Price
				</th>
				<th >
					<?php  
						echo number_format($total_price).' VND';
					?>
				</th>
			</tr>
		</tfoot>
	</table>
	<div class="form">
		<?php  
			echo $this->Form->create('Order');
		?>
		<div class="form-group">
			<div class="form-input">
				 <?php  
				 	echo $this->Form->input('order_address',
				 			array(
				 					'label' => 'Address',
				 					'class' => 'form-control',
				 					'required'
				 				)
				 		);
				 ?>
			</div>
		</div>
		<div class="form-group">
			<?php  
				echo $this->Form->end(array(
						'label' => 'Purchase',
						'class' => 'btn btn-primary'
					));
			?>
		</div>
	</div>
	<h1>Order History</h1>
	<div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Customer</th>
					<th>Address</th>
					<th>Total Price</th>
					<th>Date</th>
					<th>Status</th>
					<th>Infomation</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					foreach ($my_order as $key => $value) {
						echo "<tr>";
							echo "<td>";
								echo $key + 1;
							echo "</td>";
							echo "<td>";
								echo $value['User']['user_fullname'];
							echo "</td>";
							echo "<td>";
								echo $value['Order']['order_address'];
							echo "</td>";
							echo "<td>";
								echo number_format($value['Order']['order_total_price']).' VND';
							echo "</td>";
							echo "<td>";
								echo $value['Order']['order_date_time'];
							echo "</td>";
							echo "<td>";
								if ($value['Order']['order_status'] == 0) {
									echo "<strong>on delivery</strong>";
								} else {
									echo "<strong>delivered</strong>";
								}
							echo "</td>";
							echo "<td>";
								echo '<i class="fa fa-info-circle text-info"></i>';
								echo $this->Html->link(' Info', array(
										'admin' => false,
										'controller' => 'orders',
										'action' => 'info',
										$value['Order']['order_id']
									));
							echo "</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>

</body>
</html>