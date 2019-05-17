<!DOCTYPE html>
<html>
<head>
	<title>
        <?php
            $this->assign("title", "Thêm bài viết");
        ?>
    </title>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    
    <script>
        tinymce.init({ selector:'.area' });
    </script>

</head>
<body>

    <h1>Thêm bài viết</h1>

	<div class="row">
	    <div class="col-md-12 col-sm-12">
    		<?php echo $this->Form->create("Post", array("type" => "file")); ?>    		    
    		    <div class="form-group">
    		        <?php
    		        	echo $this->Form->input("post_title", array(
    		        		"type" => "text",
    		        		"label" => "Tiêu đề",
    		        		"class" => "form-control"
    		        	));
    		        ?>
    		    </div>

                <div class="form-group">
                    <?php
                        echo $this->Form->input("post_summary", array(
                            "type" => "textarea",
                            "label" => "Tóm lược bài viết",
                            "class" => "form-control"
                        ));
                    ?>
                </div>
    		        		    
    		    <div class="form-group">
    		        <?php
    		        	echo $this->Form->input("post_content", array(
    		        		"type" => "textarea",
    		        		"label" => "Nội dung bài viết",
    		        		"rows" => "20",
    		        		"class" => "form-control area"
    		        	));
    		        ?>
    		    </div>

    		    <div class="form-group">
    		        <?php
    		        	echo $this->Form->input("post_image", array(
    		        		"type" => "file",
    		        		"label" => "Hãy chọn một ảnh cho bài viết"
    		        	));
    		        ?>
    		    </div>
    		    
    		    <div class="form-group">
    		        <?php
    		        	echo $this->Form->end(array(
    		        		"label" => "Lưu bài viết",
    		        		"class" => "btn btn-primary col-md-2"
    		        	));
    		        ?>

                    <?php  
                        echo $this->Html->link("Quay lại",
                            array(
                                'admin' => true,
                                'controller' => 'posts',
                                'action' => 'post_list'
                            ),
                            array(
                                'class' => 'btn btn-danger col-md-1 back'
                            )
                        );
                    ?>
    		    </div>
    		    
    		</form>
		</div>
		
	</div>

</body>
</html>