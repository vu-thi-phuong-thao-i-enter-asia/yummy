<!DOCTYPE html>
<html>
<head>
	<title>
    <?php $this->assign("title", "Detail"); ?>   
    </title>
</head>
<body>
<div class="row affix-row">
    <div class="col-md-2 col-sm-2 affix-sidebar">
        <?php
        echo $this->element('nav');
        ?>
    </div>
    <div class="col-md-10 col-sm-10">
        <div class="text-color">
            <h2>
                <?php echo $data["Item"]["item_name"]; ?>
            </h2>
            <hr>
            <!-- img and detail -->
            <div class="row">
                <div class="col-md-5 thumbnail img-responsive">
                    <?php echo $this->Html->image("fruit/" . $data["Item"]["item_image"]); ?>
                </div>

                <div class="col-md-7">
                    <h3>Detail: </h3>
                        <?php
                            $this->log($data);
                            echo "<strong>";
                            echo "&nbsp Name: ".$data["Item"]["item_name"] ."<br>";
                            echo "&nbsp Type: ".$data["Product"]["type_name"] ."<br>";
                        ?>
                    <h3>
                        Giá:
                            <?php echo number_format($data["Item"]["item_price"]); ?>
                    </h3>
                    <br>
                    <div class="btn-ground">
                        <button id="purchase" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button>
                        <?php
                            if (!empty($like)) {
                                echo '<button id="like" class="btn btn-info"><span class="fa fa-thumbs-o-down"></span> Disike</button>';
                            } else {
                                echo '<button id="like" class="btn btn-info"><span class="fa fa-thumbs-o-up"></span> Like</button>';
                            }
                        ?>
                    </div>
                    <br>
                    <div id="message">
                        <?php
                            if (!empty($like)) {
                                echo "<strong>You and ".($count['0']['0']['count'] - 1)." other people like this product.</strong>";
                            } else {
                                echo '<strong>'.$count['0']['0']['count'].' people like this product.</strong>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row description">
                <h3>Product Description:</h3>
                <div class="product-description">
                <?php
                    echo $data["Item"]["item_description"];
                ?>
                </div>
            </div>
            <hr>
            <div class="row col-md-12 col-sm-12">
                <div class="fb-like col-md-12" data-href="<?php echo '/items/detail/'.$data['Item']['item_id'] ?>" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true">
                </div>
                <div class="fb-comments" data-href="<?php echo '/items/detail/'.$data['Item']['item_id'] ?>" data-numposts="5">
                </div>
            </div>
        </div>
        <div>
            <?php
                if (!empty($like)) {
                    $check_like = 1;
                } else {
                    $check_like = 0;
                }
                if (!empty($login)) {
                    $logged = 1;
                } else {
                    $logged = 0;
                }
            ?>
        </div>
        <div class="dialog-form" title="Add to Cart">
            <div class="form">
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
</body>
<script type="text/javascript">
    $(document).ready(function(){
        var check_like = <?php echo $check_like; ?>;
        var login = <?php echo $logged; ?>;
        var item_id = <?php echo $data['Item']['item_id'] ?>;
        $('#like').click(function(){
            $.ajax({
                type: 'POST',
                url: '/users/add_favorite',
                data: {
                    item_id: <?php echo $data['Item']['item_id']; ?>
                },
                success: function(result){
                    $('#message').html(result);
                },
                error: function(){
                    $('.dialog-form').dialog('close');
                    swal({
                            title: 'Error',
                            text: 'You must login to like item',
                            icon: 'error'
                        });
                }
            });
            if (login == 1) {
                if (check_like == 1) {
                    $('#like').html('<span class="fa fa-thumbs-o-up"></span> Like');
                } else {
                    $('#like').html('<span class="fa fa-thumbs-o-down"></span> Disike');
                }
                check_like = 1 - check_like;
            } else {
                $('#like').html('<span class="fa fa-thumbs-o-up"></span> Like');
            }
        });

        $('.dialog-form').dialog({
            autoOpen: false,
            show: {
                effect: 'blind',
                duration: 500
            },
            hide: {
                effect: 'blind',
                duration: 500
            }
        });

        $('#purchase').click(function(){
            $('.dialog-form').dialog('open');
        });

        $('.form').submit(function(event){
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/items/add_to_cart',
                data: {
                    item_id: item_id,
                    item_quantity: $('#OrderQuantity').val(),
                },
                success: function(result){
                    $('.dialog-form').dialog('close');
                    if (result.indexOf('Can') > -1) {
                        swal({
                                title: 'Error',
                                text: result,
                                icon: 'error'
                            });
                    } else {
                        swal({
                                title: 'Success',
                                text: result,
                                icon: 'success'
                            });
                    }
                },
                error: function(){
                    $('.dialog-form').dialog('close');
                    swal({
                            title: 'Error',
                            text: 'You must login to purchase item',
                            icon: 'error'
                        });
                }
            });
        });
    });
</script>
</html>