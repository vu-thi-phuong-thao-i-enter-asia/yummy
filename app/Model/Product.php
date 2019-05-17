<?php

/**
 *
 */
class Product extends AppModel
{
    public $name = "Product";

    public $primaryKey = 'type_id';

    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id'
        )
    );

}
?>