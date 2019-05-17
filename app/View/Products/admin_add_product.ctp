<!DOCTYPE html>
<html>
<head>
    <title>
        <?php
        $this->assign("title", "Thêm loại sản phẩm");
        ?>
    </title>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({ selector:'.area' });
    </script>

</head>
<body>

<h1>Thêm loại sản phẩm</h1>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <?php echo $this->Form->create("Product", array("type" => "file")); ?>
        <div class="form-group">
            <?php
            echo $this->Form->input("type_name", array(
                "type" => "text",
                "label" => "Tên loại",
                "class" => "form-control"
            ));
            ?>
        </div>

        <div class="form-group">
            <label class="col-2 col-form-label">Thuộc danh mục</label>
            <div class="col-10">
                <select class="form-control" name="data[Product][category_id]">
                    <option>Chọn danh mục</option>
                    <?php
                    foreach ($menu['category'] as $category):
                ?>
                    <option value="<?php echo $category['Category']['category_id'];?>"><?php echo $category['Category']['category_name']; ?></option>
                    <?php
                	endforeach;
                ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <?php
            echo $this->Form->end(array(
                "label" => "Thêm loại sản phẩm",
                "class" => "btn btn-primary col-md-3"
            ));
            ?>

            <?php
        echo $this->Html->link("Quay lại",
                array(
                    'admin' => true,
                    'controller' => 'products',
                    'action' => 'product_list'
                ),
                array(
                    'class' => 'btn btn-danger col-md-2 back'
                )
            );
            ?>
        </div>

        </form>
    </div>

</div>

</body>
</html>