<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			echo $this->assign("title", "Danh sách người dùng");
		?>
	</title>
	<?php
			echo $this->Html->script('store.min');
	?>
</head>
<body>
	<h1>Danh sách người dùng</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Tên</th>
				<th>Email</th>
				<th>Phân </th>
				<th colspan="2">Quản lý</th>
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
							echo $value['User']['user_email'];
						echo "</td>";
						echo "<td>";
							if ($value['User']['user_role'] == 0) {
								echo 'Người quản trị';
							} else {
								echo 'Người dùng';
							}
						echo "</td>";
						echo "<td>";
							echo '<i class="fa fa-user-secret text-info"></i>';
							echo $this->Html->link(' Thay đổi quyền', array(
									'admin' => true,
									'controller' => 'users',
									'action' => 'edit_role',
									$value['User']['user_id']
								));
						echo "</td>";
						echo "<td>";
							echo '<i class="fa fa-user-times text-danger"></i>';
							echo $this->Html->link(' Xoá',
								array(
									'admin' => true,
									'controller' => 'users',
									'action' => 'delete_user',
									$value['User']['user_id']
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