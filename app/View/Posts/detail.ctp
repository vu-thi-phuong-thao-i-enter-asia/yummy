<!DOCTYPE html>
<html>
<head>
	<title>Post Detail</title>
</head>
<body>
<div class="row affix-row">
    <div class="col-md-2 col-sm-2 affix-sidebar">
        <?php
        echo $this->element('nav');
        ?>
    </div>
    <div class="col-md-10 col-sm-10">
        <div class="well">
            <div class="row">

                <div class="col-md-12">
                   <div class="pull-left col-md-4 col-sm-6 thumb-contenido">
                        <?php
                            echo $this->Html->image("post_image/" . $data["Post"]["post_image"], array(
                                "alt" => "can't display image",
                                "class" => "center-block img-responsive"
                            ));
                        ?>
                   </div>

                    <div class="col-md-8 col-sm-6">
                        <h2 class="text-style">
                            <?php echo $data["Post"]["post_title"]; ?>
                        </h2>
                        <hr>
                        <h5>Last changed: <?php echo $data["Post"]["post_date_created"]; ?></h5>
                        <h5>Author: <?php echo $data["User"]["user_fullname"]; ?> </h5>
                        <h5>Email: <a href="#"><?php echo $data["User"]["user_email"]; ?></a> </h5>
                        <h5>Role:
                            <?php
                                if ($data["User"]["user_role"] == 0){
                                    echo "Admin";
                                }
                                else{
                                    echo "User";
                                }
                            ?>
                        </h5>
                        <hr>


                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <p class="text-justify">
                        <?php echo $data["Post"]["post_content"]; ?>
                    </p>
                </div>

                <hr>

                <div class="row col-md-12 col-sm-12">
                    <div class="fb-like col-md-12" data-href="<?php echo '/posts/detail/'.$data['Post']['post_id'] ?>" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true">
                    </div>

                    <div class="fb-comments" data-href="<?php echo '/posts/detail/'.$data['Post']['post_id'] ?>" data-numposts="5">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>