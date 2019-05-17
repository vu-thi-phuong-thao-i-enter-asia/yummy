<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php
    echo $this->Html->script('store.min');
    ?>
</head>
<body>
<h1>Danh mục </h1>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Mã danh mục</th>
        <th>Tên danh mục</th>
        <th>Ngày tạo</th>
        <th>Vị trí</th>
        <th colspan="2">Quản lý</th>
    </tr>
    </thead>
    <?php
    foreach ($list as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $value['Category']['category_id'];
        echo "</td>";

        echo "<td>";
        echo $value['Category']['category_name'];
        echo "</td>";

        echo "<td>";
        echo $value['Category']['category_created'];
        echo "</td>";

        echo "<td>";
        echo $value['Category']['category_order'];
        echo "</td>";

        echo "<td>";
        echo '<i class="fa fa-edit text-info"></i>';
        echo $this->Html->link(' Sửa', array(
            'admin' => true,
            'controller' => 'categories',
            'action' => 'edit_category',
            $value['Category']['category_id']
        ));
        echo "</td>";

        echo "<td>";
        echo '<i class="fa fa-times text-danger"></i>';
        echo $this->Html->link(' Xoá', array(
            'admin' => true,
            'controller' => 'categories',
            'action' => 'delete_category',
            $value['Category']['category_id']
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
