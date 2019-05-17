<!DOCTYPE html>
<html>
<head>
    <title>
        <?php $this->assign("title", "Images"); ?>
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
        <div class="text">
            <h2><span class="glyphicon glyphicon-shopping-cart"></span> Images</h2>
        </div>
        <div class="row affix-row">
            <?php
            foreach($data as $item){
                ?>
                            <?php
                            echo $this->Html->image("images/" . $item["Image"]["image_link"], array(
                                "alt" => "can't display image",
                                "url" => array(
                                    "controller" => "images",
                                    "action" => "detail",
                                    $item["Image"]["image_id"]
                                ),
                                "width" => "300px",
                                "height" => "300px",
                            ));
                            ?>
                <?php
            }
            ?>
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
<style>
    .affix-row > img {
        margin-bottom: 5px;
    }
</style>