<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			echo $this->assign("title", "My Favorite");
		?>
	</title>
	<?php  
		echo $this->Html->script('store.min');
	?>
</head>
<body>

<div class="text">
	<h2><i class="fa fa-heart"></i> My Favorite</h2>
</div>

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
							<h5>Type: 
								<?php 
									if($item["Item"]["item_type"] == 0){
										echo "Vietnamese Fruit";
									}
									elseif($item["Item"]["item_type"] == 1){
										echo "Australian Fruit";
									}
									else{
										echo "European Fruit";
									}
								?>	
							</h5>
							<h5>Remain: <?php echo $item["Item"]["item_remain"]; ?></h5>
							<h5>Price: <?php echo number_format($item["Item"]["item_price"]);?> VND/kg</h5>
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
											'class' => 'btn btn-primary btn-product',
											"target" => "_blank"
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
<div class="dialog-form" title="Add to Cart">
	<div class="form1">
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
</body>
</html>