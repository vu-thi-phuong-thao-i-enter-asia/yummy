<!DOCTYPE html>
<html>
<head>
	<title>
        <?php
        echo $type;
        ?>
	</title>
</head>
<?php
	echo $this->Html->css("item_index.css");
    echo $this->Html->css('home');
	echo $this->Html->script('store.min');
?>
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
                    <div class="col-md-3 col-md-offset-4 col-ms-6">
                        <h2><b><?php echo $nameCategory['category_name'];?></b></h2>
                    </div>
                    <div class="col-md-5 col-ms-6">
                        <div class="dropdown" style="margin-top: 30px">
                            <button class="btn btn-link dropdown-toggle menupro" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i>Xem thêm sản phẩm khác</i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                <?php
                                foreach ($menu['product'] as $type):
                                    if($type['Product']['category_id'] == $nameCategory['category_id']) :
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
        <?php
        echo "<ul class='pagination'>";
        echo "<li>".$this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled'))."</li>"; //Hiện thj nút Previous
        echo "<li>".$this->Paginator->numbers(array('separator' => ""))."<li>"; //Hiển thi các số phân trang
        echo "<li>".$this->Paginator->next(' Next »', null, null, array('class' => 'disabled'))."</li>"; //Hiển thị nút next
        echo "<li><a> Page ".$this->Paginator->counter()."</a></li>"; // Hiển thị tổng trang
        echo "</ul>";
        ?>
    </div>
</div>

</body>
</html>