<!DOCTYPE html>
<html>
<head>
    <title>
        <?php
        $this->assign("title", "Thêm danh mục");
        ?>
    </title>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({ selector:'.area' });
    </script>

</head>
<body>

<h1>Thêm danh mục</h1>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <?php echo $this->Form->create("Category", array("type" => "file")); ?>
        <div class="form-group">
            <?php
            echo $this->Form->input("category_name", array(
                "type" => "text",
                "label" => "Tên danh mục",
                "class" => "form-control"
            ));
            ?>
        </div>

        <div class="form-group">
            <?php
            echo $this->Form->input("category_order", array(
                "type" => "text",
                "label" => "Vị trí",
                "class" => "form-control"
            ));
            ?>
        </div>

        <div class="form-group">
            <?php
            echo $this->Form->end(array(
                "label" => "Lưu danh mục ",
                "class" => "btn btn-primary col-md-2"
            ));
            ?>

            <?php
            echo $this->Html->link("Quay lại",
                array(
                    "admin" => true,
                    "controller" => "categories",
                    "action" => "category_list"
                ),
                array(
                    'class' => 'btn btn-danger col-md-1 back'
                )
            );
            ?>
        </div>

        </form>
    </div>

</div>

</body>
</html>