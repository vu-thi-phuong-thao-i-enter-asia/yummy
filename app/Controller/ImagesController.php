<?php

/**
 *
 */
class ImagesController extends AppController
{

    public $name = "Images";
    public $uses = array(
        'Image',
        'Category',
        'Product'
    );
    public $layout ="mylayout";

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('detail');
        $menu['category'] = $this->Category->find("all", array(
            'order' => array('category_order ASC')
        ));

        $menu['product'] = $this->Product->find("all", array(
            'order' => array('type_id DESC'),
        ));
        $this->set('menu', $menu);
    }

    function index(){

        $category = $this->Category->find("all", array(
            'order' => array('category_order ASC')
        ));
        $this->set("category", $category);

        $product = $this->Product->find("all", array(
            'order' => array('type_id DESC'),
        ));
        $this->set("product", $product);

        $this->paginate = array(
            'limit' => 12,
            'order' => array('image_id' => 'desc')
        );
        $data = $this->paginate('Image');
        $this->set("data", $data);
    }
//
//    function detail($id){
//        $data = $this->Post->find("first", array(
//            "conditions" => array("post_id" => $id)
//        ));
//        $this->set("data", $data);
//    }

    function admin_add_image(){
        $this->layout = "admin";
        if($this->request->is("post")){
            $this->Image->create();
            $this->log($this->data["Image"]["image_link"]["name"]);
            if(!empty($this->data["Image"]["image_link"]["name"])){
                $file = $this->data["Image"]["image_link"];
                $extension = substr(strtolower(strrchr($file["name"], ".")), 1);
                $arr_extension = array("jpg", "jpeg", "png");
                if(in_array($extension, $arr_extension)){
                    $rand_string = uniqid();
                    if(move_uploaded_file($file["tmp_name"], WWW_ROOT . "img/images" . DS . $rand_string . $file["name"])){
                        $this->request->data["Image"]["image_link"] = $rand_string . $file["name"];
                        $this->request->data["Image"]["image_created"] = date("Y-m-d");
                        if($this->Image->save($this->request->data)){
//                            $this->redirect(array(
//                                "admin" => false,
//                                "controller" => "images",
//                                "action" => "index"
//                            ));
                            $this->redirect(array(
                                "admin" => true,
                                "controller" => "images",
                                "action" => "image_list"
                            ));
                        }
                    }
                }
            }
            else{
                $this->request->data["Image"]["image_link"] = "default.png";
                $this->request->data["Image"]["image_created"] = date("Y-m-d");
                $this->Image->save($this->request->data);
//                $this->redirect(array(
//                    "admin" => false,
//                    "controller" => "images",
//                    "action" => "index"
//                ));
                $this->redirect(array(
                    "admin" => true,
                    "controller" => "images",
                    "action" => "image_list"
                ));
            }
        }
    }

    function admin_edit_image($id){
        $this->layout = "admin";
        $data = $this->Image->find("first", array(
            "conditions" => array("image_id" => $id)
        ));
        $this->set("data", $data);
        $this->Image->image_id = $id;
        if($this->request->is("post")){
            if(!empty($this->data["Image"]["image_link"]["name"])){
                $file = $this->data["Image"]["image_link"];
                $extension = substr(strtolower(strrchr($file["name"], ".")), 1);
                $arr_extension = array("jpg", "jpeg", "png");
                if(in_array($extension, $arr_extension)){
                    $rand_string = uniqid();
                    if(move_uploaded_file($file["tmp_name"], WWW_ROOT . "img/images" . DS . $rand_string . $file["name"])){
                        $this->request->data["Image"]["image_id"] = $id;
                        $this->request->data["Image"]["image_link"] = $rand_string . $file["name"];
                        if($this->Image->save($this->request->data)){
                            $this->redirect(array(
                                "admin" => true,
                                "controller" => "images",
                                "action" => "image_list"
                            ));
                        }
                    }
                }
            }
            else{
                $this->request->data["Image"]["image_id"] = $id;
                $this->request->data["Image"]["image_link"] = $data["Image"]["image_link"];
                $this->Image->save($this->request->data);
                $this->redirect(array(
                    "admin" => true,
                    "controller" => "images",
                    "action" => "image_list"
                ));
            }
        }
    }

    function admin_delete_image($id){
        $this->Image->delete($id);
        $this->redirect(array(
            "admin" => true,
            "controller" => "images",
            "action" => "image_list"
        ));
    }

    function admin_image_list(){
        $this->layout = 'admin';
        $list = $this->Image->find("all");
        $this->set('list',$list);
    }
}
?>





