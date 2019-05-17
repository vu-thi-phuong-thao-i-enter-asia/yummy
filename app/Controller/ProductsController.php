<?php

/**
 *
 */
class ProductsController extends AppController
{

    public $name = "Products";
    public $uses = array(
        'Item',
        'Category',
        'Product'
    );
    public $layout ="mylayout";

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('detail','search','categories', 'product', 'add_to_cart');
        $menu['category'] = $this->Category->find("all", array(
            'order' => array('category_order ASC')
        ));

        $menu['product'] = $this->Product->find("all", array(
            'order' => array('type_id DESC'),
        ));
        $this->set('menu', $menu);
    }

    function admin_add_product(){
        $this->layout = "admin";
        if($this->request->is("post")){
            $this->Product->create();
            $this->request->data["Product"]["type_created"] = date("Y-m-d");
            $this->Product->save($this->request->data);
            $this->redirect(array(
                "admin" => true,
                "controller" => "products",
                "action" => "product_list"
            ));
        }

    }

    function admin_edit_product($id){
        $this->layout = "admin";
        $data = $this->Product->find("first", array(
            "conditions" => array("type_id" => $id)
        ));
        $this->set("data", $data);
        $this->Product->type_id = $id;
        if($this->request->is("post")){
            $this->request->data["Product"]["type_id"] = $id;
            $this->Product->save($this->request->data);
            $this->redirect(array(
                "admin" => true,
                "controller" => "products",
                "action" => "product_list"
            ));
        }
    }

    function admin_delete_product($id){
        $this->Product->delete($id);
        $this->redirect(array(
            "admin" => true,
            "controller" => "products",
            "action" => "product_list"
        ));
    }

    function admin_product_list(){
        $this->layout = 'admin';
        $list = $this->Product->find("all");
        $this->set('list',$list);
    }
}
?>





