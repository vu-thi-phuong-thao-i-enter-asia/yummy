<!DOCTYPE html>
<html>
<head>
    <title>
        <?php
        $this->assign("title", "Sửa ảnh");
        ?>
    </title>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({ selector:'.area' });
    </script>

</head>
<body>

<h1>Sửa ảnh</h1>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <?php echo $this->Form->create("Image", array("type" => "file")); ?>
        <div class="form-group">
            <?php
            echo $this->Form->input("image_link", array(
                "type" => "file",
                "label" => "Hãy chọn một ảnh"
            ));
            ?>
        </div>

        <div class="form-group">
            <?php
            echo $this->Form->input("item_id", array(
                "type" => "text",
                "label" => "Mã sản phẩm",
                "class" => "form-control",
                "value" => $data["Item"]["item_id"]
            ));
            ?>
        </div>

        <div class="form-group">
            <?php
            echo $this->Form->end(array(
                "label" => "Lưu thay đổi",
                "class" => "btn btn-primary col-md-2"
            ));
            ?>

            <?php
            echo $this->Html->link("Quay lại",
                array(
                    'admin' => true,
                    'controller' => 'images',
                    'action' => 'image_list'
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