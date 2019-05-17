<!DOCTYPE html>
<html>
<head>
	<title>Post Index</title>
</head>
<body>

<div class="text-style">
	<h2><span class="glyphicon glyphicon-list-alt"></span> Post</h2>
</div>

<br>


<div class="row thumbnail post-index">
    <div class="row affix-row">
        <div class="col-md-2 col-sm-2 affix-sidebar">
            <?php
            echo $this->element('nav');
            ?>
        </div>
        <div class="col-md-10 col-sm-10">
            <?php foreach($data as $post){ ?>
            <div class="row affix-row">
                <div class="col-md-4 col-sm-6 thumbnail post-image ">
                    <?php
                    echo $this->Html->image("post_image/" . $post["Post"]["post_image"], array(
                        "alt" => "can't display image",
                        "url" => array(
                            "controller" => "posts",
                            "action" => "detail",
                            $post["Post"]["post_id"]
                        )
                    ));
                    ?>
                </div>

                <div class="col-md-8 col-sm-6">
                    <h3 class="text-color"><?php echo $post["Post"]["post_title"]; ?></h3>
                    <p>
                        <?php
                        echo $post['Post']['post_summary'];
                        ?>
                    </p>

                    <div>
                        <?php
                        echo "<div>";
                        echo $this->Html->link(
                            "Read more",
                            array(
                                "admin" => false,
                                "controller" => "posts",
                                "action" => "detail",
                                $post["Post"]["post_id"]
                            )
                        );
                        echo "</div>";
                        ?>
                        <span class="label label-primary">LAST CHANGED: <?php echo $post["Post"]["post_date_created"]; ?></span>
                        <div class="pull-right">
                            <span class="label label-info">AUTHOR: <?php echo $post["User"]["user_fullname"]?></span>
                        </div>
                    </div>

                </div>
            </div>

            <?php } ?>
            <hr>
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


</div>
</body>
</html>