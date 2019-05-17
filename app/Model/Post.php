<?php  

/**
* 
*/
class Post extends AppModel
{
	public $name = "Post";

	public $primaryKey = 'post_id';

	public $belongsTo = array(
			'User' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
		)
	);

}
?>