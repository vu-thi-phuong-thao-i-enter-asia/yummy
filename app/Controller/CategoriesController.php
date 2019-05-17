<?php

/**
 *
 */
class CategoriesController extends AppController
{

    public $name = "Categories";

    public $layout ="mylayout";

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('detail');
    }

//    function index(){
//        $this->paginate = array(
//            'limit' => 6,
//            'order' => array('category_id' => 'desc')
//        );
//        $data = $this->paginate('Category');
//        $this->set("data", $data);
//    }
//
//    function detail($id){
//        $data = $this->Category->find("first", array(
//            "conditions" => array("category_id" => $id)
//        ));
//        $this->set("data", $data);
//    }
//
    function admin_add_category(){
        $this->layout = "admin";
        if($this->request->is("post")){
            $this->Category->create();
            $this->request->data["Category"]["category_created"] = date("Y-m-d");
            $this->Category->save($this->request->data);
            $this->redirect(array(
                "admin" => true,
                "controller" => "categories",
                "action" => "add_category"
            ));
        }
    }

    function admin_edit_category($id){
        $this->layout = "admin";
        $data = $this->Category->find("first", array(
            "conditions" => array("category_id" => $id)
        ));
        $this->set("data", $data);
        $this->Category->category_id = $id;
        if($this->request->is("post")){
            $this->request->data["Category"]["category_id"] = $id;
            $this->Category->save($this->request->data);
            $this->redirect(array(
                "admin" => true,
                "controller" => "categories",
                "action" => "category_list"
            ));
        }
    }

    function admin_delete_category($id){
        $this->Category->delete($id);
        $this->redirect(array(
            "admin" => true,
            "controller" => "categories",
            "action" => "category_list"
        ));
    }

    function admin_category_list(){
        $this->layout = 'admin';
        $list = $this->Category->find("all");
        $this->log($list);
        $this->set('list',$list);
    }
}
?>





