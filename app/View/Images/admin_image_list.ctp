<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php
    echo $this->Html->script('store.min');
    ?>
</head>
<body>
<h1>Danh sách ảnh</h1>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Link ảnh</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Ngày tạo</th>
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
        echo $value['Image']['image_link'];
        echo "</td>";

        echo "<td>";
        echo $value['Image']['item_id'];
        echo "</td>";

        echo "<td>";
        echo $value['Item']['item_name'];
        echo "</td>";

        echo "<td>";
        echo $value['Image']['image_created'];
        echo "</td>";

        echo "<td>";
        echo '<i class="fa fa-edit text-info"></i>';
        echo $this->Html->link(' Sửa', array(
            'admin' => true,
            'controller' => 'images',
            'action' => 'edit_image',
            $value['Image']['image_id']
        ));
        echo "</td>";

        echo "<td>";
        echo '<i class="fa fa-times text-danger"></i>';
        echo $this->Html->link(' Xoá', array(
            'admin' => true,
            'controller' => 'images',
            'action' => 'delete_image',
            $value['Image']['image_id']
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
