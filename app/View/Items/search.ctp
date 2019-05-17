<!DOCTYPE html>
<html>
<head>
	<title>
		<?php $this->assign("title", "Result"); ?>
	</title>

	<?php
			echo $this->Html->script('store.min');
	?>
</head>
<body>
<div class="row affix-row">
	<div class="col-md-2 col-sm-2 affix-sidebar">
		<?php
        echo $this->element('nav');
		?>
	</div>
	<div class="col-md-10 col-sm-10">
		<?php
			if($tmp == null){
				echo '<h2 class="no-search"><span class="fa fa-search"></span> No Search Result</h2>';
		goto label;
		}
		else{
		echo '<div class="text">
		<h2><span class="fa fa-search"></span> Result</h2>
	</div>';
		}
		?>

		<div class="row">
			<div class="col-md-12">

				<?php
					foreach($data as $item){
				?>

				<div class="col-sm-6 col-md-4 product">
					<div class="frame-border">

						<div class="thumbnail image-frame img-responsive">
							<?php
							echo $this->Html->image("fruit/" . $item["Item"]["item_image"], array(
							"alt" => "can't display image",
							"url" => array(
							"controller" => "items",
							"action" => "detail",
							$item["Item"]["item_id"]
							)
							));
							?>

						</div>

						<div class="caption">

							<div class="product-detail">
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<h4><?php echo $item["Item"]["item_name"]; ?></h4>
										<h5>Giá: <?php
											if($item["Item"]["item_price"] == 0){
												echo "Liên hệ ";
											}else{ echo number_format($item["Item"]["item_price"]); }
										?></h5>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<a id="<?php echo $item['Item']['item_id']; ?>" class="btn btn-success btn-product purchase">
											<span class="glyphicon glyphicon-shopping-cart"></span> Purchase
										</a>
									</div>

									<div class="col-md-6">
										<?php
											echo $this->Html->link(
											'<i class="glyphicon glyphicon-list-alt"></i> Detail',
											array(
											'admin' => false,
											'controller' => 'items',
											'action' => 'detail',
											$item["Item"]["item_id"]
											),
											array(
											'escape' => false,
											'class' => 'btn btn-primary btn-product'
											)
											);
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php
					}
				?>
			</div>

		</div>
	</div>
</div>
<?php
		label: 
	?>
<div class="dialog-form" title="Add to Cart">
	<div class="form form1">
		<?php  
			echo $this->Form->create('Order');
		?>
		<div class="form-group">
			<div class="form-input">
				<?php  
					echo $this->Form->input('quantity',
					array(
					'label' => 'Quantity',
					'class' => 'form-control',
					'type' => 'number',
					'value' => '1',
					'min' => '1'
					)
				);
				?>
			</div>
		</div>
		<div class="form-group">
			<?php  
				echo $this->Form->end(array(
				'label' => 'Add Item',
				'class' => 'btn btn-success'
				));
			?>
		</div>
	</div>
</div>
<?php 
	echo "<ul class='pagination'>";
		echo "<li>".$this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled'))."</li>"; //Hiện thj nút Previous
		echo "<li>".$this->Paginator->numbers(array('separator' => ""))."<li>"; //Hiển thi các số phân trang
		echo "<li>".$this->Paginator->next(' Next »', null, null, array('class' => 'disabled'))."</li>"; //Hiển thị nút next
		echo "<li><a> Page ".$this->Paginator->counter()."</a></li>"; // Hiển thị tổng trang
	echo "</ul>";
?>
</body>
</html>