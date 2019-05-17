<!DOCTYPE html>
<html>
<head>
	<title>
		<?php $this->assign("title", "Sửa sản phẩm"); ?>
	</title>
</head>
<body>
	<h1>Sửa sản phẩm</h1>
	<div class="form">
		<?php  
			echo $this->Form->create("Item", array("type" => "file"));
		?>
        <div class="form-group">
            <div class="form-input">
                <?php
                echo $this->Form->Input("item_id", array(
                    'class' => 'form-control',
                    "label" => "Mã sản phẩm",
                    "value" => $data["Item"]["item_id"],
                    'type' => 'block'
                ));
                ?>
            </div>
        </div>
		<div class="form-group">
			<div class="form-input">
				<?php  
					echo $this->Form->Input("item_name", array(
						'class' => 'form-control',
						"label" => "Tên sản phẩm",
						"value" => $data["Item"]["item_name"]
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
						"label" => "Giá sản phẩm",
						"value" => $data["Item"]["item_price"]
					));
				?>
			</div>
		</div>
		<div class="form-group">
			<div class="form-input">
				<?php  
					echo $this->Form->Input("item_description", array(
						'class' => 'form-control',
						"value" => $data["Item"]["item_description"],
						"type" => "textarea",
    		        	"label" => "Các tính năng của sản phẩm",
    		        	"rows" => "5"
					));
				?>
			</div>
		</div>
		<div class="form-group">
			<div class="form-input">
				<?php  
					echo $this->Form->Input("item_remain", array(
						'class' => 'form-control',
						"label" => "Số lượng tồn",
						"value" => $data["Item"]["item_remain"],
						'type' => 'number',
						'min' => '0'
					));
				?>
			</div>
		</div>
		<div class="form-group">
			<?php  
				echo $this->Form->Input("item_image", array(
					"type" => "file",
					"label" => "Chọn ảnh "
				));
			?>
		</div>
		<div class="form-group">
			<?php  
				echo $this->Form->end(array(
						'label' => 'Lưu lại',
						'class' => 'btn btn-primary col-md-2'
					));
			?>

			<?php  
				echo $this->Html->link("Quay lại",
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