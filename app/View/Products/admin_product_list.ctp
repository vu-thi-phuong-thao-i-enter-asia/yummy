<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php
    echo $this->Html->script('store.min');
    ?>
</head>
<body>
<h1>Danh sách loại sản phẩm</h1>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Mã loại sản phẩm</th>
        <th>Tên loại sản phẩm</th>
        <th>Danh mục</th>
        <th>Ngày tạo</th>
        <th colspan="2">Quản lý loại</th>
    </tr>
    </thead>
    <?php
    foreach ($list as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $value['Product']['type_id'];
        echo "</td>";

        echo "<td>";
        echo $value['Product']['type_name'];
        echo "</td>";

        echo "<td>";
        echo $value['Category']['category_name'];
        echo "</td>";

        echo "<td>";
        echo $value['Product']['type_created'];
        echo "</td>";

        echo "<td>";
        echo '<i class="fa fa-edit text-info"></i>';
        echo $this->Html->link(' Sửa', array(
            'admin' => true,
            'controller' => 'products',
            'action' => 'edit_product',
            $value['Product']['type_id']
        ));
        echo "</td>";

        echo "<td>";
        echo '<i class="fa fa-times text-danger"></i>';
        echo $this->Html->link(' Xoá', array(
            'admin' => true,
            'controller' => 'products',
            'action' => 'delete_product',
            $value['Product']['type_id']
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
