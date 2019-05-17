<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			echo $this->assign("title", "Thêm sản phẩm");
		?>
	</title>
</head>
<body>
	<h1>Thêm sản phẩm</h1>
<div class="form">
	<?php  
		echo $this->Form->create("Item", array("type" => "file"));
	?>
    <div class="form-group">
        <div class="form-input">
            <?php
            echo $this->Form->Input("item_id", array(
                "label" => "Mã sản phẩm",
                "required",
                'class' => 'form-control',
                'type' => 'block'
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
		<div class="form-input">
			<?php
				echo $this->Form->Input("item_name", array(
					"label" => "Tên sản phẩm",
					"required",
					'class' => 'form-control'
				));
			?>
		</div>
	</div>
    <div class="form-group">
		<label class="col-2 col-form-label">Loại sản phẩm</label>
		<div class="col-10">
			<select class="form-control" name="data[Item][type_id]">
				<option>Chọn loại sản phẩm</option>
				<?php
                    foreach ($menu['product'] as $type):
                ?>
				<option value="<?php echo $type['Product']['type_id'];?>"><?php echo $type['Product']['type_name']; ?></option>
				<?php
                	endforeach;
                ?>
			</select>
		</div>
    </div>
	<div class="form-group">
		<div class="form-input">
			<?php  
				echo $this->Form->Input("item_price", array(
					'class' => 'form-control',
					"label" => "Giá sản phẩm"
				));
			?>
		</div>
	</div>
	<div class="form-group">
		<div class="form-input">
			<?php  
				echo $this->Form->Input("item_description", array(
                    "type" => "textarea",
					'class' => 'form-control',
					"label" => "Các tính năng của sản phẩm"
				));
			?>
		</div>
	</div>
	<div class="form-group">
		<div class="form-input">
			<?php  
				echo $this->Form->Input("item_remain", array(
					'class' => 'form-control',
					'label' => 'Số lượng tồn',
				));
			?>
		</div>
	</div>
	<div class="form-group">
		<div class="form-input">
			<?php  
				echo $this->Form->Input("item_image", array(
					'label' => 'Chọn ảnh của sản phẩm',
					"type" => "file"
				));
			?>
		</div>
	</div>
	<div class="form-group">
		<?php  
			echo $this->Form->end(array(
					'label' => 'Lưu sản phẩm',
					'class' => 'btn btn-primary col-md-2'
				));
		?>
		<?php  
			echo $this->Html->link("Quay ",
				array(
					'admin' => true,
					'controller' => 'items',
					'action' => 'item_list'
				),
				array(
					'class' => 'btn btn-danger col-md-1 back'
				)
			);
		?>
	</div>
</div>

</body>
</html>