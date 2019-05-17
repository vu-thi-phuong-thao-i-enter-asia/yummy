<?php  
/**
* 
*/
class Favorite extends AppModel
{
	public $name = 'Favorite';

	public $belongsTo = array(
			'User' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
				),
			'Item' => array(
					'className' => 'Item',
					'foreignKey' => 'item_id',
					'counterCache' => true
				)
		);
}
?>