<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			$this->assign("title", "Order List");
		?>
	</title>
	<?php
			echo $this->Html->script('store.min');
	?>
</head>
<body>
	<h1>Order List</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Customer</th>
				<th>Address</th>
				<th>Total Price</th>
				<th>Date</th>
				<th>Status</th>
				<th colspan="3">Manage</th>
			</tr>
		</thead>
		<tbody>
			<?php  
				foreach ($list as $key => $value) {
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
							echo number_format($value['Order']['order_total_price']);
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
									'admin' => true,
									'controller' => 'orders',
									'action' => 'order_info',
									$value['Order']['order_id']
								));
						echo "</td>";
						echo "<td>";
							echo '<i class="fa fa-edit text-info"></i>';
							echo $this->Html->link(' Edit', array(
									'admin' => true,
									'controller' => 'orders',
									'action' => 'edit_order',
									$value['Order']['order_id']
								));
						echo "</td>";
						echo "<td>";
							echo '<i class="fa fa-times text-danger"></i>';
							echo $this->Html->link(' Delete', array(
									'admin' => true,
									'controller' => 'orders',
									'action' => 'delete_order',
									$value['Order']['order_id']
								),
								array(
									'class' => 'delete'
								)
							);
						echo "</td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
</body>
</html>