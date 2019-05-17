<!DOCTYPE html>
<html>
<head>
	<title>
		<?php $this->assign("title", "Sản phẩm"); ?>
	</title>

	<?php
	    echo $this->Html->css('home');
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
        <div class="row affix-row" style="margin-left: 0">
            <div class="row">
                <div class="row">
                    <div class="col-md-2 col-md-offset-4 col-ms-6">
                        <h2><b>Chậu</b></h2>
                    </div>
                    <div class="col-md-6 col-ms-6">
                        <div class="dropdown" style="margin-top: 30px">
                            <button class="btn btn-link dropdown-toggle menupro" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i>Xem thêm sản phẩm khác</i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                <?php
                                foreach ($menu['product'] as $type):
                                    if($type['Product']['category_id'] == 9) :
                                    ?>
                                        <a class="dropdown-item" href="/items/product/<?php echo $type['Product']['type_id']; ?>"><?php echo $type['Product']['type_name']; ?></a><br>
                                    <?php
                                    endif;
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $i = 0;
                    foreach($data as $key => $item):
                        $urlImg =  "/img/fruit/".$item["Item"]["item_image"];
                        if($item["Item"]["category_id"] == 9):
                            $i++;
                            if($i <= 4 ):
                        ?>
                        <div class="col-md-3 col-ms-3">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="<?php echo $urlImg ?>" class="img-responsive" alt='<?php echo $item["Item"]["item_name"] ?>'>
                                    <div>
                                        <a href="#" class="btn">Zoom</a>
                                        <a href="#" class="btn">View</a>
                                    </div>
                                </div>
                                <h3><a href="/items/detail/<?php echo $item['Item']['item_id']; ?>"><?php echo $item["Item"]["item_name"] ?></a></h3>
                                <div class="pi-price">$<?php echo number_format($item["Item"]["item_price"]);?></div>
                                <a href="javascript:;" class="btn add2cart">Add to cart</a>
                                <div class="sticker sticker-new"></div>
                            </div>
                        </div>
                        <?php endif; endif; ?>
                    <?php endforeach; ?>
            </div>

            <div class="row">
                <div class="row">
                    <div class="col-md-2 col-md-offset-4 col-ms-6">
                        <h2><b>Chậu</b></h2>
                    </div>
                    <div class="col-md-6 col-ms-6">
                        <div class="dropdown" style="margin-top: 30px">
                            <button class="btn btn-link dropdown-toggle menupro" type="button" id="gedf-drop2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i>Xem thêm sản phẩm khác</i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop2">
                                <?php
                                foreach ($menu['product'] as $type):
                                    if($type['Product']['category_id'] == 10) :
                                    ?>
                                <a class="dropdown-item" href="/items/product/<?php echo $type['Product']['type_id']; ?>"><?php echo $type['Product']['type_name']; ?></a><br>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $i = 0;
                    foreach($data as $key => $item):
                $urlImg =  "/img/fruit/".$item["Item"]["item_image"];
                if($item["Item"]["category_id"] == 9):
                $i++;
                if($i <= 4 ):
                ?>
                <div class="col-md-3 col-ms-3">
                    <div class="product-item">
                        <div class="pi-img-wrapper">
                            <img src="<?php echo $urlImg ?>" class="img-responsive" alt='<?php echo $item["Item"]["item_name"] ?>'>
                            <div>
                                <a href="#" class="btn">Zoom</a>
                                <a href="#" class="btn">View</a>
                            </div>
                        </div>
                        <h3><a href="shop-item.html"><?php echo $item["Item"]["item_name"] ?></a></h3>
                        <div class="pi-price">$<?php echo number_format($item["Item"]["item_price"]);?></div>
                        <a href="javascript:;" class="btn add2cart">Add to cart</a>
                        <div class="sticker sticker-new"></div>
                    </div>
                </div>
                <?php endif; endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="row">
                <div class="row">
                    <div class="col-md-2 col-md-offset-4 col-ms-6">
                        <h2><b>Chậu</b></h2>
                    </div>
                    <div class="col-md-6 col-ms-6">
                        <div class="dropdown" style="margin-top: 30px">
                            <button class="btn btn-link dropdown-toggle menupro" type="button" id="gedf-drop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i>Xem thêm sản phẩm khác</i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop3">
                                <?php
                                foreach ($menu['product'] as $type):
                                    if($type['Product']['category_id'] == 10) :
                                    ?>
                                <a class="dropdown-item" href="/items/product/<?php echo $type['Product']['type_id']; ?>"><?php echo $type['Product']['type_name']; ?></a><br>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $i = 0;
                    foreach($data as $key => $item):
                $urlImg =  "/img/fruit/".$item["Item"]["item_image"];
                if($item["Item"]["category_id"] == 9):
                $i++;
                if($i <= 4 ):
                ?>
                <div class="col-md-3 col-ms-3">
                    <div class="product-item">
                        <div class="pi-img-wrapper">
                            <img src="<?php echo $urlImg ?>" class="img-responsive" alt='<?php echo $item["Item"]["item_name"] ?>'>
                            <div>
                                <a href="#" class="btn">Zoom</a>
                                <a href="#" class="btn">View</a>
                            </div>
                        </div>
                        <h3><a href="shop-item.html"><?php echo $item["Item"]["item_name"] ?></a></h3>
                        <div class="pi-price">$<?php echo number_format($item["Item"]["item_price"]);?></div>
                        <a href="javascript:;" class="btn add2cart">Add to cart</a>
                        <div class="sticker sticker-new"></div>
                    </div>
                </div>
                <?php endif; endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="row">
                <div class="row">
                    <div class="col-md-2 col-md-offset-4 col-ms-6">
                        <h2><b>Chậu</b></h2>
                    </div>
                    <div class="col-md-6 col-ms-6">
                        <div class="dropdown" style="margin-top: 30px">
                            <button class="btn btn-link dropdown-toggle menupro" type="button" id="gedf-drop4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i>Xem thêm sản phẩm khác</i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop4">
                                <?php
                                foreach ($menu['product'] as $type):
                                    if($type['Product']['category_id'] == 10) :
                                    ?>
                                <a class="dropdown-item" href="/items/product/<?php echo $type['Product']['type_id']; ?>"><?php echo $type['Product']['type_name']; ?></a><br>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $i = 0;
                    foreach($data as $key => $item):
                $urlImg =  "/img/fruit/".$item["Item"]["item_image"];
                if($item["Item"]["category_id"] == 9):
                $i++;
                if($i <= 4 ):
                ?>
                <div class="col-md-3 col-ms-3">
                    <div class="product-item">
                        <div class="pi-img-wrapper">
                            <img src="<?php echo $urlImg ?>" class="img-responsive" alt='<?php echo $item["Item"]["item_name"] ?>'>
                            <div>
                                <a href="#" class="btn">Zoom</a>
                                <a href="#" class="btn">View</a>
                            </div>
                        </div>
                        <h3><a href="shop-item.html"><?php echo $item["Item"]["item_name"] ?></a></h3>
                        <div class="pi-price">$<?php echo number_format($item["Item"]["item_price"]);?></div>
                        <a href="javascript:;" class="btn add2cart">Add to cart</a>
                        <div class="sticker sticker-new"></div>
                    </div>
                </div>
                <?php endif; endif; ?>
                <?php endforeach; ?>
            </div>
            <!--end test-->

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
        </div>
    </div>
</div>
</body>
</html>
