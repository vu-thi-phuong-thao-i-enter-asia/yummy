<?php  

/**
* 
*/
class PostsController extends AppController
{
	
	public $name = "Posts";
    public $uses = array(
        'Post',
        'Category',
        'Product'
    );
	public $layout ="mylayout";

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('detail');
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
					'limit' => 10,
					'order' => array('post_id' => 'desc')
				);
		$data = $this->paginate('Post');
		$this->set("data", $data);
	}

	function detail($id){
        $category = $this->Category->find("all", array(
            'order' => array('category_order ASC')
        ));
        $this->set("category", $category);

        $product = $this->Product->find("all", array(
            'order' => array('type_id DESC'),
        ));
        $this->set("product", $product);

		$data = $this->Post->find("first", array(
			"conditions" => array("post_id" => $id)
		));
		$this->set("data", $data);
	}

	function admin_add_post(){
		$this->layout = "admin";
		$id = $this->Auth->user('user_id');
		if($this->request->is("post")){
			$this->Post->create();
			if(!empty($this->data["Post"]["post_image"]["name"])){
				$file = $this->data["Post"]["post_image"];
				$extension = substr(strtolower(strrchr($file["name"], ".")), 1); 
				$arr_extension = array("jpg", "jpeg", "png"); 
				if(in_array($extension, $arr_extension)){
					$rand_string = uniqid();
					if(move_uploaded_file($file["tmp_name"], WWW_ROOT . "img/post_image" . DS . $rand_string . $file["name"])){
						$this->request->data["Post"]["post_image"] = $rand_string . $file["name"];
						$this->request->data["Post"]["user_id"] = $id;
						$this->request->data["Post"]["post_date_created"] = date("Y-m-d");
						if($this->Post->save($this->request->data)){
								$this->redirect(array(
									"admin" => false,
									"controller" => "posts",
									"action" => "index"
								));
						}
					}
				}
			}
			else{
				$this->request->data["Post"]["user_id"] = $id;
				$this->request->data["Post"]["post_image"] = "default.png";
				$this->request->data["Post"]["post_date_created"] = date("Y-m-d");				
				$this->Post->save($this->request->data);
				$this->redirect(array(
					"admin" => false,
					"controller" => "posts",
					"action" => "index"
				));
			}
		}
	}

	function admin_edit_post($id){
		$this->layout = "admin";
		$data = $this->Post->find("first", array(
			"conditions" => array("post_id" => $id)
		));
		$this->set("data", $data);
		$author_id = $this->Auth->user('user_id');
		$this->Post->post_id = $id;
		if($this->request->is("post")){
			if(!empty($this->data["Post"]["post_image"]["name"])){
				$file = $this->data["Post"]["post_image"];
				$extension = substr(strtolower(strrchr($file["name"], ".")), 1); 
				$arr_extension = array("jpg", "jpeg", "png"); 
				if(in_array($extension, $arr_extension)){
					$rand_string = uniqid();
					if(move_uploaded_file($file["tmp_name"], WWW_ROOT . "img/post_image" . DS . $rand_string . $file["name"])){
						$this->request->data["Post"]["post_id"] = $id;
						$this->request->data["Post"]["post_image"] = $rand_string . $file["name"];
						if($this->Post->save($this->request->data)){
								$this->redirect(array(
									"admin" => true,
									"controller" => "posts",
									"action" => "post_list"
								));
						}
					}
				}
			}
			else{
				$this->request->data["Post"]["post_id"] = $id;
				$this->request->data["Post"]["post_image"] = $data["Post"]["post_image"];
				$this->Post->save($this->request->data);
				$this->redirect(array(
					"admin" => true,
					"controller" => "posts",
					"action" => "post_list"
				));
			}
		}
	}

	function admin_delete_post($id){
		$this->Post->delete($id);
		$this->redirect(array(
			"admin" => true,
			"controller" => "posts",
			"action" => "post_list"
		));
	}

	function admin_post_list(){
		$this->layout = 'admin';
		$list = $this->Post->find("all");
		$this->set('list',$list);
	}
}
?>





