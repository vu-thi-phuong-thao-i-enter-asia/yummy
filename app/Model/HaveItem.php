<?php  
	/**
	* 
	*/
	class HaveItem extends AppModel
	{
		
		public $name = 'HaveItem';

		public $belongsTo = array(
				'Item' => array(
						'className' => 'Item',
						'foreignKey' => 'item_id',
						'counterCache' => true
					),
				'Order' => array(
						'className' => 'Order',
						'foreignKey' => 'order_id'
					)
			);
	}
?>