<?php  

/**
* 
*/
class Item extends AppModel
{
	public $name = "Item";

	public $primaryKey = 'item_id';

	public $hasMany = array(
		'Favorite' => array(
				'className' => 'Favorite',
				'foreignKey' => 'item_id',
				'dependent' => true
			),
		'HaveItem' => array(
				'className' => 'HaveItem',
				'foreignKey' => 'item_id',
				'dependent' => true
			)
		);
    public $belongsTo = array(
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'type_id'
        )
    );
}
?>