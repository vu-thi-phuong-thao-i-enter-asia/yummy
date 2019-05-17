<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
			echo $this->Html->script('store.min');
	?>
</head>
<body>
	<h1>Danh sách bài viết</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Tiêu đề bài viết</th>
				<th>Tác giả bài viết</th>
				<th>Ngày viết bài</th>
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
						echo $value['Post']['post_title'];
					echo "</td>";

					echo "<td>";	
						echo $value['User']['user_fullname'];
					echo "</td>";

					echo "<td>";
						echo $value['Post']['post_date_created'];
					echo "</td>";
					
					echo "<td>";
						echo '<i class="fa fa-edit text-info"></i>';
						echo $this->Html->link(' Sửa', array(
								'admin' => true,
								'controller' => 'posts',
								'action' => 'edit_post',
								$value['Post']['post_id']
							));
					echo "</td>";

					echo "<td>";
						echo '<i class="fa fa-times text-danger"></i>';
						echo $this->Html->link(' Xoá', array(
								'admin' => true,
								'controller' => 'posts',
								'action' => 'delete_post',
								$value['Post']['post_id']
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
