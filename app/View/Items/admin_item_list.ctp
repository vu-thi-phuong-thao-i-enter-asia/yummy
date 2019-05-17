<!DOCTYPE html>
<html>
<head>
	<title>
		<?php $this->assign("title", "Danh sách sản phẩm"); ?>
	</title>
	<?php
			echo $this->Html->script('store.min');
	?>
</head>
<body>
	<h1>Danh sách sản phẩm</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
                <th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>Loại sản phẩm</th>
				<th>Số lượng tồn</th>
				<th colspan="2">Quản lý</th>
			</tr>
		</thead>
		<?php  
			foreach ($list as $key => $value) {
				echo "<tr>";
					echo "<td>";
						echo $key + 1;
					echo "</td>";
                    echo "<td>";
                    echo $value['Item']['item_id'];
                    echo "</td>";
					echo "<td>";
						echo $value['Item']['item_name'];
					echo "</td>";
					echo "<td>";	
						echo number_format($value['Item']['item_price']);
					echo "</td>";
					echo "<td>";
                    echo $value['Product']['type_name'];
					echo "</td>";
					echo "<td>";
						echo $value['Item']['item_remain'];
					echo "</td>";
					echo "<td>";
						echo '<i class="fa fa-edit text-info"></i>';
						echo $this->Html->link(' Sửa', array(
								'admin' => true,
								'controller' => 'items',
								'action' => 'edit_item',
								$value['Item']['item_id']
							));
					echo "</td>";
					echo "<td>";
						echo '<i class="fa fa-times text-danger"></i>';

						echo $this->Html->link(' Xoá',
								array(
									'admin' => true,
									'controller' => 'items',
									'action' => 'delete_item',
									$value['Item']['item_id']
								),
								array(
									'class' => 'delete'
								)
							);
					echo "</td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>

