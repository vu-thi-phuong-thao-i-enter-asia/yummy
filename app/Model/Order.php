<?php  

/**
* 
*/
class Order extends AppModel
{
	public $name = 'Order';

	public $primaryKey = 'order_id';

	public $hasMany = array(
			'HaveItem' => array(
					'className' => 'HaveItem',
					'foreignKey' => 'order_id',
					'dependent' => true
				)
		);

	public $belongsTo = array(
			'User' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
				)
		);
}
?>