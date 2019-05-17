<!DOCTYPE html>
<html>
<head>
	<title>
		<?php $this->assign("title", "Statistics"); ?>
	</title>
</head>
<body>
	<h1>Statistics</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Item Name</th>
				<th>Number Order</th>
				<th>Total Quantity</th>
				<th>Sale Price</th>
				<th>Total</th>
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
							echo $value['0']['count'];
						echo "</td>";
						echo "<td>";
							echo $value['0']['sum'];
						echo "</td>";
						echo "<td>";
							echo number_format($value['Item']['item_price']).' VND/kg';
						echo "</td>";
						echo "<td>";
							echo number_format($value['Item']['item_price']*$value['0']['sum']).' VND';
						echo "</td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
	<?php 
		echo "<strong>Total order number: ".$order_data['0']['0']['count']." orders</strong>";
		echo "<br>";
		echo "<strong>Total profit: ".number_format($order_data['0']['0']['total'])." VND</strong>";
		echo "<br>";
	?>

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
</body>
</html>