<!DOCTYPE html>
<html>
<head>
	<title>
		<?php
			echo $this->assign("title", "My Profile");
		?>
	</title>
</head>
<body>
	<div class="jumbotron">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                <div class="row">
                <?php 
                	echo $this->Html->image("user_avatar/" . $data["User"]["user_avatar"], array(
                		"class" => "image-frame col-sm-12"
                	));
                ?>
                </div>
                
                <div class="row edit col-md-offset-1">
                <?php
        			echo $this->Html->link('Edit Profile', 
                        array(
    						'admin' => false,
    						'controller' => 'users',
    						'action' => 'edit'
    					),
                        array(
                            'class' => 'btn btn-primary'
                        )
                    );
                ?>
                
                <?php
					echo $this->Html->link('Change Password', 
                        array(
    						'admin' => false,
    						'controller' => 'users',
    						'action' => 'change_password'
    					),
                        array(
                            'class' => 'btn btn-primary'
                        )
                    );
        		?>
                </div>
        		
        		<div class="row edit col-md-offset-1">
            		<?php

            			echo $this->Html->link('My Order', 
                            array(
    							'admin' => false,
    							'controller' => 'orders',
    							'action' => 'index',
    						),
                            array(
                                'class' => 'btn btn-primary'
                            )
                        );
            		?>      			

            		<?php
            			echo $this->Html->link('My Favorite', 
                            array(
    							'admin' => false,
    							'controller' => 'users',
    							'action' => 'favorite'
					        ),
                            array(
                                'class' => 'btn btn-primary'
                            )
                        );
            		?>
            	   
            	</div>

            </div>
                      
            <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                <div class="awesome">
                    <h2>My profile is AWESOME </h2>
                </div>
                <hr>

                <ul class="details">
                    <li><p><strong>Fullname</strong>: <?php echo $data['User']['user_fullname']; ?></p></li>
                    <li><p>
                    	<strong>Gender</strong>: <?php
                    		if (isset($data['User']['user_gender'])) {
                                if ($data['User']['user_gender'] == '0') {
                                    echo "";
                                }
                                elseif ($data['User']['user_gender'] == '1') {
                                    echo "Male";
                                }
                                else {
                                    echo "Female";
                                }
                            }
                    	?>
                    </p></li>

                    <li><p><strong>Job</strong>: <?php echo $data['User']['user_job']; ?></p></li>
                    <li><p><strong>Address</strong>: <?php echo $data['User']['user_address']; ?></p></a>
                    <li><p><strong>Birthday</strong>: <?php echo $data['User']['user_birthday']; ?></p></a>
                    <li><p><strong>Phone</strong>: <?php echo $data['User']['user_phone']; ?></p></a>
                    <li><p><strong>Email</strong>: <?php echo $data['User']['user_email']; ?></p></a>
                </ul>
            </div>
        </div>
    </div>


</body>
</html>




