<?php

/**
 *
 */
class Image extends AppModel
{
    public $name = "Image";

    public $primaryKey = 'image_id';

    public $belongsTo = array(
        'Item' => array(
            'className' => 'Item',
            'foreignKey' => 'item_id'
        )
    );

}
?>